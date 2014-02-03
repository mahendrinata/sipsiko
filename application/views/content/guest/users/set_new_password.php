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
        <form method="post" action="set-new-password" name="contactform" id="contactform">
          <input type="hidden" readonly="readonly" name="id" value="<?php echo (isset($user['id'])) ? $user['id'] : NULL; ?>">
          <input name="password" type="password" style="width: 85%;max-width: 400px;"placeholder="Password" >
          <div class="clearfix"></div>
          <br/>
          <input name="password_confirmation" type="password" style="width: 85%;max-width: 400px;"placeholder="Konfirmasi Password" >
          <div class="clearfix"></div>
          <br/>
          <input type="submit" class="btn-image" id="submit" value="Reset Password" />
        </form>
      </div>
    </div>
  </div>		
</div>