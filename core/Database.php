<?php

require_once '../app/config/config.php';

$DB_CONFIG = new DB_CONFIG();

try {
	$db = new PDO(
		"mysql:host=".$DB_CONFIG->default['host'].
		";dbname=".$DB_CONFIG->default['database'].
		";port=".$DB_CONFIG->default['port'], 
		$DB_CONFIG->default['username'],
		$DB_CONFIG->default['password']
		);
	$db->exec("SET NAMES 'utf8'");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(Exception $e) {
	echo $e->getMessage();
	die();
}