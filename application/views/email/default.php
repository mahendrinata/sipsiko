<html>
  <head>
    <style>
      body{
        background: #ececec;
      }
      #sipsiko-email-container{
        font-family: 'Helvetica Neue',Arial,Helvetica,Geneva,sans-serif;
        color: #E7CBA3;
        font-size: 9pt !important;
        max-width: 640px;
        min-width: 250px;
        width: 90%;
        margin: 20px auto;
      }
      #sipsiko-email-nav, #sipsiko-email-footer{
        background: #043948;
      }
      #sipsiko-email-nav{
        padding: 10px;
        border-radius: 10px 10px 0 0;
        -webkit-border-radius: 10px 10px 0 0;
        -moz-border-radius: 10px 10px 0 0;
      }
      #sipsiko-email-nav .list{
        float: right;
      }
      #sipsiko-email-nav .list a, #sipsiko-email-content a{
        text-decoration: none;
        color: #E7CBA3;
        margin-right: 10px;
      }
      #sipsiko-email-header{
        background: #00707b;
        padding: 20px;
        text-align: center;
      }
      #sipsiko-email-header h1{
        margin: 0;
        font-size: 40px;
      }
      #sipsiko-email-content{
        background: #FFF;
        padding: 20px 20px 40px;
        color: #000;
        line-height: 18px;
        font-size: 12px !important;
      }
      #sipsiko-email-content table{
        width: 100%;
      }
      #sipsiko-email-content td{
        font-size: 13px;
        text-wrap: normal;
      }
      #sipsiko-email-content h2{
        margin: 20px 0;
        color:#9A9661
      }
      #sipsiko-email-content a{
        color:#00707b;
        font-weight: bold;
      }
      #sipsiko-email-footer{
        padding: 40px 20px;
        color: #FFF;
        border-radius: 0 0 10px 10px;
        -webkit-border-radius: 0 0 10px 10px;
        -moz-border-radius: 0 0 10px 10px;
      }
      .clearfix{
        clear: both;
      }
    </style>
  </head>
  <body>
    <table id="sipsiko-email-container" border="0" cellpadding="0" cellspacing="0" >
      <tr>
      <td id="sipsiko-email-nav">
        <div id="list">
          <a href="#"><?php echo img('assets/email/img/like-glyph.png') ?> Like</a>
          <a href="#"><?php echo img('assets/email/img/tweet-glyph.png') ?> Tweet</a>
          <a href="#"><?php echo img('assets/email/img/forward-glyph.png') ?> Forward</a>
        </div>
        <div id="clearfix"></div>
      </td>
      </tr>
      <tr>
      <td id="sipsiko-email-header">
        <h1>SIPSIKO Indonesia</h1>
      </td>
      </tr>
      <tr>
      <td id="sipsiko-email-content">
        <?php
        if (!empty($layout)) {
          $this->load->view('email/'.$layout);
        }
        ?>
      </td>
      </tr>
      <tr>
      <td id="sipsiko-email-footer">
        Tes Psikologi On-line &copy; SIPSIKO <?php echo date('Y'); ?>
      </td>
      </tr>

    </table>
  </body>
</html>