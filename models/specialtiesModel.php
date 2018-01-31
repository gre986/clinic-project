<?php

class specialtiesModel extends Model 
{

	function get_all_specialties()
	{
		try {
			$results = $this->db->prepare("SELECT id, specialty 
										   FROM specialties
										   ");
			$results->execute();
		} catch(Exception $e) {
			$_SESSION['dbError'] = $e->getMessage();
			return false;
		}
		
		$specialties = [];
		while ($specialty = $results->fetch(PDO::FETCH_ASSOC)) 
		{
		  	$specialties[$specialty['id']] = $specialty['specialty'];
		}

		return $specialties;
	}

}

