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
      'fullwidth',
      'revolution-settings'
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
    ?>

  </head>
  <body>
    <div id="header-bg"></div>
    <?php
    $this->load->view('element/navigation/frontend_nav');
    $this->load->view('element/general/content');
    $this->load->view('element/general/frontend_footer');
    $this->load->view('element/general/frontend_back_top');
    ?>
  </body>
</html>