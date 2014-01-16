<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Question model use to add all behavior Question
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Question extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'description', 'type' => 'text'),
      array('name' => 'status', 'type' => 'varchar'),
      array('name' => 'test_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  
}

?>