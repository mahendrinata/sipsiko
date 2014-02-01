<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Admin Controller use to add all function admin used by user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Admin_Controller extends App_Controller {

  public function __construct() {
    parent::__construct();
    if (!isset(App_Controller::$POST_DATA[Role::ADMIN]) || empty(App_Controller::$POST_DATA[Role::ADMIN])) {
      $this->error_message('access', FALSE);
      redirect('guest/users/login');
    } else {
      App_Controller::$USER = App_Controller::$POST_DATA[Role::ADMIN];
    }
  }

}

?>