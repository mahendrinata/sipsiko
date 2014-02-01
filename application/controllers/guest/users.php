<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Users extends Guest_Controller {

  public function login() {
    if ($this->form_validation->run()) {
      $user = $this->User->get_by(array(
        'username' => App_Controller::$POST_DATA['username'],
        'status' => Status::ACTIVE));

      if ($this->get_validate_password(App_Controller::$POST_DATA['password'], $user)) {
        $this->error_message('login', TRUE, 'You success login.');

        $this->session->set_userdata('user', $user);
        redirect(strtolower($user['role']) . '/homes');
      } else {
        $this->error_message('login', FALSE, 'Sorry, Your username or password is wrong.');
      }
    }

    $this->load->view('layout/login', $this->data);
  }

}

?>