<?php
session_start();

class services extends Controller
{

	public function index()
	{
		$this->getView('headerView');
		$this->getView('services/indexView');
		$this->getView('footerView');
	}


	public function patient()
	{
		$this->getView('headerView');

		if ($_SESSION['type'] == "patient") {
			//log in as a patienet to see own info
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
				$this->model = $this->setModel('usersModel', $this->db);
				//store last_name, first_name, email, gender, avatar
				$user_info = $this->model->get_all_user_info($uid);
				if ($user_info['avatar'] != "../../app/images/user_avatar/default_man.png" && $user_info['avatar'] != "../../app/images/user_avatar/default_women.png") {
					$completion = 5;
				}else {
					$completion = 4;
				}
			}

			//get patient address, date_of_birth, weight, height in patient table
			$this->model = $this->setModel('patientModel', $this->db);
			$patient_info = $this->model->get_patient_info($uid);
			$user_info['address'] = $patient_info['address'];
			$user_info['date_of_birth'] = $patient_info['date_of_birth'];
			$user_info['weight'] = $patient_info['weight'];
			$user_info['height'] = intval($patient_info['height']);
			$user_info['pharmacist_email'] = $patient_info['pharmacist_email'];

			//get patient health info (30 questions)
			$patient_health_info = $this->model->get_patient_health_info($uid);
			$user_info['health_info'] = $patient_health_info;

			//get 30 questions
			$this->model = $this->setModel('questionModel', $this->db);
			$questions = $this->model->get_questions();
			$user_info['questions'] = $questions;

			//calculate the completion
			if ($patient_info['address'] != NULL ) { $completion += 1; }
			if ($patient_info['date_of_birth'] != NULL ) { $completion += 1; }
			if ($patient_info['weight'] != NULL ) { $completion += 1; }
			if ($patient_info['height'] != NULL ) { $completion += 1; }
			if ($patient_info['pharmacist_email'] != NULL ) { $completion += 1; }
			foreach ($patient_health_info as $value) {
				if ($value != NULL) {
					$completion += 1;
				}
			}
			$user_info['completion'] = round($completion*100/50);
			$this->getView('services/patientpatientView', $user_info);
		}
		else {
			//get the doctor's all patients' info in users table
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
				$this->model = $this->setModel('doctorModel', $this->db);
				$doctor_id = intval($this->model->get_doctor_id($uid));
				$this->model = $this->setModel('patientModel', $this->db);
				$my_patients['my_patients'] = $this->model->get_my_patients($doctor_id);
			}

			//get 30 questions
			$this->model = $this->setModel('questionModel', $this->db);
			$my_patients['questions'] = $this->model->get_questions();

			$this->getView('services/patientdoctorView', $my_patients);
		
		}

		$this->getView('footerView');
	}


	public function doctor()
	{
		$this->getView('headerView');
		

		if ($_SESSION['type'] == "patient") {
			//get the patient's my_doctors info and all_doctors info
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
				$this->model = $this->setModel('patientModel', $this->db);
				$patient_id = intval($this->model->get_patient_id($uid));
				$this->model = $this->setModel('doctorModel', $this->db);
				$my_doctors = $this->model->get_my_doctors($patient_id);
				$all_doctors = $this->model->get_all_doctors();
				$doctors = array(
					'my_doctors' => $my_doctors,
					'all_doctors' => $all_doctors,
				);	
			}
			$this->getView('services/doctorpatientView', $doctors);
		}else {
			//log in as a doctor to see own info
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
				$this->model = $this->setModel('specialtiesModel', $this->db);
				$specialties = $this->model->get_all_specialties();
				$this->model = $this->setModel('usersModel', $this->db);
				//store last_name, first_name, email, gender, avatar
				$user_info = $this->model->get_all_user_info($uid);
				if ($user_info['avatar'] != "../../app/images/user_avatar/default_man.png" && $user_info['avatar'] != "../../app/images/user_avatar/default_women.png") {
					$completion = 5;
				}else {
					$completion = 4;
				}
			}

			$this->model = $this->setModel('doctorModel', $this->db);
			$doctor_info = $this->model->get_doctor_info($uid);
			$user_info['license_num'] = $doctor_info['license_num'];
			$user_info['degree'] = $doctor_info['degree'];
			$user_info['experience'] = $doctor_info['experience'];
			$user_info['specialty'] = intval($doctor_info['specialty']);

			//calculate the completion
			if ($doctor_info['license_num'] != NULL ) { $completion += 1; }
			if ($doctor_info['degree'] != NULL ) { $completion += 1; }
			if ($doctor_info['experience'] != NULL ) { $completion += 1; }
			if ($doctor_info['specialty'] != 99 ) { $completion += 1; }
			$user_info['completion'] = round($completion*100/9);
			$user_info['specialties'] = $specialties;
			$this->getView('services/doctordoctorView', $user_info);
		}

		$this->getView('footerView');
	}


	public function appointment()
	{
		$this->getView('headerView');


		if ($_SESSION['type'] == "patient") {
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
				$this->model = $this->setModel('appointmentModel', $this->db);
				$patient_appointments = $this->model->get_patient_appointments($uid);
				if ($patient_appointments) {
					$data = array(
						"has_appointment" => true,
						"patient_appointments" => $patient_appointments
						);
				}else {
					$this->model = $this->setModel('usersModel', $this->db);
					$doctor_names = $this->model->get_doctor_names();
					$this->model = $this->setModel('appointmentModel', $this->db);
					$appointments = $this->model->get_appointment_info();
					$data = array(
						"has_appointment" => false,
						"doctors" => $doctor_names,
						"appointments" => $appointments
						);
				}
			}

			$this->getView('services/appointmentpatientView', $data);

		}else {
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid'];
				$this->model = $this->setModel('appointmentModel', $this->db);
				$doctor_appointments = $this->model->get_doctor_appointments($uid);
			}
			
			$this->getView('services/appointmentdoctorView', $doctor_appointments);
		}


		$this->getView('footerView');
	}


	public function report()
	{

		$this->getView('headerView');


		if ($_GET["status"] == "success") {
			$this->getView('services/successView');
		}else {
			if ($_SESSION['type'] == "patient") {
				if (isset($_SESSION['uid'])) {
					$uid = $_SESSION['uid'];
					$this->model = $this->setModel('patientModel', $this->db);
					$my_reports = $this->model->get_patient_reports($uid);
				}

				$this->getView('services/reportpatientView', $my_reports);

			}else {
				if (isset($_SESSION['uid'])) {
					$uid = $_SESSION['uid'];
					$this->model = $this->setModel('doctorModel', $this->db);
					$doctor_id = $this->model->get_doctor_id($uid);
					$this->model = $this->setModel('patientModel', $this->db);
					$my_patients = $this->model->get_my_patients($doctor_id);
				}
				
				$this->getView('services/reportdoctorView', $my_patients);
			}

		}
		$this->getView('footerView');
	}


	public function how_to()
	{
		$this->getView('headerView');

		$this->getView('services/howtoView');

		$this->getView('footerView');
	}

	
}