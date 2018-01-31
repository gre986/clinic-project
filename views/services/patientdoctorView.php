<div id="menu-container">
	<div class="content" style="position: relative; top: -100px">
		<div class="container" style="background-color: #343536; border-radius: 33px;">
			<div class="row" style="font-size: x-large; margin-top: 2%; text-align: center;">
				My Patients
			</div>
			<div class="row" style="background-color: #343536"><hr></div>
			<?php
				if ($data['my_patients']) {
					foreach ($data['my_patients'] as $my_patient) {
						$output = '';
						$output .= '<div class="row" style="background-color: #343536;">';
					    $output .= '<div class="col-md-2 col-md-offset-1" style="margin-top: 1%">';
						$output .= '<div>
										<img class="img-responsive img-rounded" src="'.$my_patient['avatar'].'" alt="">
										<a href="http://localhost/public/services/report" class="btn btn-default" style="margin-top: 10%; margin-left: -4%;" value="'.$my_patient['first_name'].' '.$my_patient['last_name'].'">Write a Report</a>
										<button class="btn btn-default more-detial" style="margin-top: 10%; margin-left: -4%;">Show More</button>
									</div>';
						$output .= '</div>';
						$output .= '<div class="col-md-4" style="margin-top: 1%; font-size: medium;">';
						$output .= '<ul class="fa-ul doctor-info">';
						$output .= '<li><i class="fa-li fa fa-bed"></i>'.$my_patient['first_name'].' '.$my_patient['last_name'].'</li>';
						$output .= '<li><i class="fa-li fa fa-envelope-o"></i>'.$my_patient['email'].'</li>';
						$output .= '<li><i class="fa-li fa fa-venus-mars"></i>'.$my_patient['gender'].'</li>';
						if ($my_patient['address'] == NULL) {
							$output .= '<li><i class="fa-li fa fa-map-marker"></i>...</li>';
						}else {
							$output .= '<li><i class="fa-li fa fa-map-marker"></i>'.$my_patient['address'].'</li>';
						}
						if ($my_patient['date_of_birth'] == NULL) {
							$output .= '<li><i class="fa-li fa fa-calendar"></i>...</li>';
						}else {
							$output .= '<li><i class="fa-li fa fa-calendar"></i>'.$my_patient['date_of_birth'].'</li>';
						}
						$output .= '</ul>
									</div>';
						$output .= '<div class="col-md-4" style="margin-top: 1%; font-size: medium;">';
						$output .= '<ul class="fa-ul doctor-info">';
						if ($my_patient['height'] == NULL) {
								$output .= '<li><span>Height:&nbsp;&nbsp;</span>...</li>';
							}else {
								$output .= '<li><span>Height:&nbsp;&nbsp;</span>'.$my_patient['height'].'</li>';
							}
							if ($my_patient['weight'] == NULL) {
								$output .= '<li><span>Weight:&nbsp;&nbsp;</span>...</li>';
							}else {
								$output .= '<li><span>Weight:&nbsp;&nbsp;</span>'.$my_patient['weight'].'</li>';
							}
						$output .= '</ul>
									</div>';
						$output .='</div>';
						$output .= '<div class="row health-records"><div class="col-md-10 col-md-offset-1" style="margin-top: 1%; font-size: medium;"><ul class="fa-ul doctor-info">';
						for ($i=0; $i <= 40 ; $i++) { 
							$output .= '<li>'.$data["questions"][$i]["description"];
							if ($my_patient[strval($i+1)]) {
								if ($my_patient[strval($i+1)] == "yes") {
									$output .= '<i class="fa fa-check" style="margin-left: 3%; color: #4AE54A;"></i>';
								}else {
									$output .= '<i class="fa fa-times" style="margin-left: 3%; color: red;"></i>';
								}
							}else {
								$output .= '<i class="fa fa-ban" style="margin-left: 3%;"></i>';
							}
						}
						$output .= '</li></ul></div></div>';
						$output .= '<div class="row" style="background-color: #343536"><hr></div>';
						echo $output;
					}
				}else {
					echo '<div class="row" style="background-color: #343536; padding-bottom: 50px; height: 400px;">';
									echo '<p style="font-size: large; text-align: center; margin-top: 10%;">You don\'t have any patients!</p></div>';
									}
								
				?>
			</div>
		</div>
	</div>