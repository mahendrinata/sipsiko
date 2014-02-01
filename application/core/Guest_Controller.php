<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Guest Controller use to add all function used by guest user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Guest_Controller extends App_Controller {

  public function __construct() {
    parent::__construct();
    if (isset(App_Controller::$USER) && !empty(App_Controller::$USER)) {
      redirect(strtolower(App_Controller::$USER['role']) . '/homes');
    }
  }

}

?>