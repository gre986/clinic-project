<?php

class appointmentModel extends Model 
{

	function get_appointment_info()
	{
		try {
			$results = $this->db->prepare("SELECT CONCAT(doctor.uid, appointment.description) AS appointment 
										   FROM appointment 
										   INNER JOIN doctor 
										   ON doctor.id = appointment.doctor_id
										   ");
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$info = array();

		$appointments = $results->fetchAll(PDO::FETCH_ASSOC);

		foreach ($appointments as $value) {
			array_push($info, $value['appointment']);
		}

		return $info;
	}


	function get_patient_appointments($uid)
	{
		$today = date("Y-m-d");

		try {
			$results = $this->db->prepare("SELECT appointment.description, appointment.doctor_id, users.avatar, CONCAT(users.first_name, ' ', users.last_name) AS doctor_name 
										   FROM appointment
										   INNER JOIN doctor 
										   ON doctor.id = appointment.doctor_id AND appointment.patient_id = (SELECT id FROM patient WHERE uid = ?) 
										   INNER JOIN users 
										   ON doctor.uid = users.uid
										   WHERE appointment.patient_id = (SELECT id FROM patient WHERE uid = ?) AND date >= ?
										   ");
			$results->bindParam(1, $uid);
			$results->bindParam(2, $uid);
			$results->bindParam(3, $today);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$info = $results->fetchAll(PDO::FETCH_ASSOC);

		return $info;
	}


	function get_doctor_appointments($uid)
	{
		$today = date("Y-m-d");

		try {
			$results = $this->db->prepare("SELECT appointment.description, appointment.patient_id, users.avatar, CONCAT(users.first_name, ' ', users.last_name) AS patient_name 
										   FROM appointment 
										   INNER JOIN patient ON patient.id = appointment.patient_id AND appointment.doctor_id = (SELECT id FROM doctor WHERE uid = ?)
										   INNER JOIN users ON patient.uid = users.uid
										   WHERE appointment.id = (SELECT id FROM appointment WHERE doctor_id = (SELECT id FROM doctor WHERE uid = ?) AND date >= ?)
										   ");
			$results->bindParam(1, $uid);
			$results->bindParam(2, $uid);
			$results->bindParam(3, $today);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$info = $results->fetchAll(PDO::FETCH_ASSOC);

		return $info;
	}


	function delete_appointment($uid, $description)
	{

		try {
			$results = $this->db->prepare("DELETE
										   FROM appointment 
										   WHERE description = ? 
										   AND patient_id = (SELECT id FROM patient WHERE uid = ?)
										   ");
			$results->bindParam(1, $description);
			$results->bindParam(2, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		return true;

	}


	function make_appointment($uid_patient, $uid_doctor, $date, $description)
	{

		try {
			$results = $this->db->prepare("INSERT INTO appointment 
										   SET patient_id = (SELECT id FROM patient WHERE uid = ?), 
										   	   doctor_id = (SELECT id FROM doctor WHERE uid = ? ), 
										   	   description = ?, 
										   	   date = ?
										   	   ");
			$results->bindParam(1, $uid_patient);
			$results->bindParam(2, $uid_doctor);
			$results->bindParam(3, $description);
			$results->bindParam(4, $date);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		return true;

	}


	function make_relations($uid_patient, $uid_doctor)
	{

		try {
			$results = $this->db->prepare("SELECT *
										   FROM doctor_patient_relations 
										   WHERE patient_id = (SELECT id FROM patient WHERE uid = ?)
										   AND doctor_id = (SELECT id FROM doctor WHERE uid = ? ) 
										   ");
			$results->bindParam(1, $uid_patient);
			$results->bindParam(2, $uid_doctor);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
		}
		$exist = $results->fetch(PDO::FETCH_ASSOC);

		if ($exist) {
			return true;
		}else {
			try {
				$results = $this->db->prepare("INSERT INTO doctor_patient_relations 
											   SET patient_id = (SELECT id FROM patient WHERE uid = ?), 
											   	   doctor_id = (SELECT id FROM doctor WHERE uid = ? ) 
											   	   ");
				$results->bindParam(1, $uid_patient);
				$results->bindParam(2, $uid_doctor);
				$results->execute();
			} catch(Exception $e) {
				$_SESSION['dbError'] = $e->getMessage();
				return false;
			}

			return true;
		}

	}


}

