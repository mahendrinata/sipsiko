<div id="body-wrapper">
  <div id="header" >
    <a href="index.html" id="logo"></a>
    <ul id="navigation">
      <li><?php echo anchor('home', 'Home');?></li>
      <li><?php echo anchor('about-us', 'About Us');?></li>
      <li>
        <?php echo anchor('feature', 'Feature');?>
        <ul>
          <li><?php echo anchor('company', 'Company');?></li>
          <li><?php echo anchor('member', 'Member');?></li>
        </ul>
      </li>
      <li><?php echo anchor('contact', 'Contact');?></li>
      <li>
        <?php echo anchor('login', 'Login');?>
        <ul>
          <li><?php echo anchor('register', 'Register');?></li>
        </ul>
      </li>
    </ul>
  </div>
</div>