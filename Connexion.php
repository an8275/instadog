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




/* 
function insert(){
    
    $con =  Connexion::getInstance();

    $requete_prepare = $con->prepare(
        "insert into user(id,pseudo,email,dateDerniereConnexion,motDePass) 
    values(:id,:pseudo,:email,:dateDerniereConnexion,:motDePass)");
    $requete_prepare->execute(
        array('id' => 3, 'pseudo' => "jose", 'email' => "jose@kk.com", 'dateDerniereConnexion' => "2019-1-10-17:30", 'motDePass' => "josedskfsklfjskldj"));

    //return $con->lastInsertId();     
}



$obj1 = Connexion::getInstance();

$obj2 = Connexion::getInstance();


insert();

print_r($obj2->lastInsertId());
print_r(($obj1 === $obj2)? "two obj are same":"no they are not same");
 */
?>