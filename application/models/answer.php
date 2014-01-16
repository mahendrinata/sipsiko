<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Answer model use to add all behavior Answer
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Answer extends App_Model {

  public $fields = array(
      array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
      array('name' => 'description', 'type' => 'text'),
      array('name' => 'value', 'type' => 'integer'),
      array('name' => 'question_id', 'type' => 'integer', 'index' => TRUE),
      array('name' => 'created_at', 'type' => 'datetime'),
      array('name' => 'updated_at', 'type' => 'datetime'),
  );
  
}

?>