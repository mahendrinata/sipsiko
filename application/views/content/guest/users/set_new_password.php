<div id="content" class="container clearfix">
  <nav id="page-title" >
    <h1>Reset Password Akun</h1>
  </nav>
</div>
</div>
<div id="contact-map" style="height: 500px;">
  <div id="contact-info" style="top: 250px;">
    <div class="one-fourth">
      <div id="contact-details">
        <h4>Syarat dan ketentuan</h4>
        <p>Masukkan password sesuai ketentuan.</p>
      </div>
    </div>
    <div class="three-fourth last">
      <div id="contact-form">
        <div id="message"></div>
        <?php
        echo form_open('set-new-password', 'name="contactform" id="contactform"');
        echo form_hidden('code', $user['code'], 'readonly="readonly"');
        echo form_input('password', set_value('password'), 'style="width: 85%;max-width: 400px;"placeholder="Password"');
        echo label_error('password', '<label class="label label-danger">', '</label>');
        ?>
        <div class="clearfix"></div>
        <br/>
        <?php
        echo form_input('password_confirmation', set_value('password_confirmation'), 'style="width: 85%;max-width: 400px;"placeholder="Konfirmasi Password"');
        echo label_error('password_confirmation', '<label class="label label-danger">', '</label>');
        ?>
        <div class="clearfix"></div>
        <br/>
        <?php
        echo form_submit(NULL, 'Reset Password', 'class="btn-image" id="submit" ');
        echo form_close();
        ?>
      </div>
    </div>
  </div>		
</div>