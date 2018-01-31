<div id="menu-container">
	<div class="content" style="position: relative; top: -100px">
		<div class="container" style="background-color: #343536; border-radius: 33px;">
			<div class="col-md-6 col-md-offset-3" style="font-size: x-large; margin-bottom: 2%;   margin-top: 2%;">
				<i class="fa fa-file-text-o" style="margin-right: 6%;"></i>Complete your profile, be more professional!
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="progress">
						<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $data['completion'];?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $data['completion'];?>%;">
							<?php echo $data['completion'];?>%
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-bottom: 3%;">
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
			<div id="doctorinfo" class="row">
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
						<label for="license" class="col-sm-2 col-md-2 col-md-offset-1 control-label">License Number</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="license" name="license" value="<?php if ($data['license_num']) { echo htmlspecialchars($data['license_num']); } ?>" placeholder="License Number">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Email</label>
						<div class="col-sm-10 col-md-6">
							<input type="email" class="form-control" id="email" name="email" value="<?php if ($data['email']) { echo htmlspecialchars($data['email']); } ?>" placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<label for="degree" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Degree</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="degree" name="degree" value="<?php if ($data['degree']) { echo htmlspecialchars($data['degree']); } ?>" placeholder="Degree">
						</div>
					</div>
					<div class="form-group">
						<label for="experience" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Experience</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" class="form-control" id="experience" value="<?php if ($data['experience']) { echo htmlspecialchars($data['experience']); } ?>" placeholder="Experience">
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
					<div>
						<label for="specialty" class="col-sm-2 col-md-2 col-md-offset-1 control-label">Specialty</label>
						<div class="col-sm-10 col-md-6">
							<select id="specialty" class="form-control" name="specialty">
								<?php foreach ($data['specialties'] as $key => $specialty) {
									if ($key == $data['specialty']) {
										echo '<option value="'.$specialty.'"'."selected".'>'.$specialty.'</option>';
									}else {
										echo '<option value="'.$specialty.'">'.$specialty.'</option>';
									}
								}?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10 col-md-1 col-md-offset-5" style="margin-top: 3%;">
							<button type="submit" class="btn btn-default doctorinfo">Update</button>
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

        // The rest of the code will go here...
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


/************** doctor upload info (Ajax) *********************/
$("button.doctorinfo").click(function(event){
        event.preventDefault();

		var first_name = $("#doctorinfo input#first_name").val(); 
    	var last_name = $("#doctorinfo input#last_name").val();
    	var license = $("#doctorinfo input#license").val(); 
    	var email = $("#doctorinfo input#email").val();
    	var degree = $("#doctorinfo input#degree").val(); 
    	var experience = $("#doctorinfo input#experience").val();
    	var gender = $('input[name=gender]:radio:checked').val(); 
    	var specialty = $("#doctorinfo #specialty").val();
        var dataString = 'first_name='+first_name+'&last_name='+last_name+'&license='+license+'&email='+email+'&degree='+degree+'&experience='+experience+'&gender='+gender+'&specialty='+specialty;

        console.log(dataString);

    	$.ajax({ 
        	type: "POST", 
        	url: "http://localhost/public/upload/uploadDoctorInfo", 
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