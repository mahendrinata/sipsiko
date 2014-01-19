<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * App Controller use to add all function used by any user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class AppController extends BehaviorController {

  public static $offset = 4;
  public static $limit = 10;
  protected static $id;
  protected static $uid;
  protected static $page;
  public $data = array();
  public static $layout;
  public static $active_session;
  public static $post_data;
  public static $default_model;
  protected $skip_uid_validate = array('edit', 'remove', 'active');

  public function __construct() {
    parent::__construct();

    $this->data['directory'] = $this->router->directory;
    $this->data['class'] = $this->router->class;
    $this->data['method'] = ($this->router->class == $this->router->method) ? 'index' : $this->router->method;

    self::$id = $this->uri->segment(4);
    self::$uid = self::$page = $this->uri->segment(5);

    self::$active_session = $this->session->all_userdata();

    self::$post_data = $this->input->post();

    self::$default_model = ucfirst(singular($this->data['class']));

    if (file_exists(APPPATH . 'models/' . strtolower(self::$default_model) . '.php')) {
      $this->load->model(self::$default_model);
    }

    $this->data['title'] = $this->get_title();

    self::$layout = 'layout/default';
  }

  public function error_message($action = NULL, $callback_action = FALSE, $message = NULL) {
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
        FALSE => 'An error occurred on the page you access.'
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
    $config['per_page'] = (empty($limit)) ? self::$limit : $limit;
    $config['uri_segment'] = (empty($offset)) ? self::$offset : $offset;
    $config['suffix'] = $suffix;
    return $config;
  }

  protected function get_pagination() {
    return $this->pagination->create_links();
  }

  protected function get_site_url_pagination() {
    $dir = (empty($this->router->directory)) ? '' : $this->router->directory . '/';
    return $dir . $this->data['class'] . '/' . $this->data['method'];
  }

  protected function get_offset_from_segment($offset = NULL) {
    $offset = (empty($offset)) ? self::$offset : $offset;
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

  function get_password_salt() {
    return md5(uniqid());
  }

  function set_password($password = NULL, $password_salt = NULL) {
    $password_salt = (empty($password_salt)) ? $this->get_password_salt() : $password_salt;
    return md5($this->session->encryption_key . $password_salt . md5($password));
  }

  function get_validate_password($password = NULL, $user = NULL) {
    if ($this->set_password($password, $user['password_salt']) == $user['password']) {
      return TRUE;
    }
    return FALSE;
  }

  function set_encrype_user_data($data = array()) {
    $data['password_salt'] = $this->get_password_salt();
    $data['password_secure'] = $this->set_password($data['password'], $data['password_salt']);
    return $data;
  }

  function unset_array($data = array(), $unsets = array()) {
    foreach ($unsets as $unset) {
      unset($data[$unset]);
    }
    return $data;
  }

  function get_uid($id = NULL) {
    return md5($this->session->encryption_key . plural($this->router->class) . $id);
  }

  function validate_uid($id = NULL, $uid = NULL) {
    if ($this->get_uid($id) != $uid) {
      $this->error_message('redirect');
      redirect('admin/' . $this->router->class);
    }
  }

  function get_post_data($field = NULL, $unset = TRUE) {
    if (isset(self::$post_data[$field])) {
      $data = self::$post_data[$field];
      if ($unset) {
        unset(self::$post_data[$field]);
      }
      return $data;
    }
    return array();
  }

  function set_slug_post_data($name = 'name', $model = NULL) {
    $model = (empty($model)) ? self::$default_model : $model;
    if (empty(self::$post_data['slug'])) {
      $slug = url_title(self::$post_data[$name], 'dash', TRUE);
      $count = $this->{$model}->count_by('slug', $slug);
      if ($count > 0) {
        self::$post_data['slug'] = $slug . '-' . ($count + 1);
      } else {
        self::$post_data['slug'] = $slug;
      }
    }
  }

  function save_data_after($model = NULL, $data = array(), $field = NULL, $value = NULL, $validate = TRUE) {
    $this->load->model($model);
    return $this->{$model}->save_data_after($data, $field, $value, $validate);
  }

  function after_save($type = NULL, $callback = NULL) {
    if ($callback) {
      redirect($this->data['directory'] . '/' . $this->data['class']);
    }
    $this->error_message($type, $callback);
  }

  function get_title() {
    if ($this->data['method'] == 'index') {
      return ucwords($this->data['class'] . ' management');
    } else {
      return ucwords($this->data['method'] . ' ' . $this->data['class']);
    }
  }

}

?>