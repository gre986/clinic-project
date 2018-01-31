<div id="menu-container">
  <!-- contact start -->
  <div class="content contact" id="menu-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <div class="templatemo_contactmap">
            <div id="templatemo_map"></div>
            <img src="../app/images/templatemo_contactiframe.png" alt="contact map">
          </div>
        </div>
        <div class="col-md-4 col-sm-12 leftalign">
          <div class="templatemo_contacttitle">Contact Information</div>
          <div class="clear"></div>
          <p>This medical web application is designed for CPSC 597</p>
          <div class="templatemo_address">
            <ul>
              <li class="left fa fa-map-marker"></li>
              <li class="right">800 N. State College Blvd. <br>Fullerton, CA 92831-3599</li>
              <li class="clear"></li>
              <li class="left fa fa-phone"></li>
              <li class="right">(818)932-4960</li>
              <li class="clear"></li>
              <li class="left fa fa-envelope"></li>
              <li class="right">boyuan@csu.fullerton.edu</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-12">
          <form role="form" action="contact" method="POST">
            <?php if(count($data) == 5) {
              echo '<span style="color: red; font-size: medium;">' . $data[4] .'</span>';
            }?>
            <div class="templatemo_form">
              <input name="fullname" type="text" class="form-control" id="fullname" placeholder="Your Name" value="<?php if ($data[0]) { echo htmlspecialchars($data[0]); } ?>" maxlength="40">
            </div>
            <div class="templatemo_form">
              <input name="email" type="text" class="form-control" id="email" placeholder="Your Email" value="<?php if ($data[1]) { echo htmlspecialchars($data[1]); } ?>" maxlength="40">
            </div>
            <div class="templatemo_form">
              <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" value="<?php if ($data[2]) { echo htmlspecialchars($data[2]); } ?>" maxlength="40">
            </div>
            <div class="templatemo_form" style="display: none;">
              <?php // the field named address is used as a spam honeypot ?>
              <?php // it is hidden from users, and it must be left blank ?>
              <input name="address" type="text" class="form-control" id="address" placeholder="Address" maxlength="40">
              <p>Human: please leave this field blank.</p>
            </div>
            <div class="templatemo_form">
              <textarea name="message" rows="10" class="form-control" id="message" placeholder="Message"><?php if (isset($data[3])) { echo htmlspecialchars($data[3]); } ?></textarea>
            </div>
            <div class="templatemo_form"><button type="submit" class="btn btn-primary">Send Message</button></div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- contact end -->
<script>
  loadMap();
</script>
