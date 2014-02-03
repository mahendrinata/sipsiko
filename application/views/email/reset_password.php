<h2>Reset Password SIPSIKO</h2>

<table class="w580" border="0" cellpadding="0" cellspacing="0" width="580">
  <tr><td>Username</td><td>: <?php echo $user['username']; ?></td></tr>
  <tr><td>Nama</td><td>: <?php echo $user['first_name']; ?></td></tr>
  <tr><td>Email</td><td>: <?php echo $user['email']; ?></td></tr>
  <tr><td>Alamat</td><td>: <?php echo $user['address']; ?></td></tr>
  <tr><td colspan="2"><br/></td></tr>
  <tr><td colspan="2"><p>
        Anda dapat melakukan pergantian password dengan melakukan klik pada link di bawah ini : <br/>
        <?php echo anchor('set-new-password/' . $user['activation_code'], base_url() . 'set-new-password/' . $user['activation_code']); ?><br/><br/>
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
