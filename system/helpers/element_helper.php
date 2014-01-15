<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

function get_dropdown($values = array(), $value_group = NULL, $value_field = NULL, $model = NULL, $option = array(), $datas = array()) {
  if (empty($datas)) {
    $CI = get_instance();
    $CI->load->model($model);
    $datas = $CI->{$model}->dropdown('id', 'name');
  }
  if (is_array($values)) {
    $default = array();
    foreach ($values as $value) {
      $default[] = $value[$value_field];
    }
    return bootstrap_form_dropdown($value_group . '[' . $value_field . ']', $default, array_merge(array('list' => $datas), $option));
  } else {
    return bootstrap_form_dropdown($value_group, $value_field, array_merge(array('list' => $datas), $option));
  }
}

function get_label_dropdown($datas = array(), $field = NULL, $list = array(), $model = NULL) {
  if (empty($list)) {
    $CI = get_instance();
    $CI->load->model('Role_model');
    $list = $CI->{$model}->dropdown('id', 'name');
  }
  $output = NULL;
  foreach ($datas as $data) {
    $output .= '<span class="label label-warning">' . $list[$data[$field]] . '</span><br/>';
  }
  return $output;
}

function get_label_active($status = NULL, $string = array('Not Active', 'Active'), $label = array('important', 'success')) {
  $status = (empty($status)) ? FALSE : $status;
  return '<span class="label label-' . $label[$status] . '">' . $string[$status] . '</span>';
}

?>