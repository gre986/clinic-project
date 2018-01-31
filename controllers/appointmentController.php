<?php
session_start();

class appointment extends Controller
{

	public function cancelAppointment()
	{

		$uid = $_SESSION['uid'];
		$description = $_POST['description'];
		$this->model = $this->setModel('appointmentModel', $this->db);
		if ($this->model->delete_appointment($uid, $description)) {
			echo "success";
		}

	}


	public function makeAppointment()
	{

		$uid_patient = $_SESSION['uid'];
		$uid_doctor = $_POST['uid_doctor'];
		$date = $_POST['date'];
		$description = $_POST['description'];
		$this->model = $this->setModel('appointmentModel', $this->db);
		if ($this->model->make_appointment($uid_patient, $uid_doctor, $date, $description)) {
			if ($this->model->make_relations($uid_patient, $uid_doctor)) {
				echo "success";
			}	
		}

	}

	
}