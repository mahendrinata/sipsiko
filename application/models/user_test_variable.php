<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * UserTestVariable model use to add all behavior UserTestVariable
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class UserTestVariable extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'user_test_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'variable_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'value', 'type' => 'integer'),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  
}

?>