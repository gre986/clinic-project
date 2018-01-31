<div id="menu-container">
	<div class="content" style="position: relative; top: -100px">
		<div class="container">
			<div class="row">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active col-md-6 basic_info"><a style="font-size: large; text-align: center">Basic Information</a></li>
					<li role="presentation" class="col-md-6 health_info"><a style="font-size: large; text-align: center">Health Information</a></li>
				</ul>
			</div>
			<div class="row" style="background-color: #343536;">
				<div  class="col-md-7 col-md-offset-2" style="font-size: x-large; margin-bottom: 2%; margin-top: 2%;">
					<i class="fa fa-file-text-o" style="margin-right: 6%;"></i>Complete your profile, make life much more easiler !
				</div>
			</div>
			<div class="row" style="background-color: #343536;">
				<div class="col-md-8 col-md-offset-2">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $data['completion'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['completion'];?>%;">
							<?php echo $data['completion'];?>%
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="padding-bottom: 3%; background-color: #343536;">
				<div class="col-md-2 col-md-offset-4">
					<img id="user_avatar" class="img-rounded" src="<?php echo $data['avatar'];?>" style="height: 100px; width: 100px"alt="">
				</div>
				<div class="col-md-4" style="margin-top: 1%;">
					<form id="file-form" action="http://localhost/public/upload/uploadImage" method="POST">
						<input type="file" id="file-select" name="avatar"/>
						<button class="btn btn-default" type="submit" id="upload-button">Upload</button>
					</form>
				</div>
			</div>
			<div id="patient_basic_info" class="row" style="background-color: #343536;">
				<form class="form-horizontal" method="POST" action="">
					<div class="form-group">
						<label for="first_name" class="col-sm-2 col-md-2 col-md-offset-1 control-label">First Name</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="first_name" name="first_name" value="<?php if ($data['first_name']) { echo htmlspecialchars($data['first_name']); } ?>" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<label for="last_name" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Last Name</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="last_name" name="last_name" value="<?php if ($data['last_name']) { echo htmlspecialchars($data['last_name']); } ?>" placeholder="Last Name">
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Address</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="address" name="address" value="<?php if ($data['address']) { echo htmlspecialchars($data['address']); } ?>" placeholder="Address">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Email</label>
						<div class="col-sm-10 col-md-6">
							<input type="email" class="form-control" id="email" name="email" value="<?php if ($data['email']) { echo htmlspecialchars($data['email']); } ?>" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<label for="pharmacist_email" class="col-sm-2 col-md-2 col-md-offset-1 control-label">pharmacist Email</label>
						<div class="col-sm-10 col-md-6">
							<input type="email" class="form-control" id="pharmacist_email" name="pharmacist_email" value="<?php if ($data['pharmacist_email']) { echo htmlspecialchars($data['pharmacist_email']); } ?>" placeholder="Pharmacist Email">
						</div>
					</div>
					<div class="form-group">
						<label for="height" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Height</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="height" name="height" value="<?php if ($data['height']) { echo htmlspecialchars($data['height']); } ?>" placeholder="e.g. 6 feet">
						</div>
					</div>
					<div class="form-group">
						<label for="weight" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Weight</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="weight" value="<?php if ($data['weight']) { echo htmlspecialchars($data['weight']); } ?>" placeholder="e.g. 100 lbs">
						</div>
					</div>
					<div class="form-group">
						<label for="birthday" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Date of Birth</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="birthday" value="<?php if ($data['date_of_birth']) { echo htmlspecialchars($data['date_of_birth']); } ?>" placeholder="e.g. 1990-01-09">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10 col-md-offset-3">
							<label class="radio-inline col-md-1">
								<input type="radio" name="gender" id="gender" value="Male" <?php if($data['gender'] == "male") { echo 'checked="checked"';}?>> Male
							</label>
							<label class="radio-inline col-md-1">
								<input type="radio" name="gender" id="gender" value="Female" <?php if($data['gender'] == "female") { echo 'checked="checked"';}?>> Female
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10 col-md-3 col-md-offset-4" style="margin-top: 3%;">
							<a type="submit" class="btn btn-default">Next</a>
							<button type="submit" class="btn btn-default patient_info" style="margin-left: 45%">Update</button>
						</div>
					</div>
				</form>
			</div>
			
			<div id="patient_health_info" class="row" style="background-color: #343536;">
				<form class="form-horizontal" method="POST" action="">
					<?php
						for($i = 0; $i < 41; $i++) {
							$output = '';
							$output .= '<div class="form-group">';
								$output .= '<label for="question' . $i . '" class="col-sm-2 col-md-9 col-md-offset-1 control-label" style="text-align: left; font-size: medium;"><span>' . strval($i+1) . '&nbsp;&nbsp;</span>' . $data['questions'][$i]['description'] . '</label>';
								$output .= '<div class="col-sm-10 col-md-1">';
									$output .= '<select id="question' . $i . '" class="form-control" name="question' . $i . '">';
										$choices = ['yes', 'no', 'NULL'];
										if ($data['health_info'][$i+1]) {
											foreach ($choices as $value) {
												if ($data['health_info'][$i] == $value) {
													$output .= '<option value="'.$value.'"'."selected".'>'.$value.'</option>';
												}else {
													$output .= '<option value="'.$value.'">'.$value.'</option>';
												}
											}
										}else {
											$output .= '<option value="NULL" selected>NULL</option>';
											$output .= '<option value="yes">yes</option>';
											$output .= '<option value="no">no</option>';
										}
										
									$output .= '</select>
											</div>
										</div>';
							echo $output;
						}
					?>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10 col-md-3 col-md-offset-4" style="margin-top: 3%;">
							<a type="submit" class="btn btn-default">Back</a>
							<button type="submit" class="btn btn-default patient_info" style="margin-left: 45%">Update</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<div id="doctor_update_success">
<p>Your information already updated!</p>
</div>
<script>
jQuery(document).ready(function($){
/************** user upload image (Ajax) *********************/
var form = document.getElementById('file-form');
var fileSelect = document.getElementById('file-select');
var uploadButton = document.getElementById('upload-button');
form.onsubmit = function(event) {
event.preventDefault();
// Update button text.
uploadButton.innerHTML = 'Uploading...';
// Get the selected files from the input.
var files = fileSelect.files;
// Create a new FormData object.
var formData = new FormData();
// Loop through each of the selected files. this time only allow one image
for (var i = 0; i < files.length; i++) {
var file = files[i];
// Check the file type.
if (!file.type.match('image.*')) {
continue;
}
// Add the file to the request.
formData.append('avatar', file, file.name);
}
$.ajax({
url:'http://localhost/public/upload/uploadImage',
type: 'POST',
data: formData,
cache: false,
dataType: 'json',
processData: false, // Don't process the files
contentType: false, // Set content type to false as jQuery will tell the server its a query string request
success: function(data)
{
console.log(data);
uploadButton.innerHTML = 'Upload';
$('#user_avatar').attr("src", data.image);
},
error: function(jqXHR, textStatus, errorThrown)
{
// Handle errors here
console.log('ERRORS: ' + textStatus);
// STOP LOADING SPINNER
}
}); //ajax
}//form onsubmit
/************** patient upload info (Ajax) *********************/
$("button.patient_info").click(function(event){
event.preventDefault();
	var first_name = $("#patient_basic_info input#first_name").val();
	var last_name = $("#patient_basic_info input#last_name").val();
	var address = $("#patient_basic_info input#address").val();
	var email = $("#patient_basic_info input#email").val();
	var pharmacist_email = $("#patient_basic_info input#pharmacist_email").val();
	var height = $("#patient_basic_info input#height").val();
	var weight = $("#patient_basic_info input#weight").val();
	var birthday = $("#patient_basic_info input#birthday").val();
	var gender = $('input[name=gender]:radio:checked').val();
	var dataString = 'first_name='+first_name+'&last_name='+last_name+'&address='+address+'&email='+email+'&pharmacist_email='+pharmacist_email+'&height='+height+'&weight='+weight+'&birthday='+birthday+'&gender='+gender;
	var question = [];
	// question[i] = $("#patient_health_info #question".concat(i.toString())).val();
	for (var i = 0; i <= 40; i++) {
		question[i] = $("#patient_health_info #question".concat(i.toString())).val();
		dataString += '&question'+i.toString()+'='+question[i];
	};
console.log(dataString);
	$.ajax({
	type: "POST",
	url: "http://localhost/public/upload/uploadPatientInfo",
	data: dataString,
	cache: false,
	success: function(msg){
	if(msg){
	console.log(msg);
	$('#doctor_update_success').show().slideUp(5000);
	}
	}
	}); //.ajax
	}); //.click
}); //document ready
</script>