<div id="content" class="container clearfix">
  <nav id="page-title" >
    <h1>Aktivasi Akun dengan Kode</h1>
  </nav>
</div>
</div>
<div id="contact-map" style="height: 500px;">
  <div id="contact-info" style="top: 250px;">
    <div class="one-fourth">
      <div id="contact-details">
        <h4>Syarat dan ketentuan</h4>
        <p>Masukkan kode aktivasi yang telah dikirimkan ke email anda.</p>
      </div>
    </div>
    <div class="three-fourth last">
      <div id="contact-form">
        <div id="message"></div>
        <?php
        echo form_open('activation-by-code', 'name="contactform" id="contactform"');
        echo form_input('code', set_value('code'), 'style="width: 85%;max-width: 400px;"placeholder="Kode Aktivasi"');
        echo label_error('code', '<label class="label label-danger">', '</label>');
        ?>
        <div class="clearfix"></div>
        <br/>
        <?php
        echo form_submit(NULL, 'Aktivasi Akun', 'class="btn-image" id="submit" ');
        echo form_close();
        ?>
      </div>
    </div>
  </div>		
</div>