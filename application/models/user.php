<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * User model use to add all behavior user
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class User extends App_Model {

  public $fields = array(
    array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
    array('name' => 'username', 'type' => 'varchar', 'require' => TRUE, 'unique' => TRUE, 'index' => TRUE),
    array('name' => 'first_name', 'type' => 'varchar', 'require' => TRUE),
    array('name' => 'middle_name', 'type' => 'varchar'),
    array('name' => 'last_name', 'type' => 'varchar'),
    array('name' => 'email', 'type' => 'varchar', 'require' => TRUE, 'unique' => TRUE, 'index' => TRUE),
    array('name' => 'address', 'type' => 'text'),
    array('name' => 'phone', 'type' => 'varchar'),
    array('name' => 'photo', 'type' => 'varchar'),
    array('name' => 'description', 'type' => 'text'),
    array('name' => 'status', 'type' => 'varchar', 'index' => TRUE, 'require' => TRUE),
    array('name' => 'password', 'type' => 'varchar', 'require' => TRUE),
    array('name' => 'password_salt', 'type' => 'varchar', 'require' => TRUE),
    array('name' => 'activation_code', 'type' => 'varchar', 'require' => TRUE),
    array('name' => 'status', 'type' => 'varchar', 'index' => TRUE),
    array('name' => 'parent_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'created_at', 'type' => 'datetime'),
    array('name' => 'updated_at', 'type' => 'datetime'),
  );
  public $has_many = array('company', 'employee', 'user_test');
  public $validate = array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'required|alpha_numeric|is_unique[users.username]'
    ),
    array(
      'field' => 'first_name',
      'label' => 'Nama Depan',
      'rules' => 'required'
    ),
    array(
      'field' => 'email',
      'label' => 'Email',
      'rules' => 'required|valid_email|is_unique[users.email]'
    ),
    array(
      'field' => 'role',
      'label' => 'Role',
      'rules' => 'required'
    ),
    array(
      'field' => 'password',
      'label' => 'Password',
      'rules' => 'required|min_length[5]'
    ),
    array(
      'field' => 'password_confirmation',
      'label' => 'Konfirmasi Password',
      'rules' => 'required|min_length[5]|matches[password]'
    )
  );

  public function set_active_by_code($code = NULL) {
    $user = $this->get_by(array('activation_code' => $code));
    if (!empty($user)) {
      return $this->update($user['id'], array('status' => Status::ACTIVE, 'activation_code' => NULL), TRUE);
    } else {
      return FALSE;
    }
  }

}

?>