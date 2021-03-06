<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * UserTest model use to add all behavior UserTest
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class User_test extends App_Model {

  public $fields = array(
    array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
    array('name' => 'time_spent', 'type' => 'integer'),
    array('name' => 'status', 'type' => 'varchar', 'index' => TRUE),
    array('name' => 'user_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'test_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'created_at', 'type' => 'datetime'),
    array('name' => 'updated_at', 'type' => 'datetime'),
  );

}

?>