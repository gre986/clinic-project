<?php

class questionModel extends Model 
{

	function get_questions()
	{
		try {
			$results = $this->db->prepare("SELECT description
										   FROM question_description
										   ");
			$results->bindParam(1, $uid);
			$results->bindParam(2, $licenseNum);
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}
		
		$questions = $results->fetchALL(PDO::FETCH_ASSOC);
		
		return $questions;
	}

}

