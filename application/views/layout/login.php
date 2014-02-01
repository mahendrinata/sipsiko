<!DOCTYPE html>
<html>
  <head>
    <title><?php echo isset($title) ? 'SIPSIKO - ' . $title : 'SIPSIKO - Sistem Pakar Tes Psikotes Online'; ?></title>
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
    <div class="container-fluid">
      <div class="login">
        <div class="login-container">
          <?php echo img(array('src' => 'assets/img/logo-login_2x.png', 'height' => 30, 'width' => 100)); ?>
          <?php echo form_open('login'); ?>
          <div class="form-group <?php echo has_error('username') ?>">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-envelope"></i></span>
              <?php echo form_input('username', NULL, 'class="form-control" placeholder="Username"'); ?>
            </div>
            <?php echo label_error('username') ?>
          </div>
          <div class="form-group <?php echo has_error('password'); ?>">
            <div class="input-group">
              <span class="input-group-addon"><i class="icon-lock"></i></span>
              <?php echo form_password('password', NULL, 'class="form-control" placeholder="Password"'); ?>
            </div>
            <?php echo label_error('password'); ?>
          </div>
          <div class="form-group">
            <label class="checkbox">
              <input type="checkbox"/>
              Remember me</label>
          </div>
          <?php echo form_submit('submit', 'Login', 'class="btn btn-lg btn-primary login-submit"'); ?>
          <?php echo form_close(); ?>
          <a href="index.html#">Forgot password?</a></div>
      </div>
    </div>  
  </body>
</html>
