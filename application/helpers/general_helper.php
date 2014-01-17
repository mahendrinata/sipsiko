<?php

/**
 * Generates css link
 *
 * @access	public
 * @param	array
 * @return	string
 */
if (!function_exists('css')) {

  function css($links = array()) {
    $return = NULL;
    foreach ($links as $link) {
      $return .= external_css(base_url() . 'assets/css/' . $link . '.css');
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

  function js($links = array()) {
    $return = NULL;
    foreach ($links as $link) {
      $return .= external_js(base_url() . 'assets/js/' . $link . '.js');
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
?>