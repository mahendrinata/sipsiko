<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo isset($title) ? $title : 'SIPSIKO - Sistem Pakar Tes Psikotes Online'; ?></title>
    <?php echo link_tag('assets/favicon.gif', 'shortcut icon', 'image/ico'); ?>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Aplikasi Sistem Tes Psikologi Online Multi dan Custum Variabel Tes. Merupakan Aplikasi yang dapat mendukung sebuah perusahaan maupun anggota"/>
    <meta name=”robots” content=”noindex, nofollow”/>
    <meta name=”keywords” content=”meta tags,tes psikologi, sipsiko”/>
    <meta name=”google” content=”notranslate” />    
    <meta name="author" content="Mahendri Winata (mahen.0112@gmail.com)"/>
    <?php
    echo css(array(
      'style',
      'fullwidth',
      'revolution-settings',
      'customize'
      ), 'assets/frontend/');
    echo js(array(
      'jquery.min',
      'styleswitch',
      'selectnav.min',
      'rs-plugin/jquery.themepunch.plugins.min',
      'rs-plugin/jquery.themepunch.revolution.min',
      'resolution',
      'jquery.prettyPhoto',
      'jquery.quicksand',
      'jquery.easing.1.3',
      'script',
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
    $this->load->view('element/general/frontend_back_top');
    ?>
  </body>
</html>
