<?php
if ($data) {
	echo '<div id="menu-container">';
	echo '<!-- patient reports start -->';
		echo '<div class="content" style="position: relative; top: -100px">';
			echo '<div class="container" style="background-color: #343536; border-radius: 33px; margin-bottom: 25%;">';
				echo '<div class="row">';
					echo '<p style="text-align: center; font-size: 195%;">YOU HAVE <span style="color: #B69E40;">' . count($data). '</span> REPORTS</p>';
				echo '</div>';
				foreach ($data as $report) {
					$output = '';
					$output .= '<div class="row">';
					$output .= '<div class="col-md-3" style="margin-top: 3%; font-size: medium;">';
						$output .= '<ul class="fa-ul reporter">';
							$output .= '<li><i class="fa-li fa fa-user"></i>' . $report["first_name"] . ' ' . $report["last_name"] . '</li>';
							$output .= '<li><i class="fa-li fa fa-clock-o"></i>' . $report["date"] .'</li>';
						$output .= '</ul>';
					$output .= '</div>';
					$output .= '<div class="col-md-6" style="margin-top: 1%; height: 100px; background-color: rgb(247, 229, 161); border-radius: 15px;">';
						$output .= '<p style="margin-top: 3%; color: black; font-size: medium;">' . $report["content"]. '</p>';
					$output .= '</div>';
					$output .= '</div>';
					$output .= '<div class="row" style="background-color: #343536"><hr></div>';
					echo $output;
				}
				
			echo '</div>';
		echo '</div>';
	echo '</div>';
	echo '<!-- patient reports end -->';
}else {

}
?>