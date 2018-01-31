<?php
session_start();

class login extends Controller
{

	public function index()
	{
		$login_email = stripslashes(trim($_POST['email']));
		$login_password = md5(stripslashes(trim($_POST['password'])));
		

		$this->model = $this->setModel('usersModel', $this->db);
		$info = $this->model->get_login_info($login_email);
		if (!empty($info) && ($login_password == $info['password'])) {
			$uid = intval($this->model->get_uid($login_email));
			$_SESSION['uid'] = $uid;
			if ($info['type'] == 1) {
				$_SESSION['type'] = "patient";
			}else {
				$_SESSION['type'] = "doctor";
			}
			echo $info['first_name'];
		}
	}

	public function logout()
	{
		unset($_SESSION); 
    	session_destroy(); 
    	echo '1'; 
	}
}
