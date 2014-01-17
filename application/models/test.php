<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Test model use to add all behavior Test
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Test extends App_Model {

  public $fields = array(
    array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
    array('name' => 'name', 'type' => 'varchar', 'require' => TRUE),
    array('name' => 'description', 'type' => 'text'),
    array('name' => 'duration', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'start_date', 'type' => 'date'),
    array('name' => 'end_date', 'type' => 'date'),
    array('name' => 'status', 'type' => 'varchar'),
    array('name' => 'is_public', 'type' => 'boolean'),
    array('name' => 'company_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'test_type_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'created_at', 'type' => 'datetime'),
    array('name' => 'updated_at', 'type' => 'datetime'),
  );

}

?>