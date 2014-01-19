<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Homes extends AdminController {
  
  public function index(){
    $this->load->view(self::$layout, $this->data);
  }
  
}

?>