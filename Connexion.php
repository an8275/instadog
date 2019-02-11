<?php

class Connexion {
	private $connexion;
	public function __construct(){

		$db_info = array(
			"db_host" => "localhost",
			"db_port" => "3306",
			"db_user" => "adminInstaDog",
			"db_pass" => "digital2018",
			"db_name" => "InstaDog");
		try{
			$this->connexion = new PDO("mysql:host=".$db_info['db_host'].';port='.$db_info['db_port'].';dbname='.$db_info['db_name'], $db_info['db_user'], $db_info['db_pass']);
			$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch (Exception $e) {
			echo 'Erreur : '.$e->getMessage().'<br />';
			echo 'N° : '.$e->getcode();
		}

	}//la fin de notre constructor 
			

	

	//user 
	
	//pour se connecter et afficher ses pseudo mo de pass
	function selectUser($email,$mdp){
		$requete_prepare = $this->connexion->prepare(
		"select * from user where email = :email and motDePass = :mdp");
		$requete_prepare->execute(array("email"=>$email, "mdp"=>$mdp));
		$result = $requete_prepare->fetchObject("User");
		return $result;   
	}

	//pour selectioner les data d'utilisatuer avec son email on l'a besion pour la partie profil de personne
	function selectUserAvecEmail($email){
		$requete_prepare = $this->connexion->prepare(
		"select * from user where email = :email");
		$requete_prepare->execute(array("email"=>$email));
		$result = $requete_prepare->fetchObject("User");
		return $result;
	}

	//pour s'inscrire 
	function insertUser($pseudo,$email,$motDePass){
        $requete_prepare = $this->connexion->prepare(
        "insert into user(pseudo,email,motDePass) 
        values(:pseudo,:email,:motDePass)");
        $requete_prepare->execute(
            array('pseudo' => $pseudo, 'email' => $email, 'motDePass' => $motDePass));
    
        return $this->connexion->lastInsertId();     
	}

	//chien

	//select les chien d'utilisateur 
	function selectChien($id){
		$requete_prepare = $this->connexion->prepare(
		"select * from chien where id = :id");
		$requete_prepare->execute(array("id"=>$id));
		$result = $requete_prepare->fetchObject("Chien");
		return $result;   
	}
	//pour la page d'acceuil
	function selectAllChien(){
		$requete_prepare = $this->connexion->prepare(
		"select * from chien");
		$requete_prepare->execute();
		$result = $requete_prepare->fetchAll(PDO::FETCH_CLASS,"Chien");
		return $result;   
	}
	//pour afficher les chien d'utilisateur
	function selectAllChienId($id){
		$requete_prepare = $this->connexion->prepare(
		"select * from chien where user_id = :id");
		$requete_prepare->execute(array("id"=>$id));
		$result = $requete_prepare->fetchAll(PDO::FETCH_CLASS,"Chien");
		return $result;   
	}


	//pour ajouter un chien 
	function insertChien($nom,$surnom,$sex,$age,$race,$photo,$user_id){
        $requete_prepare = $this->connexion->prepare(
        "insert into chien(nom,surnom,sex,age,race,photo,user_id) 
        values(:nom, :surnom, :sex, :age, :race, :photo, :user_id)");
        $requete_prepare->execute(
            array('nom' => $nom, 'surnom' => $surnom, 'sex' => $sex, "age"=>$age, "race"=>$race, "photo"=>$photo, "user_id"=>$user_id));
    
        return $this->connexion->lastInsertId();     
	}

	//Article



	//jusqu'à la toutes sont testé



	//pour afficher les article de chien 
	public function selectAllArticleChien($id){
		$requete_prepare = $this->connexion->prepare(
			"select * from article where chien_id = :id");
		$requete_prepare->execute(array("id"=>$id));
		$result = $requete_prepare->fetchAll(PDO::FETCH_CLASS,"Article");
		return $result;

	}


	public function insertArticle($img,$contunu,$date,$id){
		$requete_prepare = $this->connexion->prepare(
			"insert into article (img,contenu,dateArticle,chien_id) values (:img, :contenu, :date, :id)");
		$requete_prepare->execute(array("img"=>$img, "contenu"=>$contunu, "date"=>$date, "id"=>$id));
		return $this->connexion->lastInsertId();

	}



	//commentaire 


	//pour afficher les commentaire d'articles 
	public function selectAllCommentaire($id){
		$requete_prepare = $this->connexion->prepare(
			"select * from Commentaire where article_id = :id");
		$requete_prepare->execute(array("id"=>$id));
		$result = $requete_prepare->fetchAll(PDO::FETCH_CLASS,"Commentaire");
		return $result;

	}

	//pour inserer une commentaire
	public function insertCommentaire($contenu,$userId,$article_id){
		$requete_prepare = $this->connexion->prepare(
			"insert into Commentaire (contenu,user_id,article_id) values (:contenu, :user_id, :article_id)"
		);
		$requete_prepare->execute(array("contenu"=>$contenu, "user_id"=>$userId, "article_id"=>$article_id));
		return $this->connexion->lastInsertId();
	}

	public function getConnexion(){
		return $this->connexion;
	}	
}






//Class Article 

class Article {


    //les varible sont privées on ne peut pas avoir access directement
    private $id;
    private $img;
    private $contenu;
    private $dateArticle;
    private $chienId;


    public function getImage(){
        return $this->img;
    }
    
    public function getContenu(){
        return $this->contenu;
    }

    public function getDateArticle(){
        return $this->dateArticle;
    }

    public function getChienId(){
        return $this->chienId;
    }



}





//Class user 
class User {


    //les varible sont privées on ne peut pas avoir access directement
    private $id;
    private $pseudo;
    private $email;
    private $dateDerniereConnexion;
    private $motDePass;

    // tous les method geter 

    public function getId(){
        return $this->id;  
    }

    public function getPseudo(){
        return $this->pseudo;  
    }
    
    public function getEmail(){
        return $this->email;  
    }

    public function getDateDerniereConnexion(){
        return $this->dateDerniereConnexion;  
    }

    public function getMotDePass(){
        return $this->motDePass;
    }


    // les meothod seter
    

    public function changePseudo($con,$email,$pseudo){

        $requete_prepare = $con->prepare(
        "update user set pseudo=:pseudo where email = :email");
        $requete_prepare->execute(array('email' => $email,'pseudo' =>$pseudo)); 
    }

    public function changeEmail($con,$email_updated,$email){
        $requete_prepare = $con->prepare(
        "update user set email=:email_updated where email = :email");
		$requete_prepare->execute(array('email_updated' => $email_updated, "email"=>$email));
		
		
    }

    public function changeMotDePass($con,$mdp,$email){
        $requete_prepare = $con->prepare(
        "update user set motDePass=:mdp where email = :email");
		$requete_prepare->execute(array('mdp' => $mdp, 'email' => $email));
		
    }



    //toutes les fonction marchent bien 
    


	
	

}

//Class Commentaire
class Commentaire {


	//les varible sont privées on ne peut pas avoir access directement
	private $id;
	private $contunu;
	private $date;
	private $user_id;
	private $article_id;


	public function getContenu(){
		return $this->contunu;
	}
	
	public function getDate(){
		return $this->date;
	}

	public function getUserId(){
		return $this->user_id;
	}

	public function getArticleId(){
		return $this->article_id;
	}




}


//class chien 
class Chien {


    //les varible sont privées on ne peut pas avoir access directement
    private $id;
    private $nom;
    private $surnom;
    private $sex;
    private $age;
    private $race;
    private $photo;
    private $user_id;

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }
    
    public function getSurnom(){
        return $this->surnom;
    }

    public function getSex(){
        return $this->sex; 
    }

    public function getAge(){
        return $this->age; 
    }

    public function getRace(){
        return $this->race;
    }

    public function getPhoto(){
        return $this->photo;
    }

    public function getUserId(){
        return $this->user_id; 
    }




}









?>