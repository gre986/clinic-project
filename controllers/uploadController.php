<?php
session_start();

class upload extends Controller
{

	public function uploadImage()
	{
		$extensions = array(  
		    'image/jpg'  => '.jpg',  
		    'image/jpeg' => '.jpg',  
		    'image/png'  => '.png',
		    'image/bmp' => '.bmp',
		    'image/gif' => '.gif'
		);  

	 	if ($_FILES["avatar"]['error'] == UPLOAD_ERR_OK) {
		    $upload_folder = './../app/images/user_avatar/';
		    $name = date("m-d-H-i-s");
		    $ext = $_FILES["avatar"]["type"];
		    move_uploaded_file( $_FILES["avatar"]["tmp_name"], $upload_folder . $name . $extensions[$ext]);
	 	}

	 	if (isset($_SESSION['uid'])) {
			$uid = $_SESSION['uid'];
			$this->model = $this->setModel('usersModel', $this->db);
		    $this->model->update_avatar('../../app/images/user_avatar/' . $name . $extensions[$ext], $uid);
		}
		
		$json = json_encode(array(
		  'name' => $_FILES["avatar"]['name'],
		  'type' => $_FILES["avatar"]["type"],
		  'image' => '../../app/images/user_avatar/' . $name . $extensions[$ext]
		));

		echo $json;

	}

	
	public function uploadDoctorInfo()
	{

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$firstName = $_POST['first_name'];
			$lastName = $_POST['last_name'];
			$license = $_POST['license'];
			$email = $_POST['email'];
			$gender = $_POST['gender'];
			$degree = $_POST['degree'];
			$experience = $_POST['experience'];
			$specialty = $_POST['specialty'];

			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
				$this->model = $this->setModel('usersModel', $this->db);
			    $this->model->update_user_info($firstName, $lastName, $email, $gender, $uid);
			    $this->model = $this->setModel('doctorModel', $this->db);
			    $this->model->update_doctor_info($degree, $experience, $license, $specialty, $uid);
			    echo "success";
			}
		}

	}	


	public function uploadPatientInfo()
	{

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$firstName = $_POST['first_name'];
			$lastName = $_POST['last_name'];
			$address = $_POST['address'];
			$email = $_POST['email'];
			$pharmacist_email = $_POST["pharmacist_email"];
			$height = $_POST['height'];
			$weight = $_POST['weight'];
			$birthday = $_POST['birthday'];
			$gender = $_POST['gender'];
			$health_info = array();

			for ($i=0; $i <= 40; $i++) { 
				array_push($health_info, $_POST['question'.strval($i)]);
			}

			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
				$this->model = $this->setModel('usersModel', $this->db);
			    $this->model->update_user_info($firstName, $lastName, $email, $gender, $uid);
			    $this->model = $this->setModel('patientModel', $this->db);
			    $this->model->update_patient_info($pharmacist_email, $address, $birthday, $weight, $height, $uid);
			    $this->model->update_patient_health_info($health_info, $uid);
			    echo "success";
			}
		}

	}


	public function uploadDoctorReport()
	{

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$report_to = $_POST['report_to'];
			$content = $_POST['content'];
			$date = date("Y-m-d H:i:s");
			
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
			    $this->model = $this->setModel('doctorModel', $this->db);
			    $doctor_id = $this->model->get_doctor_id($uid);
			    $this->model->write_report($doctor_id, $report_to, $content, $date);
			    echo "success";
			}
		}

	}


}