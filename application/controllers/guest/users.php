<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Users extends Guest_Controller {

  public function register() {
    if (!empty(App_Controller::$POST_DATA)) {
      if (!in_array(App_Controller::$POST_DATA['role'], array(Role::COMPANY, Role::MEMBER))) {
        App_Controller::$POST_DATA['role'] = NULL;
      }
    }

    $this->form_validation->set_rules($this->User->validate);
    if ($this->form_validation->run()) {
      $user = $this->set_encrype_user_data(App_Controller::$POST_DATA);
      $user['status'] = Status::INACTIVE;
      $user['activation_code'] = $this->set_activation_code($user);
      $register = $this->User->insert($user, TRUE);
      if ($register) {
        $this->show_message('insert', $register, 'Now, You registered as ' . ucfirst(App_Controller::$POST_DATA['role'] . ' in SIPSIKO'));
        redirect('login');
      } else {
        $this->show_message('insert', $register);
      }
    }
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function activation($code) {
    $user = $this->User->set_active_by_code($code);
    if ($user) {
      $this->show_message('update', $user, 'Now, Your Account is active');
      redirect('login');
    } else {
      $this->show_message('update', $user, 'Your activation code is wrong.');
      redirect('/');
    }
  }

  public function login() {
    if (isset(App_Controller::$USER) && !empty(App_Controller::$USER)) {
      redirect(strtolower(App_Controller::$USER['role']) . '/homes');
    }

    if ($this->form_validation->run()) {
      $user = $this->User->get_by(array(
        'username' => App_Controller::$POST_DATA['username'],
        'status' => Status::ACTIVE));

      if (!empty($user) && $this->get_validate_password(App_Controller::$POST_DATA['password'], $user)) {
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