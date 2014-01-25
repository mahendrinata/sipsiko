<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Company model use to add all behavior Company
 * @author Mahendri Winata <mahen.0112@gmail.com>
 */
class Company extends AppModel {

  public $fields = array(
    array('name' => 'id', 'type' => 'integer', 'require' => TRUE, 'primary_key' => TRUE, 'auto_increment' => TRUE),
    array('name' => 'slug', 'type' => 'varchar', 'require' => TRUE, 'unique' => TRUE, 'index' => TRUE),
    array('name' => 'name', 'type' => 'varchar', 'require' => TRUE),
    array('name' => 'description', 'type' => 'text'),
    array('name' => 'status', 'type' => 'varchar'),
    array('name' => 'user_id', 'type' => 'integer', 'index' => TRUE),
    array('name' => 'created_at', 'type' => 'datetime'),
    array('name' => 'updated_at', 'type' => 'datetime'),
  );

}

?>