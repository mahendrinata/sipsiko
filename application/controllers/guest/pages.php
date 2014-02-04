<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Pages extends Guest_Controller {

  public function index() {
    $this->load->model('User');
    $user = $this->User->get(1);
    $layout = 'send_activation_code';
    $this->load->view('email/default', compact('user','layout'));
//    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function about() {
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function feature() {
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function company() {
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function member() {
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function contact() {
    $this->load->view('layout/frontend_maps', $this->data);
  }

}

?>