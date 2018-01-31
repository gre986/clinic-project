<?php

class usersModel extends Model
{
	/**
	*@param user's email
	*@return user's password
	**/
	function get_login_info($email)
	{
		try {
			$results = $this->db->prepare("SELECT password, first_name, type 
										   FROM users 
										   WHERE email = ?
										   ");
			$results->bindParam(1, $email);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$info = $results->fetch(PDO::FETCH_ASSOC);

		return $info;
	}

	/**
	*@param user's firstName, lastName, email, password, gneder
	*@return boolean
	**/
	function insert_user_info($type, $firstName, $lastName, $email, $password, $gender) 
	{
		try {
			$results = $this->db->prepare("INSERT INTO users (type, last_name, first_name, password, email, gender) 
				 						   VALUES(?, ?, ?, ?, ?, ?)
				 						   ");
			$results->bindParam(1, $type);
			$results->bindParam(2, $lastName);
			$results->bindParam(3, $firstName);
			$results->bindParam(4, $password);
			$results->bindParam(5, $email);
			$results->bindParam(6, $gender);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		return true;
	}

	/**
	*@param user's email
	*@return user's uid
	**/
	function get_uid($email) 
	{
		try {
			$results = $this->db->prepare("SELECT uid 
										   FROM users 
										   WHERE email = ?
										   ");
			$results->bindParam(1, $email);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$info = $results->fetch(PDO::FETCH_ASSOC);

		return $info['uid'];
	}

	/**
	*@param user's avatar, uid
	*@return boolean
	**/
	function update_avatar($avatar, $uid) 
	{
		try {
			$results = $this->db->prepare("UPDATE users 
										   SET avatar = ? 
										   WHERE uid = ?
										   ");
			$results->bindParam(1, $avatar);
			$results->bindParam(2, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		return true;
	}


	/**
	*@param user's firstName, lastName, email, gender, uid 
	*@return boolean
	**/
	function update_user_info($firstName, $lastName, $email, $gender, $uid) 
	{
		try {
			$results = $this->db->prepare("UPDATE users 
										   SET first_name = ?, 
										       last_name = ?, 
										       email = ?, 
										       gender = ? 
										   WHERE uid = ?
										   ");
			$results->bindParam(1, $firstName);
			$results->bindParam(2, $lastName);
			$results->bindParam(3, $email);
			$results->bindParam(4, $gender);
			$results->bindParam(5, $uid);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		return true;
	}


	/**
	*@param user's email
	*@return user's last_name, first_name, email, gender, avatar
	**/
	function get_all_user_info($uid)
	{
		try {
			$results = $this->db->prepare("SELECT last_name, first_name, email, gender, avatar 
										   FROM users 
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


	/**
	*@param none
	*@return array of all the doctors names
	**/
	function get_doctor_names()
	{
		try {
			$results = $this->db->prepare("SELECT uid, CONCAT(first_name, ' ', last_name) AS fullname 
										   FROM users 
										   WHERE type = 2
										   ");
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}

		$info = $results->fetchAll(PDO::FETCH_ASSOC);

		return $info;
	}


}












