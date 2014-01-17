<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Users extends Guest_Controller {
  
  public function login(){
    $this->load->view('layout/login', $this->data);
  }
  
}

?>