<?php

class Commentaire {


    //les varible sont privées on ne peut pas avoir access directement
    private $connexion;
    private $id;
    private $contunu;
    private $date;
    private $pseudo;

    public function __construct($con){

        $this->connexion = $con;
    }

    public function selectAllCommentaire(){
        
    }
    public function getContenu($id){
        
    }
    
    public function getDate($id){
        
    }

    public function getPseudo($id){
        
    }




}



?>