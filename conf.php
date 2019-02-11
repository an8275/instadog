<?php
session_start();
include("Connexion.php");
$obj = new Connexion();

if(isset($_POST["email"]) && isset($_POST["mdp"])){
   $email = $_POST["email"];
   $mdp   = $_POST["mdp"];
   $salt = "pass@instadog";
   $motdepass = crypt($mdp,$salt);

   $obj = new Connexion();

    $resultat = $obj->selectUser($email,$motdepass);
   if($resultat){
    $_SESSION["email"] = $email;
    echo "sucess";
   }else{
       session_destroy();
       echo "failed";
   }

}

if(isset($_POST["guest"]) ){
    $_SESSION["guest"] = $_POST["guest"];
    echo "sucess";
}

if(isset($_GET["guest"]) ){
  $_SESSION["guest"] = $_GET["guest"];
  header("location:Accueil.php");
}

if(isset($_GET["destroy"])){
    session_destroy();
    echo "session destroyed ";
    //header("location: connexion.html");
    header( "refresh:1;connexion.php");
}

if(isset($_FILES["img"]) && isset($_POST["contenu"])){
    $contenu      = $_POST["contenu"];
    $fileName 	  = $_FILES['img']['name'];
    $fileTmpLoc   = $_FILES['img']['tmp_name'];
    $fileType     = $_FILES['img']['type'];
    $fileErrorMsg = $_FILES['img']['error'];
    $chien_id     = $_POST["chien_id"];
    $ext = explode(".",$fileName);
    $path = "uploads/".$ext[0].date("Y-M-H-I-s").$ext[1];
    
    
  
  
      
 if(move_uploaded_file($fileTmpLoc, $path)){
  
          //echo "$fileName upload is complete";
           if($obj->insertArticle($path,$contenu,date("Y-m-d H:i:s"),$chien_id)){

                echo "success";
           }

  
      }else {
          
          echo "move_uploaded_file function fialed";
      } 
    
  }


  //la partie inscription 


  if(isset($_REQUEST["pseudo"]) && isset($_REQUEST["email"]) && isset($_REQUEST["pwd"])){

    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $salt = "pass@instadog";
    $motdepass = crypt($pwd,$salt);


    if($obj->insertUser($pseudo,$email,$motdepass)){
        
        $_SESSION["email"] = $email;
        echo "sucess";
    }
  }


  //la parite update profil de personne

  if(isset($_POST["updatePseudo"])){

    $pseudo = $_POST["updatePseudo"];

    $user  = $obj->selectUserAvecEmail($_SESSION["email"])->changePseudo($obj->getConnexion(),$_SESSION["email"],$pseudo);
    echo "sucess";
    
  }

  if(isset($_POST["updateEmail"])){

    $email_updated = $_POST["updateEmail"];
    $user  = $obj->selectUserAvecEmail($_SESSION["email"])->changeEmail($obj->getConnexion(),$email_updated,$_SESSION["email"]);
    header( "refresh:1;profil.php");
    $_SESSION["email"] = $email_updated;
    echo "sucess";
  }

  if(isset($_POST["updatepwd"])){

    $pwd = $_POST["updatepwd"];
    $salt = "pass@instadog";
    $motdepass = crypt($pwd,$salt);

    $user  = $obj->selectUserAvecEmail($_SESSION["email"])->changeMotDePass($obj->getConnexion(),$motdepass,$_SESSION["email"]);
    echo "sucess";
    
  }


  //la partie ajoute un nouveau chien

  if(isset($_FILES["image_de_chien"])){

    $nom_de_chien         = $_POST["nom_de_chien"];
    $surnom_de_chien      = $_POST["surnom_de_chien"];
    $sex                  = $_POST["sex"];
    $age                  = $_POST["age"];
    $race_de_chien        = $_POST["race_de_chien"];

    $fileName 	  = $_FILES['image_de_chien']["name"];
    $fileTmpLoc   = $_FILES['image_de_chien']['tmp_name'];
    $fileType     = $_FILES['image_de_chien']['type'];
    $fileErrorMsg = $_FILES['image_de_chien']['error'];

    $ext = explode(".",$fileName);
    $path = "uploads/".$ext[0].date("Y-M-H-I-s").$ext[1];


    
    $user_id = $obj->selectUserAvecEmail($_SESSION["email"])->getId();
    
    
  
  
      
       if(move_uploaded_file($fileTmpLoc, $path)){
  
          //echo "$fileName upload is complete";
           if($obj->insertChien($nom_de_chien,$surnom_de_chien,$sex,$age,$race_de_chien,$path,$user_id)){

                echo "sucess";
           }

  
      }else {
          
          echo "move_uploaded_file function fialed";
      } 

    
  }


?>