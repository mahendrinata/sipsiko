<div id="body-wrapper">
  <div id="header" >
    <a href="index.html" id="logo"></a>
    <ul id="navigation">
      <li><?php echo anchor('home', 'Beranda');?></li>
      <li><?php echo anchor('about-us', 'Tentang Kami');?></li>
      <li>
        <?php echo anchor('feature', 'Fiture');?>
        <ul>
          <li><?php echo anchor('company', 'Perusahaan');?></li>
          <li><?php echo anchor('member', 'Anggota');?></li>
        </ul>
      </li>
      <li><?php echo anchor('contact', 'Kontak');?></li>
      <li>
        <?php echo anchor('login', 'Login');?>
        <ul>
          <li><?php echo anchor('register', 'Daftar');?></li>
        </ul>
      </li>
    </ul>
  </div>
</div>