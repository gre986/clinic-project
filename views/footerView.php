<div class="templatemo_footer">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-12">Copyright &copy; <a href="http://www.fullerton.edu" rel="nofollow">Bo Yuan</a> |
      <a href="http://www.fullerton.edu" rel="nofollow">HTML5</a> by
      <a href="http://www.fullerton.edu" rel="nofollow">Polygon</a> |
      Photos from <a href="http://www.google.com/" title="google" target="_blank">Google</a>
    </div>
    <div class="col-md-3 col-sm-12 templatemo_rfooter">
      <a href="#">
        <div class="hex_footer">
          <span class="fa fa-facebook"></span>
        </div>
      </a>
      <a href="#">
        <div class="hex_footer">
          <span class="fa fa-twitter"></span>
        </div>
      </a>
      <a href="#">
        <div class="hex_footer">
          <span class="fa fa-linkedin"></span>
        </div>
      </a>
      <a href="#">
        <div class="hex_footer">
          <span class="fa fa-rss"></span>
        </div>
      </a>
    </div>
  </div>
</div>
</div>
<!-- footer end -->
<!-- login_box start -->
<div id="login_box">
<div class="container modal-content">
  <div class="row modal-header">
    <div class="col-md-10 col-sm-10">
      <p>Please Log in to Continue</p>
    </div>
    <div class="col-md-2 col-sm-2">
      <span class="fa fa-times fa-2x" style="color: #3A3A3A"></span>
    </div>
  </div>
  <div class="row modal-body">
    <form>
      <div class="form-group">
        <label for="email" style="color: #b69e40; font-size: initial;">Email address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="password" style="color: #b69e40; font-size: initial;">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox"><span>Remember Me&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> <a href="#">Forgot Password?</a>
        </label>
      </div>
      <button type="submit" class="btn btn-default loginbtn">Log in</button>
      <div class="form-group btm">
        <span><br>Don't have any account?&nbsp;&nbsp;&nbsp;<span><a href="http://localhost/public/signup">Sign Up</a></span></span>
      </div>
    </form>
  </div>
</div>
</div>
<!-- login_box end -->

<!-- login_welcome start -->
<div id="login_welcome">
</div>
<!-- login_welcome end -->

<!-- logout_farewell start -->
<div id="logout_farewell">
  <p>Have a nice day!</p>
</div>
<!-- logout_farewell end -->
<script>
//Capture the click event on a link to an image
var $login_box = $("#login_box");
$("#login_overlay, #login_overlay_2, #needlogin").click(function(event){
event.preventDefault();
//Show the login_box.
$login_box.show();
});
$(".modal-header span").click(function(){
//Hide the overlay
$login_box.hide();
});
</script>
</body>
</html>