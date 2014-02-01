<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * App Controller use to add all function used by any user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class App_Controller extends Behavior_Controller {

  protected static $OFFSET = 4;
  protected static $LIMIT = 10;
  protected static $ID;
  protected static $UID;
  protected static $PAGE;
  protected static $LAYOUT;
  protected static $ACTIVE_SESSION;
  protected static $POST_DATA;
  protected static $DEFAULT_MODEL;
  protected static $DIRECTORY;
  protected static $CLASS;
  protected static $METHOD;
  protected static $USER;
  protected $data = array();
  protected $skip_uid_validate = array('edit', 'remove', 'active');

  public function __construct() {
    parent::__construct();

    $this->initialize();

  }

  private function initialize() {
    App_Controller::$DIRECTORY = $this->data['directory'] = $this->router->directory;
    App_Controller::$CLASS = $this->data['class'] = $this->router->class;
    App_Controller::$METHOD = $this->data['method'] = ($this->router->class == $this->router->method) ? 'index' : $this->router->method;

    App_Controller::$ID = $this->uri->segment(4);
    App_Controller::$UID = App_Controller::$PAGE = $this->uri->segment(5);

    App_Controller::$ACTIVE_SESSION = $this->session->all_userdata();

    App_Controller::$POST_DATA = $this->input->post();

    App_Controller::$DEFAULT_MODEL = ucfirst(singular(App_Controller::$CLASS));

    if (file_exists(APPPATH . 'models/' . strtolower(App_Controller::$DEFAULT_MODEL) . '.php')) {
      $this->load->model(App_Controller::$DEFAULT_MODEL);
    }

    App_Controller::$LAYOUT = 'layout/default';
    
    $this->data['title'] = $this->get_title();
  }

  protected function error_message($action = NULL, $callback_action = FALSE, $message = NULL) {
    $actions = array(
      'create' => array(
        TRUE => 'Create data success..',
        FALSE => 'Create data failed.'),
      'edit' => array(
        TRUE => 'Update data success.',
        FALSE => 'Update data failed.'),
      'delete' => array(
        TRUE => 'Delete data success.',
        FALSE => 'Delete data failed.'),
      'redirect' => array(
        TRUE => 'The page you are correct access.',
        FALSE => 'An error occurred on the page you access.'),
      'access' > array(
        TRUE => 'You have access this page',
        FALSE => 'You do not have access this page'
      )
    );

    $message = (empty($message)) ? $actions[$action][$callback_action] : $message;
    $this->session->set_flashdata('message', array('alert' => ($callback_action) ? 'success' : 'error', 'message' => $message));
  }

  protected function pagination_create($count = NULL, $suffix = NULL, $limit = NULL, $offset = NULL, $url = NULL, $return = FALSE) {
    $config = $this->set_pagination($count, $suffix, $limit, $offset, $url);
    $this->pagination->initialize($config);
    if (!$return) {
      $this->data['pagination'] = $this->get_pagination();
    } else {
      return $this->get_pagination();
    }
  }

  protected function set_pagination($count = NULL, $suffix = NULL, $limit = NULL, $offset = NULL, $site_url = NULL) {
    $config['base_url'] = site_url((empty($site_url) ? $this->get_site_url_pagination() : $site_url));
    $config['total_rows'] = $count;
    $config['per_page'] = (empty($limit)) ? self::$LIMIT : $limit;
    $config['uri_segment'] = (empty($offset)) ? self::$OFFSET : $offset;
    $config['suffix'] = $suffix;
    return $config;
  }

  protected function get_pagination() {
    return $this->pagination->create_links();
  }

  protected function get_site_url_pagination() {
    $dir = (empty(App_Controller::$DIRECTORY)) ? '' : App_Controller::$DIRECTORY . '/';
    return $dir . App_Controller::$CLASS . '/' . App_Controller::$METHOD;
  }

  protected function get_offset_from_segment($offset = NULL) {
    $offset = (empty($offset)) ? self::$OFFSET : $offset;
    return $this->uri->segment($offset);
  }

  protected function get_suffix_params() {
    $suffix = '';
    if (isset($_GET) && !empty($_GET)) {
      $str = array();
      foreach ($_GET as $key => $value) {
        $str[] = $key . '=' . $value;
      }
      $suffix = '?' . implode('&', $str);
    }
    return $suffix;
  }

  protected function get_password_salt() {
    return md5(uniqid());
  }

  protected function set_password($password = NULL, $password_salt = NULL) {
    $password_salt = (empty($password_salt)) ? $this->get_password_salt() : $password_salt;
    return md5($this->session->encryption_key . $password_salt . md5($password));
  }

  protected function get_validate_password($password = NULL, $user = NULL) {
    if ($this->set_password($password, $user['password_salt']) == $user['password']) {
      return TRUE;
    }
    return FALSE;
  }

  protected function set_encrype_user_data($data = array()) {
    $data['password_salt'] = $this->get_password_salt();
    $data['password_secure'] = $this->set_password($data['password'], $data['password_salt']);
    return $data;
  }

  protected function unset_array($data = array(), $unsets = array()) {
    foreach ($unsets as $unset) {
      unset($data[$unset]);
    }
    return $data;
  }

  protected function get_uid($id = NULL) {
    return md5($this->session->encryption_key . plural($this->router->class) . $id);
  }

  protected function validate_uid($id = NULL, $uid = NULL) {
    if ($this->get_uid($id) != $uid) {
      $this->error_message('redirect');
      redirect('admin/' . $this->router->class);
    }
  }

  protected function get_post_data($field = NULL, $unset = TRUE) {
    if (isset(self::$POST_DATA[$field])) {
      $data = self::$POST_DATA[$field];
      if ($unset) {
        unset(self::$POST_DATA[$field]);
      }
      return $data;
    }
    return array();
  }

  protected function set_slug_post_data($name = 'name', $model = NULL) {
    $model = (empty($model)) ? self::$DEFAULT_MODEL : $model;
    if (empty(self::$POST_DATA['slug'])) {
      $slug = url_title(self::$POST_DATA[$name], 'dash', TRUE);
      $count = $this->{$model}->count_by('slug', $slug);
      if ($count > 0) {
        self::$POST_DATA['slug'] = $slug . '-' . ($count + 1);
      } else {
        self::$POST_DATA['slug'] = $slug;
      }
    }
  }

  protected function save_data_after($model = NULL, $data = array(), $field = NULL, $value = NULL, $validate = TRUE) {
    $this->load->model($model);
    return $this->{$model}->save_data_after($data, $field, $value, $validate);
  }

  protected function after_save($type = NULL, $callback = NULL) {
    if ($callback) {
      redirect(App_Controller::$DIRECTORY . '/' . App_Controller::$CLASS);
    }
    $this->error_message($type, $callback);
  }

  protected function get_title() {
    if ($this->data['method'] == 'index') {
      return ucwords(App_Controller::$CLASS . ' management');
    } else {
      return ucwords(App_Controller::$METHOD . ' ' . App_Controller::$CLASS);
    }
  }

}

?>