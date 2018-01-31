<?php

class Model
{
	var $db;

	function __construct($database)
	{
		$this->db = $database;
	}
}