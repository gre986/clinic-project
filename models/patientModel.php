<?php

class patientModel extends Model 
{
	function insert_patient($uid)
	{
		try {
			$results = $this->db->prepare("INSERT INTO patient (uid) 
										   VALUES (?)
										   ");
			$results->bindParam(1, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}
		
		return true;
	}


	function insert_patient_health_info($uid)
	{
		try {
			$results = $this->db->prepare("INSERT INTO patient_health_information (patient_id) 
										   SELECT id FROM patient WHERE uid = ?
										   ");
			$results->bindParam(1, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}
		
		return true;
	}


	function get_patient_id($uid)
	{
		try {
			$results = $this->db->prepare("SELECT id 
										   FROM patient 
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


	function get_my_patients($doctor_id)
	{
		try {
			$results = $this->db->prepare("SELECT users.first_name, users.gender, users.last_name, users.email, users.avatar, patient.address, patient.date_of_birth, patient.height, patient.weight, patient_health_information.1, patient_health_information.2, patient_health_information.3, patient_health_information.4, patient_health_information.5, patient_health_information.6, patient_health_information.7, patient_health_information.8, patient_health_information.9, patient_health_information.10, patient_health_information.11, patient_health_information.12, patient_health_information.13, patient_health_information.14, patient_health_information.15, patient_health_information.16, patient_health_information.17, patient_health_information.18, patient_health_information.19, patient_health_information.20, patient_health_information.21, patient_health_information.22, patient_health_information.23, patient_health_information.24, patient_health_information.25, patient_health_information.26, patient_health_information.27, patient_health_information.28, patient_health_information.29, patient_health_information.30, patient_health_information.31, patient_health_information.32, patient_health_information.33, patient_health_information.34, patient_health_information.35, patient_health_information.36, patient_health_information.37, patient_health_information.38, patient_health_information.39, patient_health_information.40, patient_health_information.41 
										   FROM patient 
										   INNER JOIN users 
										   ON patient.uid = users.uid
										   INNER JOIN patient_health_information
										   ON patient.id = patient_health_information.patient_id
										   WHERE patient.id IN (SELECT patient_id FROM doctor_patient_relations WHERE doctor_id = ?)
										   ");
			$results->bindParam(1, $doctor_id);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$doctors = $results->fetchAll(PDO::FETCH_ASSOC);

		return $doctors;
	}


	function get_patient_info($uid)
	{
		try {
			$results = $this->db->prepare("SELECT address, date_of_birth, weight, height, pharmacist_email 
										   FROM patient 
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



	function get_patient_reports($uid)
	{
		try {
			$results = $this->db->prepare("SELECT report.content, report.date, users.first_name, users.last_name
										   FROM report
										   INNER JOIN doctor
										   ON doctor.id = report.doctor_id
										   INNER JOIN users
										   ON doctor.uid = users.uid 
										   WHERE patient_id = (SELECT id FROM patient WHERE uid = ?)
										   ORDER BY date DESC
										   ");
			$results->bindParam(1, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}
		
		$info = $results->fetchAll(PDO::FETCH_ASSOC);

		return $info;
	}



	function get_patient_health_info($uid)
	{
		try {
			$results = $this->db->prepare("SELECT `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41` 
										   FROM patient_health_information 
										   WHERE patient_id = (SELECT id FROM patient WHERE uid = ?)
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


	/**
	*@param user's address, birthday, weight, height, uid 
	*@return boolean
	**/
	function update_patient_info($pharmacist_email, $address, $birthday, $weight, $height, $uid) 
	{
		try {
			$results = $this->db->prepare("UPDATE patient 
										   SET pharmacist_email = ?,
										       address = ?, 
										   	   date_of_birth = ?, 
										   	   weight = ?, 
										   	   height = ? 
										   WHERE uid = ?
										   ");
			$results->bindParam(1, $pharmacist_email);
			$results->bindParam(2, $address);
			$results->bindParam(3, $birthday);
			$results->bindParam(4, $weight);
			$results->bindParam(5, $height);
			$results->bindParam(6, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		return true;
	}


	/**
	*@param user's health_info(array), uid 
	*@return boolean
	**/
	function update_patient_health_info($health_info, $uid) 
	{
		try {
			$results = $this->db->prepare("UPDATE patient_health_information 
										   SET `1` = ?,
										   	   `2` = ?,
										   	   `3` = ?,
										   	   `4` = ?,
										   	   `5` = ?,
										   	   `6` = ?,
										   	   `7` = ?,
										   	   `8` = ?,
										   	   `9` = ?,
										   	   `10` = ?,
										   	   `11` = ?,
										   	   `12` = ?,
										   	   `13` = ?,
										   	   `14` = ?,
										   	   `15` = ?,
										   	   `16` = ?,
										   	   `17` = ?,
										   	   `18` = ?,
										   	   `19` = ?,
										   	   `20` = ?,
										   	   `21` = ?,
										   	   `22` = ?,
										   	   `23` = ?,
										   	   `24` = ?,
										   	   `25` = ?,
										   	   `26` = ?,
										   	   `27` = ?,
										   	   `28` = ?,
										   	   `29` = ?,
										   	   `30` = ?,
										   	   `31` = ?,
										   	   `32` = ?,
										   	   `33` = ?,
										   	   `34` = ?,
										   	   `35` = ?,
										   	   `36` = ?,
										   	   `27` = ?,
										   	   `28` = ?,
										   	   `39` = ?,
										   	   `40` = ?,
										   	   `41` = ?
										   WHERE patient_id = (SELECT id FROM patient WHERE uid = ?)
										   ");
			for ($i=0; $i <= 41 ; $i++) {
				if ($health_info[$i] == "NULL") {
					$health_info[$i] = NULL;
				}
				$results->bindParam($i+1, $health_info[$i]);
			}
			$results->bindParam(42, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		return true;
	}

	
}

