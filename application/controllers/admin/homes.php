<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Homes extends Admin_Controller {

  public function index() {
    $this->load->view(self::$LAYOUT, $this->data);
  }

}

?>