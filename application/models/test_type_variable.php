<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * TestTypeVariable model use to add all behavior TestTypeVariable
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Test_type_variable extends App_Model {

  public $fields = array(
    array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
    array('name' => 'test_type_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'variable_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'created_at', 'type' => 'datetime'),
    array('name' => 'updated_at', 'type' => 'datetime'),
  );

}

?>