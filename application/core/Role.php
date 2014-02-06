<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

abstract class Role extends Basic_Enum {

  const ADMIN = 'ADMIN';
  const COMPANY = 'COMPANY';
  const MEMBER = 'MEMBER';
  const GUEST = 'GUEST';

  public static function get_list() {
    return array(
      Role::ADMIN,
      Role::COMPANY,
      Role::MEMBER,
      Role::GUEST
    );
  }

  public static function get_priority() {
    $roles = Role::get_list();
    foreach ($roles as $key => $value) {
      $priorities[$value] = $key;
    }
    return $priorities;
  }

  public static function get_map() {
    $map = array();
    foreach (Status::get_list() as $status) {
      $map[$status] = $status;
    }
    return $map;
  }

  public static function get_access($role = NULL) {
    $priorities = Role::get_priority();
    $accesses = array();
    foreach ($priorities as $key => $value) {
      if ($priorities[$role] >= $value) {
        $accesses[$key] = $value;
      }
    }
    return $accesses;
  }

}

?>