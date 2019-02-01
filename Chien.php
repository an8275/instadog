<?php

class Chien {


    //les varible sont privées on ne peut pas avoir access directement
    private $connexion;
    private $id;
    private $nom;
    private $surnom;
    private $sex;
    private $age;
    private $race;
    private $photo;
    private $listArticle;

    public function __construct($con){

        $this->connexion = $con;
    }

    public function selectAllChien(){
        
    }
    public function getNom($id){
        
    }
    
    public function getSurnom($id){
        
    }

    public function getSex($id){
        
    }

    public function getAge($id){
        
    }

    public function getRace($id){
        
    }

    public function getPhoto($id){
        
    }

    public function getListArticle($id){
        
    }


}



?>