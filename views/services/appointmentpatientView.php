<?php
if ($data['has_appointment']) { 
echo '<div id="menu-container">';
  echo '<!-- appointment doctor start -->';
  echo '<div class="content" style="position: relative; top: -100px">';
    echo '<div class="container" style="background-color: #343536; border-radius: 33px; margin-bottom: 25%;">';
      echo '<div class="row">';
        echo '<p style="text-align: center; font-size: 195%;">YOU HAVE <span style="color: #B69E40;">' . count($data['patient_appointments']) . '</span> APPOINTMENTS</p></div>';
        foreach ($data['patient_appointments'] as $appointment) {
        $output = '<div class="row">';
          $output .= '<div class="col-md-2 col-md-offset-3" style="margin-top: 1%">';
            $output .= '<div>
              <img class="img-responsive img-circle" src="' . $appointment['avatar'] . '" alt="">
            </div>';
          $output .= '</div>';
          $output .= '<div class="col-md-3" style="margin-top: 3%; font-size: medium;">';
            $output .= '<ul class="fa-ul doctor-info">
              <li><i class="fa-li fa fa-user"></i>' . $appointment['doctor_name'] . '</li>';
              $output .= '    <li class="description"><i class="fa-li fa fa-clock-o"></i>' . $appointment['description'] . '</li>
            </ul>
          </div>';
          $output .= '<div class="col-md-3" style="margin-top: 1%;">
            <p style="display: none">' . $appointment['doctor_id'] . '</p>
            <a href="http://localhost/public/services/doctor" class="btn btn-default btn-lg" role="button" style="margin-top: 8%; margin-left: 5%;">Detail</a>
            <button class="btn btn-danger btn-lg cancelAppointment" type="submit" style="margin-top: 8%; margin-left: 5%;">Cancel</button>
          </div>
        </div>
        <div class="row" style="background-color: #343536"><hr></div>';
        echo $output;
        }
      echo '</div></div></div>
      <!-- appointment doctor end -->';
      }else{
      echo '<div id="menu-container">
        <!-- appointment patient start -->
        <div class="content" style="position: relative; top: -100px">
          <div class="container" style="background-color: #343536; border-radius: 33px;">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Morning</th>
                  <th>Afternoon</th>
                </tr>
              </thead>
              <tbody>';
                // date_default_timezone_set("America/Los_Angeles");
                $startdate=strtotime("l");
                $enddate=strtotime("+6 days",$startdate);
                while ($startdate <  $enddate) {
                foreach ($data['doctors'] as $doctor) {
                $output = '<tr>';
                  $output .= '<td style="display: none;">' . $doctor['uid'] . '</td>';
                  $output .= '<td style="display: none;">' . date("Y-m-d", $startdate) . '</td>';
                  $output .= '<td>' . $doctor['fullname'] . '</td>';
                  $output .= '<td>' . date("M d l", $startdate) . '</td>';
                  if (in_array($doctor['uid'].date("M d l", $startdate).' Morning', $data['appointments'])) {
                  $output .= '<td><button class="btn btn-danger" disabled="disabled">Make an appointment</button></td>';
                  }else {
                  $output .= '<td><button class="btn btn-success makeAppointment1">Make an appointment</button></td>';
                  }
                  if (in_array($doctor['uid'].date("M d l", $startdate).' Afternoon', $data['appointments'])) {
                  $output .= '<td><button class="btn btn-danger" disabled="disabled">Make an appointment</button></td>';
                  }else {
                  $output .= '<td><button class="btn btn-success makeAppointment2">Make an appointment</button></td>';
                  }
                $output .= '</tr>';
                echo $output;
                }
                $startdate = strtotime("+1 day", $startdate);
                }
              echo '</tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- appointment patient end -->';
      }
?>
<script>
jQuery(document).ready(function($){
/************** patient cancel an appointment (Ajax) *********************/
$("button.cancelAppointment").click(function(event){
    event.preventDefault();

    var description = $(".description").text(); 
    var dataString = 'description='+description;

    $.ajax({ 
      type: "POST", 
      url: "http://localhost/public/appointment/cancelAppointment", 
      data: dataString,
      cache: false, 
      success: function(msg){ 
        if(msg){
          console.log(msg);
          location.reload(true); //the true param make it not to be read from cache                
          }
        } 
      }); //.ajax 
  }); //.click

/************** patient make an appointment (Ajax) *********************/
$("button.makeAppointment1").click(function(event){
    event.preventDefault();

    
    var uid_doctor = $(this).parent().prevAll(':eq(3)').text(); 
    var date = $(this).parent().prevAll(':eq(2)').text(); 
    var description = $(this).parent().prevAll(':eq(0)').text();
    var dataString = 'uid_doctor='+uid_doctor+'&date='+date+'&description='+description+' Morning';

    $.ajax({ 
      type: "POST", 
      url: "http://localhost/public/appointment/makeAppointment", 
      data: dataString,
      cache: false, 
      success: function(msg){ 
        if(msg){
          console.log(msg);
          location.reload(true);            
          }
        } 
      }); //.ajax 
  }); //.click

$("button.makeAppointment2").click(function(event){
    event.preventDefault();

    
    var uid_doctor = $(this).parent().prevAll(':eq(4)').text(); 
    var date = $(this).parent().prevAll(':eq(3)').text(); 
    var description = $(this).parent().prevAll(':eq(1)').text();
    var dataString = 'uid_doctor='+uid_doctor+'&date='+date+'&description='+description+' Afternoon';

    $.ajax({ 
      type: "POST", 
      url: "http://localhost/public/appointment/makeAppointment", 
      data: dataString,
      cache: false, 
      success: function(msg){ 
        if(msg){
          console.log(msg);
          location.reload(true);             
          }
        } 
      }); //.ajax 
  }); //.click

}); //document ready
</script>




