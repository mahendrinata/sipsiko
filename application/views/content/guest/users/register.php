<div id="content" class="container clearfix">
  <nav id="page-title" >
    <h1>Register as Company or Member</h1>
  </nav>
</div>
</div>
<div id="contact-map" style="height: 500px;">
  <div id="contact-info" style="top: 165px;">
    <div class="one-fourth">
      <div id="contact-details">
        <h4>Terms and Conditions</h4>
        <p>Users can only register as a company.</p>
        
        <br/>
        <h4>Company</h4>
        <p>
        <ul>
          <li>Create Psychological Test Online (Private or Public).</li>
          <li>Have a member of tests.</li>
        </ul>
        </p>

        <h4>Member</h4>
        <p>
        <ul>
          <li>Perform Psychological Tests.</li>
          <li>Have a analytic Psychological Tests.</li>
        </ul>
        </p>
      </div>
    </div>
    <div class="three-fourth last">
      <div id="contact-form">
        <h4>Register Yourself Now</h4>
        <div id="message"></div>
        <form method="post" action="register" name="contactform" id="contactform">
          <input name="first_name" type="text" size="30" placeholder="First Name" >
          <input name="email" type="text" size="30" placeholder="Email" >
          <input name="username" type="text" size="30" placeholder="Username" class="last">
          <textarea name="address" cols="10" rows="3" placeholder="Address"></textarea>
          <input name="password" type="text" size="30" placeholder="Password" >
          <input name="password_confirmation" type="text" size="30" placeholder="Password Confirmation">
          <select name="role" style="width: 205px;border: 1px solid #F2F2F2;background: #FFF;color: #8C8C8C;height: 35px;padding: 7px 10px;width: 228px;">
            <option value="">COMPANY OR MEMBER</option>
            <optgroup>
              <option value="MEMBER">MEMBER</option>
              <option value="COMPANY">COMPANY</option>
            </optgroup>
          </select>
          <div class="clearfix"></div>
          <br/>
          <input type="submit" class="btn-image" id="submit" value="Register" />
        </form>
      </div>
    </div>
  </div>		
  <div id="map_canvas" style="width:100%; height:100%"></div>
</div>