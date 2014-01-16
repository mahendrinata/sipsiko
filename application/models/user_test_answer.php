<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * UserTestAnswer model use to add all behavior UserTestAnswer
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class UserTestAnswer extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'user_test_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'answer_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  
}

?>