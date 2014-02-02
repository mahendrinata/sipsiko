<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo isset($title) ? 'SIPSIKO - ' . $title : 'SIPSIKO - Sistem Pakar Tes Psikotes Online'; ?></title>
    <?php echo link_tag('assets/favicon.gif', 'shortcut icon', 'image/ico'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php
    echo css(array(
      'style',
//      'style-green',
//      'style-orange',
      'fullwidth',
      'revolution-settings'
      ), 'assets/frontend/');
    echo js(array(
      'jquery.min',
      'styleswitch',
      'script',
      'selectnav.min',
      'rs-plugin/jquery.themepunch.plugins.min',
      'rs-plugin/jquery.themepunch.revolution.min',
      'resolution',
      'jquery.jigowatt',
      ), 'assets/frontend/');

    if ($method == 'contact') {
      echo external_js('http://maps.google.com/maps/api/js?sensor=false');
      echo js(array('maps'), 'assets/frontend/');
    }
    ?>

  </head>
  <body <?php
  if ($method == 'contact') {
    echo 'onload="initialize()"';
  }
  ?>>
    <div id="header-bg"></div>
    <?php
    $this->load->view('element/navigation/frontend_nav');
    $this->load->view('element/general/content');
    $this->load->view('element/general/frontend_footer');
//    $this->load->view('element/general/frontend_css_switcher');
    $this->load->view('element/general/frontend_back_top');
    ?>
  </body>
</html>
