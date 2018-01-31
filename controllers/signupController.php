<?php
session_start();

class signup extends Controller
{
	public function index()
	{
		$this->getView('headerView');

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$firstName = $_POST['first_name'];
			$lastName = $_POST['last_name'];
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$gender = $_POST['gender'];
			if ($gender == "Male") {
				$avatar = "../../app/images/user_avatar/default_man.png";
			}else{
				$avatar = "../../app/images/user_avatar/default_women.png";
			}
			$this->model = $this->setModel('usersModel', $this->db);

			//check if the email has existed in our db
			if (!empty($this->model->get_login_info($email))) {
				$this->getView('signup/indexView', ["exist"]);
			}else{
				if($_POST['license'] != ''){
					$this->model->insert_user_info(2, $firstName, $lastName, $email, $password, $gender);
					$uid = intval($this->model->get_uid($email));
					$this->model->update_avatar($avatar, $uid);
					$_SESSION['uid'] = $uid;
					$_SESSION['type'] = "doctor";
					$licenseNum = $_POST['license'];
					$this->model = $this->setModel('doctorModel', $this->db);
					$data = $this->model->insert_doctor($uid, $licenseNum);
					$this->getView('signup/successView', $data);
				}else{
					$this->model->insert_user_info(1, $firstName, $lastName, $email, $password, $gender);
					$uid = intval($this->model->get_uid($email));
					$this->model->update_avatar($avatar, $uid);
					$_SESSION['uid'] = $uid;
					$_SESSION['type'] = "patient";
					$this->model = $this->setModel('patientModel', $this->db);
					$this->model->insert_patient($uid);
					$this->model->insert_patient_health_info($uid);
					$this->getView('signup/successView');
				}
			}				
		}else {
			$this->getView('signup/indexView');
		}
		
		$this->getView('footerView');
		// echo '<meta http-equiv="refresh">';
	}
}