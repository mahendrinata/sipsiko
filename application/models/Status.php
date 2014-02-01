<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

abstract class Status extends Basic_Enum {

  const ACTIVE = 'ACTIVE';
  const INACTIVE = 'INACTIVE';
  const VOID = 'VOID';

  public static function get_list() {
    return array(
      Status::ACTIVE,
      Status::INACTIVE,
      Status::VOID
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