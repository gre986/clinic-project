<?php
if ($data) {
	echo '<div id="menu-container">';
	echo '<!-- appointment doctor start -->';
	echo '<div class="content" style="position: relative; top: -100px">';
		echo '<div class="container" style="background-color: #343536; border-radius: 33px;">';
			echo '<div class="row">';
				echo '<p style="text-align: center; font-size: 195%;">YOU HAVE <span style="color: #B69E40;">' . count($data) . '</span> APPOINTMENTS</p></div>';
				foreach ($data as $appointment) {
				$output = '<div class="row">';
					$output .= '<div class="col-md-2 col-md-offset-3" style="margin-top: 1%">';
						$output .= '<div>
							<img class="img-responsive img-circle" src="' . $appointment['avatar'] . '" alt="">
						</div>';
					$output .= '</div>';
					$output .= '<div class="col-md-3" style="margin-top: 3%; font-size: medium;">';
						$output .= '<ul class="fa-ul doctor-info">
							<li><i class="fa-li fa fa-bed"></i>' . $appointment['patient_name'] . '</li>';
							$output .= '    <li><i class="fa-li fa fa-clock-o"></i>' . $appointment['description'] . '</li>
						</ul>
					</div>';
					$output .= '<div class="col-md-3" style="margin-top: 1%;">
						<span style="display: none">' . $appointment['patient_id'] . '</span>
						<a href="http://localhost/public/services/patient" class="btn btn-default btn-lg" role="button" style="margin-top: 8%; margin-left: 5%;">Detail</a>
					</div>
				</div>
				<div class="row" style="background-color: #343536"><hr></div>';
				echo $output;
				}
			echo '</div></div></div>
			<!-- appointment doctor end -->';
			}else {
			echo '<div id="menu-container">
				<div class="content">
					<div class="container" style="height: 400px">
						<div class="row">
							<div class="col-sm-5 col-sm-offset-2 col-md-6 col-md-offset-3">
								<p style="font-size: x-large">
									Hi, you don\'t have any appointment yet!
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>';
			}
			?>