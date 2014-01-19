<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Variable model use to add all behavior Variable
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Variable extends AppModel {

  public $fields = array(
    array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
    array('name' => 'name', 'type' => 'varchar', 'require' => TRUE),
    array('name' => 'company_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'created_at', 'type' => 'datetime'),
    array('name' => 'updated_at', 'type' => 'datetime'),
  );

}

?>