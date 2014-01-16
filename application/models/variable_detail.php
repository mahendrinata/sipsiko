<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * VariableDetail model use to add all behavior VariableDetail
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class VariableDetail extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'description', 'type' => 'text'),
      array('name' => 'company_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'variable_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  
}

?>