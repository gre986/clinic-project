<?php

class galleryModel extends Model
{
	/**
	*@param None
	*@return latest 18 images as a array
	**/
	function get_image()
	{
		try {
			$results = $this->db->query("SELECT images_url 
										 FROM gallery 
										 ORDER BY upload_time 
										 LIMIT 18
										 ");
		} catch(Exception $e) {
			$_SESSION['imageError'] = $e->getMessage();
			return false;
		}

		$images = $results->fetchAll(PDO::FETCH_ASSOC);

		return $images;

	}
}