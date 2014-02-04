<div id="content" class="container clearfix">
  <nav id="page-title" >
    <h1>Daftar sebagai Perusahaan atau Anggota</h1>
  </nav>
</div>
</div>
<div id="contact-map" style="height: 600px;">
  <div id="contact-info" style="top: 250px;">
    <div class="one-fourth">
      <div id="contact-details">
        <h4>Syarat dan ketentuan</h4>
        <p>Pengguna hanya dapat mendaftar sebagai Perusahaan atau Anggota.</p>

        <br/>
        <h4>Perusahaan</h4>
        <p>
        <ul>
          <li>Dapat membuat tes psikologi online (Public atau Private).</li>
          <li>Mempunyai anggota untuk dilakukan tes psikologi.</li>
        </ul>
        </p>

        <h4>Anggota</h4>
        <p>
        <ul>
          <li>Dapat melakukan tes psikologi online yang Public maupun yang diberikan oleh perusahaan.</li>
          <li>Mempunyai hasil dan analisa tes psikologi.</li>
        </ul>
        </p>
      </div>
    </div>
    <div class="three-fourth last">
      <div id="contact-form">
        <h4>Daftarkan Dirimu Sekarang</h4>
        <div id="message"></div>
        <?php
        echo form_open('register', 'name="contactform" id="contactform"');
        echo form_input('first_name', set_value('first_name'), 'placeholder="Nama Depan"');
        echo form_input('email', set_value('email'), 'placeholder="Email"');
        echo form_input('username', set_value('username'), 'placeholder="Username" class="last"');
        ?>
        <div class="clearfix"></div>
        <?php
        echo label_error('first_name', '<label class="label label-danger">', '</label>');
        echo label_error('username', '<label class="label label-danger">', '</label>');
        echo label_error('email', '<label class="label label-danger">', '</label>');
        echo form_textarea('address', set_value('address'), 'cols="10" rows="3" placeholder="Alamat"');
        ?>
        <div class="clearfix"></div>
        <?php
        echo label_error('address', '<label class="label label-danger">', '</label>');
        echo form_password('password', set_value('password'), 'size="30" placeholder="Password"');
        echo form_password('password_confirmation', set_value('password_confirmation'), 'size="30" placeholder="Konfirmasi Password"');
        echo form_dropdown('role', array('ANGGOTA ATAU PERUSAHAAN' => array('MEMBER' => 'ANGGOTA', 'COMPANY' => 'PERUSAHAAN')), set_value('role'), 'style="width: 205px;border: 1px solid #F2F2F2;background: #FFF;color: #8C8C8C;height: 35px;padding: 7px 10px;width: 228px;"');
        ?>
        <div class="clearfix"></div>
        <?php
        echo label_error('password', '<label class="label label-danger">', '</label>');
        echo label_error('password_confirmation', '<label class="label label-danger">', '</label>');
        echo label_error('role', '<label class="label label-danger">', '</label>');
        ?>
        <div class="clearfix"></div>
        <br/>
        <?php
        echo form_submit(NULL, 'Daftar', 'class="btn-image" id="submit" ');
        echo form_close();
        ?>
      </div>
    </div>
  </div>		
</div>