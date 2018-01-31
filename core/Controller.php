<?php

class Controller
{	

	var $db = "fake";
	var $model;

	function __construct($database)
	{
		$this->db = $database;
	}

	public function setModel($model, $database)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model($database);
	}

	public function getView($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}

}