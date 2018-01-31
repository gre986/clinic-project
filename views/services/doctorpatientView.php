<div id="menu-container">
	<div class="content" style="position: relative; top: -100px">
		<div class="container">
			<div class="row">
				<ul class="nav nav-tabs">
					<li role="presentation" class="active col-md-6 your_doctor"><a style="font-size: large; text-align: center">My doctors</a></li>
					<li role="presentation" class="col-md-6 all_doctor"><a style="font-size: large; text-align: center">All doctors</a></li>
				</ul>
			</div>
			<?php
				if ($data['my_doctors']) {
					foreach ($data['my_doctors'] as $my_doctor) {
						$output = '';
						$output .= '<div id="my_doctor_profile" class="row" style="background-color: #343536; padding-bottom: 50px;">';
						$output .= '<div class="col-md-2 col-md-offset-1" style="margin-top: 4%">';
						$output .= '<div>
							            <img class="img-responsive img-rounded" src="'.$my_doctor['avatar'].'" alt="">
							            <a href="http://localhost/public/services/report" class="btn btn-default" style="margin-top: 10%; margin-left: 1%;" value="'.$my_doctor['first_name'].' '.$my_doctor['last_name'].'">See Report</a>
					                </div>';
						$output .= '</div>';
						$output .= '<div class="col-md-9" style="margin-top: 4%; font-size: medium;">';
						$output .= '<ul class="fa-ul doctor-info">';
						$output .= '<li><i class="fa-li fa fa-user-md"></i>'.$my_doctor['first_name'].' '.$my_doctor['last_name'].'</li>';
						$output .= '<li><i class="fa-li fa fa-envelope-o"></i>'.$my_doctor['email'].'</li>';
						if ($my_doctor['degree'] == NULL) {
							$output .= '<li><i class="fa-li fa fa-graduation-cap"></i>...</li>';
						}else {
							$output .= '<li><i class="fa-li fa fa-graduation-cap"></i>'.$my_doctor['degree'].'</li>';
						}
						if ($my_doctor['specialty'] == "Select a specialty") {
							$output .= '<li><i class="fa-li fa fa-stethoscope"></i>...</li>';
						}else {
							$output .= '<li><i class="fa-li fa fa-stethoscope"></i>'.$my_doctor['specialty'].'</li>';
						}
						if ($my_doctor['experience'] == NULL) {
							$output .= '<li><i class="fa-li fa fa-list-alt"></i>...</li>';
						}else {
							$output .= '<li><i class="fa-li fa fa-list-alt"></i>'.$my_doctor['experience'].'</li>';
						}
						$output .= '</ul>
					             </div>
				                </div>';
						$output .= '<div id="my_doctor_profile" class="row" style="background-color: #343536"><hr></div>';
						echo $output;
					}
				}else {
					echo '<div id="my_doctor_profile" class="row" style="background-color: #343536; padding-bottom: 50px; height: 400px;">';
					echo '<p style="font-size: large; text-align: center; margin-top: 10%;">You don\'t have any doctors!</p></div>';
				}
				
				
			?>
			<?php
				foreach ($data['all_doctors'] as $doctor) {
					$output = '';
					$output .= '<div id="all_doctors_profile" class="row" style="background-color: #343536; padding-bottom: 50px;">';
					$output .= '<div class="col-md-2 col-md-offset-1" style="margin-top: 4%">';
					$output .= '<div>
						            <img class="img-responsive img-rounded" src="'.$doctor['avatar'].'" alt="">
				                </div>';
					$output .= '</div>';
					$output .= '<div class="col-md-9" style="margin-top: 4%; font-size: medium;">';
					$output .= '<ul class="fa-ul doctor-info">';
					$output .= '<li><i class="fa-li fa fa-user-md"></i>'.$doctor['first_name'].' '.$doctor['last_name'].'</li>';
					$output .= '<li><i class="fa-li fa fa-envelope-o"></i>'.$doctor['email'].'</li>';
					if ($doctor['degree'] == NULL) {
						$output .= '<li><i class="fa-li fa fa-graduation-cap"></i>...</li>';
					}else {
						$output .= '<li><i class="fa-li fa fa-graduation-cap"></i>'.$doctor['degree'].'</li>';
					}
					if ($doctor['specialty'] == "Select a specialty") {
						$output .= '<li><i class="fa-li fa fa-stethoscope"></i>...</li>';
					}else {
						$output .= '<li><i class="fa-li fa fa-stethoscope"></i>'.$doctor['specialty'].'</li>';
					}
					if ($doctor['experience'] == NULL) {
						$output .= '<li><i class="fa-li fa fa-list-alt"></i>...</li>';
					}else {
						$output .= '<li><i class="fa-li fa fa-list-alt"></i>'.$doctor['experience'].'</li>';
					}
					$output .= '</ul>
				             </div>
			                </div>';
					$output .= '<div id="all_doctors_profile" class="row" style="background-color: #343536"><hr></div>';
					echo $output;
				}
			?>
			
				<div class="row">
				<form method="POST" action=""></form>
			</div>
		</div>
	</div>
</div>
</div>
