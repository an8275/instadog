<?php

class Article {


    //les varible sont privées on ne peut pas avoir access directement
    private $connexion;
    private $id;
    private $img;
    private $contenu;
    private $dateArticle;
    private $chienId;

    public function __construct($con){

        $this->connexion = $con;
    }

    public function selectAllArticle(){
        
    }
    public function getImage($id){
        
    }
    
    public function getContenu($id){
        
    }

    public function getDateArticle($id){
        
    }

    public function getChienId($id){
        
    }



}



?>