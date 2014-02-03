<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <title>SIPSIKO Indonesia</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=320, target-densitydpi=device-dpi">
    <?php $this->load->view('email/property/stylesheet'); ?>
  </head>
  <body>
    <table id="background-table" border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td align="center" bgcolor="#ececec">
            <table class="w640" style="margin:0 10px;" border="0" cellpadding="0" cellspacing="0" width="640">
              <tbody>
                <tr>
                  <td class="w640" height="20" width="640"></td>
                </tr>
                <?php $this->load->view('email/property/header') ?>
                <?php $this->load->view('email/property/title') ?>

                <tr><td class="w640" bgcolor="#ffffff" height="30" width="640"></td></tr>
                <?php $this->load->view('email/property/content'); ?>
                <tr><td class="w640" bgcolor="#ffffff" height="15" width="640"></td></tr>

                <tr>
                  <td class="w640" width="640">
                    <?php $this->load->view('email/property/footer'); ?>
                  </td>
                </tr>
                <tr><td class="w640" height="60" width="640"></td></tr>
              </tbody>
            </table>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
