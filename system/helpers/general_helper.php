<?php

/**
 * Generates css link
 *
 * @access	public
 * @param	array
 * @return	string
 */
if (!function_exists('css')) {

  function css($links = array(), $folder = 'assets/') {
    $return = NULL;
    foreach ($links as $link) {
      $return .= external_css(base_url() . $folder . 'css/' . $link . '.css');
    }
    return $return;
  }

}

if (!function_exists('external_css')) {

  function external_css($url = NULL, $return = NULL) {
    if (is_array($url)) {
      foreach ($url as $link) {
        $return .= '<link rel="stylesheet" href="' . $link . '" />';
      }
    } else {
      $return .= '<link rel="stylesheet" href="' . $url . '" />';
    }
    return $return;
  }

}

// ------------------------------------------------------------------------

/**
 * Generates js link
 *
 * @access	public
 * @param	array
 * @return	string
 */
if (!function_exists('js')) {

  function js($links = array(), $folder = 'assets/') {
    $return = NULL;
    foreach ($links as $link) {
      $return .= external_js(base_url() . $folder . 'js/' . $link . '.js');
    }
    return $return;
  }

}

if (!function_exists('external_js')) {

  function external_js($url = NULL, $return = NULL) {
    if (is_array($url)) {
      foreach ($url as $link) {
        $return .= '<script type="text/javascript" src="' . $link . '"></script>';
      }
    } else {
      $return .= '<script type="text/javascript" src="' . $url . '"></script>';
    }
    return $return;
  }

}

if (!function_exists('has_error')) {

  function has_error($field = NULL, $return = 'has-error') {
    $error = form_error('username');
    return (empty($error)) ? NULL : $return;
  }

}

if (!function_exists('label_error')) {

  function label_error($field = NULL, $preffix = '<label class="control-label">', $suffix = '</label>') {
    $error = form_error($field, $preffix, $suffix);
    return (empty($error)) ? NULL : $error;
  }

}

if (!function_exists('jquery_alert')) {

  function jquery_alert_form($field = NULL) {
    $uid = rand(0, 10000);
    $preffix = '<div class="#error-message-' . $uid . '" style="display:none;">';
    $suffix = '</div>'
      . '<script type="text/javascript">'
      . '$(document).ready(function() {'
      . '$("#error-message-' . $uid . '").slideDown(800).delay(8000).slideUp(800);'
      . '});'
      . '</script>';
    return form_error($field, $preffix, $suffix);
  }

}
?>