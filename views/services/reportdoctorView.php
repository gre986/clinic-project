<?php
if ($data) {
	echo '<div id="menu-container">';
		echo '<div class="content" style="position: relative; top: -100px">';
			echo '<div class="container" style="background-color: #343536; border-radius: 33px;">';
				echo '<form id="report_box" class="form-horizontal">';
					echo '<div class="form-group" style="margin-top: 6%; margin-bottom: 3%; font-size: 128%">';
						echo '<label for="report_to" class="col-sm-2 control-label">Report to</label>';
						echo '<div class="col-sm-10 col-md-6">';
							echo '<select id="report_to" class="form-control" name="report_to">';
								echo '<option value="NULL" selected>Select a patient</option>';
								foreach ($data as $value) {
									echo '<option value="' . $value["email"]. '">' . $value["first_name"] . ' ' . $value["last_name"] . '</option>';
								}
							echo '</select>
						</div>
					</div>
					<div class="form-group" style="font-size: 128%">
						<label for="report_content" class="col-sm-2 control-label">Content</label>
						<div class="col-sm-10 col-md-8">
							<textarea type="text" rows="15" class="form-control" id="report_content" placeholder="write a report here"></textarea>
						</div>
					</div>
					<div class="form-group" style="margin-top: 3%; margin-bottom: 3%;">
						<div class="col-sm-offset-2 col-sm-10 col-md-offset-5">
							<button type="submit" class="btn btn-default report">Send Report</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>';
}else {
	echo '<div id="menu-container">
				<div class="content">
					<div class="container" style="height: 400px">
						<div class="row">
							<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-3">
								<p style="font-size: x-large">
									Hi, you don\'t have any patient yet!
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>';
}
?>
<script>
jQuery(document).ready(function($){
	/************** doctor send report (Ajax) *********************/
	$("button.report").click(function(event){
	event.preventDefault();
		var report_to = $("#report_box #report_to").val();
		var content = $("textarea#report_content").val();
        var dataString = 'report_to='+report_to+'&content='+content;
		$.ajax({
			type: "POST",
			url: "http://localhost/public/upload/uploadDoctorReport",
			data: dataString,
			cache: false,
			success: function(msg){
			if(msg){
				console.log(msg);
				window.location.replace("http://localhost/public/services/report?status=success");  
				}
			}
		}); //.ajax
	}); //.click
}); //document ready
</script>









