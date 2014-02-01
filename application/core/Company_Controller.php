<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Member Controller use to add all function used by member user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Company_Controller extends App_Controller {

  public function __construct() {
    parent::__construct();
    if (!isset(App_Controller::$USER) || empty(App_Controller::$USER) || App_Controller::$USER['role'] != Role::COMPANY) {
      $this->error_message('access', FALSE);
      redirect('guest/users/login');
    }
  }

}

?>