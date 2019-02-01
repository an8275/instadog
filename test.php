<?php
include("Connexion.php");

 $con = Connexion::getInstance();



function insert(){
    global $con;
    $requete_prepare = $con->prepare(
        "insert into user(id,pseudo,email,dateDerniereConnexion,motDePass) 
    values(:id,:pseudo,:email,:dateDerniereConnexion,:motDePass)");
    $requete_prepare->execute(
        array('id' => 3, 'pseudo' => "jose", 'email' => "jose@kk.com", 'dateDerniereConnexion' => "2019-1-10-17:30", 'motDePass' => "josedskfsklfjskldj"));

    return $con->lastInsertId();     
}


print_r(insert());



?>