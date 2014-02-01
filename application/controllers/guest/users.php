<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Users extends Guest_Controller {

  public function login() {
    if (isset(App_Controller::$USER) && !empty(App_Controller::$USER)) {
      redirect(strtolower(App_Controller::$USER['role']) . '/homes');
    }
    
    if ($this->form_validation->run()) {
      $user = $this->User->get_by(array(
        'username' => App_Controller::$POST_DATA['username'],
        'status' => Status::ACTIVE));

      if ($this->get_validate_password(App_Controller::$POST_DATA['password'], $user)) {
        $this->show_message('login', TRUE, 'You success login.');

        $this->session->set_userdata('user', $user);
        redirect(strtolower($user['role']) . '/homes');
      } else {
        $this->show_message('login', FALSE, 'Sorry, Your username or password is wrong.');
      }
    }

    $this->load->view('layout/login', $this->data);
  }

  public function logout() {
    $this->session->sess_destroy();
    $this->show_message('logout', TRUE, 'You success logout.');
    redirect('login');
  }

}

?>