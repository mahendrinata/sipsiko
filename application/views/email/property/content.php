<tr id="simple-content-row">
  <td class="w640" bgcolor="#ffffff" width="640">
    <table class="w640" border="0" cellpadding="0" cellspacing="0" width="640">
      <tbody>
        <tr>
          <td class="w30" width="30"></td>
          <td class="w580" width="580">
            <repeater>
               <?php 
                $layout = (!isset($layout) || empty($layout))? 'text_only' : $layout;
                $this->load->view('email/'.$layout);
               ?>
            </repeater>
          </td>
          <td class="w30" width="30"></td>
        </tr>
      </tbody>
    </table>
  </td>
</tr>