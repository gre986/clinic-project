<div id="menu-container">
	<div class="content" style="position: relative; top: -120px">
		<div class="container" id="signupbox">
			<div class="row" style="margin-bottom: 30px">
				<div class="col-md-6 col-md-offset-3">
					<h2>Sign Up</h2>
				</div>
			</div>
			<div class="row">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active col-md-6 patient"><a style="font-size: large; text-align: center">Patient</a></li>
					<li role="presentation" class="col-md-6 doctor"><a style="font-size: large; text-align: center">Doctor</a></li>
				</ul>
			</div>
			<div>
				<form class="form-horizontal" method="POST" action="signup">
					<div class="form-group">
						<label for="first_name" class="col-sm-2 col-md-2 col-md-offset-1 control-label">*First Name</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
							<span>Please enter your first name</span>
						</div>
					</div>
					<div class="form-group">
						<label for="last_name" class="col-sm-2 col-md-2 col-md-offset-1 control-label">*Last Name</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
							<span>Please enter your last name</span>
						</div>
					</div>
					<div class="form-group" id="license_num">
						<label for="license" class="col-sm-2 col-md-2 col-md-offset-1 control-label">*License Number</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="license" name="license" placeholder="License Number">
							<span>Please enter your license number</span>
						</div>
					</div>
					<div class="form-group">
						<label for="signup-email" class="col-sm-2 col-md-2 col-md-offset-1 control-label">*Email</label>
						<div class="col-sm-10 col-md-6">
							<input type="email" class="form-control" id="signup-email" name="email" placeholder="Email">
							<span>Please enter a valid email address</span>
						</div>
						<?php
						if ($data[0] == "exist") {
							echo '<div class="col-md-3">
											<p style="font-size: midium; color: red">Opps! This email address already exist!</p>
								</div>';
						}
						?>
					</div>
					<div class="form-group">
						<label for="signup-password" class="col-sm-2 col-md-2 col-md-offset-1 control-label">*Password</label>
						<div class="col-sm-10 col-md-6">
							<input type="password" class="form-control" id="signup-password" name="password" placeholder="Password">
							<span>Please enter a password longer than 8 characters</span>
						</div>
					</div>
					<div class="form-group">
						<label for="confirm_password" class="col-sm-2 col-md-2 col-md-offset-1 control-label">*Confirm Password</label>
						<div class="col-sm-10 col-md-6">
							<input type="password" class="form-control" id="confirm_password" placeholder="Repeat Password">
							<span>Please confirm your password</span>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10 col-md-offset-3">
							<label class="radio-inline col-md-1">
								<input type="radio" name="gender" id="gender" value="Male"> Male
							</label>
							<label class="radio-inline col-md-1">
								<input type="radio" name="gender" id="gender" value="Female"> Female
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10 col-md-1 col-md-offset-5">
							<button type="submit" class="btn btn-default">Sign up</button>
						</div>
					</div>
					<div class="col-sm-offset-2 col-sm-10 col-md-4 col-md-offset-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Already have an account?&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" id="needlogin">Log In</a></div>
				</form>
			</div>
		</div>
	</div>
</div>