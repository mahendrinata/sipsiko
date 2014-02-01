<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Employee model use to add all behavior Employee
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Employee extends App_Model {

  public $fields = array(
    array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
    array('name' => 'status', 'type' => 'varchar'),
    array('name' => 'user_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'company_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'created_at', 'type' => 'datetime'),
    array('name' => 'updated_at', 'type' => 'datetime'),
  );

}

?>