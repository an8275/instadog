<?php

class User {


    //les varible sont privées on ne peut pas avoir access directement
    private $connexion;
    private $pseudo;
    private $email;
    private $dateDernierConnexion;
    private $motDePass;

    public function __construct($con){

        $this->connexion = $con;
    }

    public function selectAllUser(){
        
    }
    public function getPseudo($id){
        
    }
    
    public function getEmail($id){
        
    }

    public function getDateDernierConnexion($id){
        
    }

    public function getMotDePass($id){
        
    }

    


}



?>