<?php

class doctorModel extends Model 
{

	function insert_doctor($uid, $licenseNum)
	{
		try {
			$results = $this->db->prepare("INSERT INTO doctor (uid, license_num) 
										   VALUES(?, ?)
										   ");
			$results->bindParam(1, $uid);
			$results->bindParam(2, $licenseNum);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}
		
		return true;
	}



	function write_report($doctor_id, $report_to, $content, $date)
	{
		try {
			$results = $this->db->prepare("INSERT INTO report (patient_id, doctor_id, content, date) 
										   SELECT patient.id, ?, ?, ?
										   FROM patient
										   WHERE patient.uid = (SELECT uid FROM users WHERE email = ?)
										   ");
			$results->bindParam(1, $doctor_id);
			$results->bindParam(2, $content);
			$results->bindParam(3, $date);
			$results->bindParam(4, $report_to);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}
		
		return true;
	}



	function get_doctor_id($uid)
	{
		try {
			$results = $this->db->prepare("SELECT id 
										   FROM doctor 
										   WHERE uid = ?
										   ");
			$results->bindParam(1, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$id = $results->fetch(PDO::FETCH_ASSOC);

		return $id['id'];
	}


	function get_doctor_info($uid)
	{
		try {
			$results = $this->db->prepare("SELECT license_num, degree, experience, specialty 
										   FROM doctor 
										   WHERE uid = ?
										   ");
			$results->bindParam(1, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}
		
		$info = $results->fetch(PDO::FETCH_ASSOC);

		return $info;
	}


	function get_my_doctors($patient_id)
	{
		try {
			$results = $this->db->prepare("SELECT users.first_name, users.last_name, users.email, users.avatar, doctor.license_num, doctor.degree, doctor.experience, specialties.specialty 
										   FROM users 
										   INNER JOIN doctor 
										   ON users.uid = doctor.uid 
										   INNER JOIN specialties 
										   ON specialties.id = doctor.specialty 
										   WHERE doctor.id IN (SELECT doctor_id FROM doctor_patient_relations WHERE patient_id = ?)
										   ");
			$results->bindParam(1, $patient_id);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$doctors = $results->fetchAll(PDO::FETCH_ASSOC);

		return $doctors;
	}


	function get_all_doctors()
	{
		try {
			$results = $this->db->prepare("SELECT users.first_name, users.last_name, users.email, users.avatar, doctor.license_num, doctor.degree, doctor.experience, specialties.specialty 
										   FROM users 
										   INNER JOIN doctor 
										   ON users.uid = doctor.uid 
										   INNER JOIN specialties 
										   ON specialties.id = doctor.specialty
										   ");
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$doctors = $results->fetchAll(PDO::FETCH_ASSOC);

		return $doctors;
	}


	/**
	*@param user's firstName, lastName, email, gender, uid 
	*@return boolean
	**/
	function update_doctor_info($pharmacist_email, $degree, $experience, $license, $specialty, $uid) 
	{
		try {
			$results = $this->db->prepare("UPDATE doctor 
										   SET pharmacist_email = ?
										       degree = ?, 
										   	   experience = ?, 
										   	   license_num = ?, 
										   	   specialty = (SELECT id FROM specialties WHERE specialty = ?) 
										   WHERE uid = ?
										   ");
			$results->bindParam(1, $pharmacist_email);
			$results->bindParam(2, $degree);
			$results->bindParam(3, $experience);
			$results->bindParam(4, $license);
			$results->bindParam(5, $specialty);
			$results->bindParam(6, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		return true;
	}

}

