<!DOCTYPE html>
<html>
  <head>
    <title><?php echo isset($title) ? 'SIPSIKO - ' . $title : 'SIPSIKO - Sistem Informasi Psikotest Online'; ?></title>
    <?php
    echo external_css('http://fonts.googleapis.com/css?family=Lato:100,300,400,700');
    echo css(array(
      'application',
      'isotope',
      'normalize',
      'fullcalendar',
      'datatables',
      'prettify',
      'classyscroll',
      'jquery.fancybox',
      'select2',
      'bootstrap.min',
      'fontawesome',
      'style',
      'color/green',
      'color/orange',
      'color/magenta',
      'color/gray'
    ));
    echo external_js(array(
      'http://code.jquery.com/jquery-1.10.1.min.js',
      'http://code.jquery.com/ui/1.10.3/jquery-ui.js'
    ));
    echo js(array(
      'modernizr.custom',
      'bootstrap.min',
      'jquery.mousewheel',
      'jquery.classyscroll',
      'jquery.classyscroll',
      'jquery.vmap.min',
      'jquery.vmap.sampledata',
      'fullcalendar.min',
      'gcal',
      'prettify',
      'jquery.dataTables.min',
      'jquery.fancybox.pack',
      'jquery.sparkline.min',
      'jquery.easy-pie-chart',
      'excanvas.min',
      'jquery.isotope.min',
      'select2',
      'styleswitcher',
      'main'
    ));
    ?>
    <meta content="width=device-width, initial-scale=1.0" charset="utf-8" name="viewport"/>
  </head>
  <body>
    <?php
    $this->load->view('element/navigation/navigation');
    $this->load->view('element/general/content');
    ?>
  </body>
</html>