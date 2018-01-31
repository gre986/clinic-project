<?php

class teamsModel extends Model
{
	/**
	*@param None
	*@return latest 8 images as a array
	**/
	function get_image()
	{
		try {
			$results = $this->db->query("SELECT images_url 
										 FROM teams 
										 ");
		} catch(Exception $e) {
			$_SESSION['imageError'] = $e->getMessage();
			return false;
		}

		$images = $results->fetchAll(PDO::FETCH_ASSOC);
		
		return $images;

	}
}