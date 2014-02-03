<layout label="Text only">
  <table class="w580" border="0" cellpadding="0" cellspacing="0" width="580">
    <tbody><tr>
        <td class="w580" width="580">
          <p class="article-title" align="left"><singleline label="Title">Aktivasi Account SIPSIKO</singleline></p>
    <div class="article-content" align="left">
      <multiline label="Description">
        <table class="w580" border="0" cellpadding="0" cellspacing="0" width="580">
          <tr><td>Username</td><td>: <?php echo $user['username']; ?></td></tr>
          <tr><td>Nama</td><td>: <?php echo $user['first_name']; ?></td></tr>
          <tr><td>Email</td><td>: <?php echo $user['email']; ?></td></tr>
          <tr><td>Alamat</td><td>: <?php echo $user['address']; ?></td></tr>
          <tr><td>Kode Aktivasi</td><td>: <?php echo $user['activation_code']; ?></tr>
          <tr><td colspan="2"><br/></td></tr>
          <tr><td colspan="2"><p>
                Anda dapat melakukan aktivasi Account SIPSIKO dengan melakukan klik pada link di bawah ini : <br/>
                <?php echo anchor('activation/' . $user['activation_code'], base_url() . 'activation/' . $user['activation_code']); ?><br/><br/>
                atau memasukkan kode aktivasi pada link di bawah ini :<br/>
                <?php echo anchor('activation/', base_url() . 'activation/'); ?>
              </p></td>
          </tr>
          <tr><td colspan="2"><br/><br/></td></tr>
          <tr><td colspan="2">
              <p>
                Terima Kasih<br/><br/><br/><br/>
                SIPSIKO Indonesia
              </p>
            </td></tr>
        </table>
      </multiline>
    </div>
    </td>
    </tr>
    <tr><td class="w580" height="10" width="580"></td></tr>
    </tbody></table>
</layout>
