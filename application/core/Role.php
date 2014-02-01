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

  public static function get_map() {
    $map = array();
    foreach (Status::get_list() as $status) {
      $map[$status] = $status;
    }
    return $map;
  }

}

?>