<div id="content" class="container clearfix">
  <nav id="page-title" >
    <h1>Login</h1>
  </nav>
</div>
</div>
<div id="contact-map" style="height: 500px;">
  <div id="contact-info" style="top: 250px;">
    <div class="one-fourth">
      <div id="contact-details">
        <h4>Syarat dan ketentuan</h4>
        <p>Masukkan username dan password yang sesuai.</p>
        <p>
          <?php echo anchor('reset-password', '<h4>Lupa Password</h4>', 'style="color:#428BCA"') ?>
        </p>
      </div>
    </div>
    <div class="three-fourth last">
      <div id="contact-form">
        <div id="message"></div>
        <?php
        echo form_open('login', 'name="contactform" id="contactform"');
        echo form_input('username', set_value('username'), 'style="width: 85%;max-width: 400px;"placeholder="Username"');
        echo label_error('username', '<label class="label label-danger">', '</label>');
        ?>
        <div class="clearfix"></div>
        <br/>
        <?php
        echo form_input('password', set_value('password'), 'style="width: 85%;max-width: 400px;"placeholder="Password"');
        echo label_error('password', '<label class="label label-danger">', '</label>');
        ?>
        <div class="clearfix"></div>
        <br/>
        <?php
        echo form_submit(NULL, 'Login', 'class="btn-image" id="submit" ');
        echo form_close();
        ?>
      </div>
    </div>
  </div>		
</div>