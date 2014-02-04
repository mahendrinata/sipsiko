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
        <p>Masukkan email yang sudah terdaftar pada SIPSIKO.</p>
      </div>
    </div>
    <div class="three-fourth last">
      <div id="contact-form">
        <div id="message"></div>
        <?php
        echo form_open('reset-password', 'name="contactform" id="contactform"');
        echo form_input('email', set_value('email'), 'style="width: 85%;max-width: 400px;"placeholder="Email"');
        echo label_error('email', '<label class="label label-danger">', '</label>');
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