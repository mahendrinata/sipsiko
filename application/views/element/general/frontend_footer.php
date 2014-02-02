<div id="footer">
  <div id="footer-center" class="container">
    <div class="footer-left">
      <ul class="footer-menu">
        <li><?php echo anchor('home', 'Home');?></li>
        <li><?php echo anchor('about-us', 'About Us');?></li>
        <li><?php echo anchor('feature', 'Feature');?></li>
        <li class="footer-last"><?php echo anchor('contact', 'Contact');?></li>
      </ul>
      <ul class="footer-address">
        <li><?php echo img('assets/frontend/img/home-icon.png')?> Jl. Penyu No. 40, Bandung 40264</li>
        <li><?php echo img('assets/frontend/img/phone-icon.png')?> +6285721821555</li>
        <li><?php echo img('assets/frontend/img/email-icon.png')?> sipsiko.indonesia@gmail.com</li>
      </ul>
    </div>	
    <div class="footer-right" id="footer-newsletter">
      <p>Newsletter</p>
      <form id="newsletter"  method="post">
        <input type="text" placeholder="Email here">
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>
  <div id="footer-bottom">
    <div id="footer-center-bottom" class="container">
      <ul class="copyright">
        <li><?php echo date('Y');?> © SIPSIKO Indonesia. All rights reserved</li>
      </ul>
      <ul class="social-links">                   
        <li class="facebook"><a href="#">Facebook</a></li>
        <li class="twitter"><a href="#">Twitter</a></li>
        <li class="vimeo"><a href="#">Vimeo</a></li>
        <li class="linkedin"><a href="#">LinkedIn</a></li>
        <li class="dribble"><a href="#">Dribbleo</a></li>
        <li class="google"><a href="#">Google</a></li>
      </ul>
    </div>
  </div>
</div>