<?php

class Connexion {
	protected static $instance;
	protected function __construct() {}
	public static function getInstance() {
		if(empty(self::$instance)) {
			$db_info = array(
				"db_host" => "localhost",
				"db_port" => "3306",
				"db_user" => "adminInstaDog",
				"db_pass" => "digital2018",
				"db_name" => "InstaDog");
			try {
				self::$instance = new PDO("mysql:host=".$db_info['db_host'].';port='.$db_info['db_port'].';dbname='.$db_info['db_name'], $db_info['db_user'], $db_info['db_pass']);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
			} catch(PDOException $error) {
				echo $error->getMessage();
			}
		}
		return self::$instance;
	}
	
}


	
	









?>