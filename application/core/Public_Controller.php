<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Public Controller use to add all function used by guest user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Public_Controller extends App_Controller {

  public static $template_folder = 'template';
  public static $language;
  public static $default_language = 'ID';

  public function __construct() {
    parent::__construct();
    self::$offset = 3;
    $this->load->model('Content_model');

    $this->set_settings();

    $this->set_language();

    $this->set_menu();

    $this->set_widget();
  }

  function set_settings() {
    $this->load->model('Setting_model');
    $this->data['web_setting'] = $setting = $this->Setting_model->get_settings_mapper_slug();

    $this->data['template_data'] = $template = $this->Setting_model->get_settings_by_type('template', $setting);
    self::$layout = self::$template_folder . '/' . $template['value'] . '/layout/';
    self::$layout_default = self::$layout . $this->data['class'];

    $this->data['template'] = self::$template_folder . '/' . $template['value'] . '/';

    $this->load->model('Language_model');
    $this->data['languages'] = $this->Language_model->get_many_by('is_active', TRUE);
  }

  function set_language() {
    if (!isset(self::$active_session['language']) || empty(self::$active_session['language'])) {
      $this->load->model('Language_model');
      self::$language = $this->Language_model->get_by('slug', self::$default_language);
      $this->session->set_userdata('language', self::$language);
    }
  }

  function set_menu() {
    $this->load->model('Link_model');
    $this->data['frontend_menu'] = $this->Link_model->get_menus('frontend-menu');
  }

  function set_widget() {
    $this->data['widget']['video'] = '//www.youtube.com/embed/I_Wyn1FgXwI';

    $this->load->model('Media_model');
    $this->data['widget']['image'] = $this->Media_model->get_random_gallery();

    $this->data['widget']['recent'] = $this->Content_model->get_recent_content();
  }

}

?>