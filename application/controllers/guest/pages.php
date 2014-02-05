<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Pages extends Guest_Controller {

  public function index() {
    $this->data['title'] = 'SIPSIKO - Sistem Tes Psikologi Online';
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function about() {
    $this->data['title'] = 'Tentang SIPSIKO';
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function feature() {
    $this->data['title'] = 'Fitur SIPSIKO';
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function company() {
    $this->data['title'] = 'Fitur Akun Perusahaan';
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function member() {
    $this->data['title'] = 'Fitur Akun Anggota';
    $this->load->view(App_Controller::$LAYOUT, $this->data);
  }

  public function contact() {
    $this->data['title'] = 'Kontak SIPSIKO';
    $this->load->view('layout/frontend_maps', $this->data);
  }

}

?>