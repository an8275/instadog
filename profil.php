<?php
session_start();
require("Connexion.php");
$obj = new Connexion();
$user_details = $obj->selectUserAvecEmail($_SESSION["email"]);
$user_chien  = $obj->selectAllChienId($user_details->getId());


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>profil</title>
  </head>
  <body>

  <?php
  if(!isset($_SESSION["email"])){

    if(!isset($_SESSION["guest"])){

    echo "<div class='jumbotron'>";
    echo "<h3 class='text-danger mt-3 text-center'>please log first</h3><br>";
    echo "<h5 class='text-center'><a  href='connexion.php' class=' btn btn-info btn-sm'>log in </a></h5>";
    echo "</div>";

    die();
    }
}
?>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="images/logo.svg" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href="Accueil.php">Accueil <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="inscription.php">S'inscrire</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="connexion.php">Se connecter</a>
              </li>
              
              <?php
                  if(isset($_SESSION["guest"])){
                      
                  }else if(isset($_SESSION["email"])){
                    echo '<li class="nav-item active"><a class="nav-link" href="profil.php">profil</a></li>';
                  }                  
                ?>
              <li class="nav-item">
                <a class="nav-link" href="conf.php?destroy">sortir</a>
              </li>
              
            </ul>
        </div>
    </nav>

    <div class="container alert-secondary pt-3">
        <div class="row mt-3 text-center">
            <div class="col-12 error_info">
                <h4>Profil de la personne</h4>
            </div>
        </div>
        <?php
        
        $dataArray =  array($user_details->getPseudo(),$user_details->getEmail(),$user_details->getMotDePass());
        
        
        for($i =0;$i<count($dataArray);$i++){
            if($i==2){
                echo  '<div class="row pl-3 pr-3 profil-edit-parent" key ="'.$i.'" >
                    <div class="col-10">
                        <p> ********** </p>
                    </div>
                    <div class="col-2"><i class="fas fa-edit edit_profil" onclick="update_profil(this)"></i>
                    </div>
                   </div>';
            }else {
            echo  '<div class="row pl-3 pr-3 profil-edit-parent" key ="'.$i.'">
                    <div class="col-10">
                        <p>'.$dataArray[$i].'</p>
                    </div>
                    <div class="col-2"><i class="fas fa-edit edit_profil" onclick="update_profil(this)"></i>
                    </div>
                   </div>';
            }       
        }
        

        ?>
        
        <div class="row pl-3 pr-3">
            <div class="col-10 text-center">
                <h5><b>Mes chiens</b></h5>
            </div>
            <div class="col-2">
                    <a href="ajoutechien.php"><i class="fas fa-plus-circle" style="color:green; font-size: 17pt"></i></a>
            </div>
        </div>
        <div class="row mt-3 pb-3" style="border-top:1px solid gray;"></div>
        <div class="row">
            <?php
                foreach($user_chien as $chien){

                    echo '<div class="col-6">
                        <h6>'.$chien->getSurnom().'</h6>
                        <a href="chien.php?id='.$chien->getId().'"><img src="'.$chien->getPhoto().'" alt="..." class="img-thumbnail"></a>
                        <a href="AjouteArticle.php?id='.$chien->getId().'" class="btn btn-sm btn-primary mt-1">+ Article</a>
                      </div>';
                }
            ?>
        </div>

    </div>


    <script>
        
        function ajax(type,url,vars){
        var hr = new XMLHttpRequest();
				
				//create some variables we need to send to our PHP file
				
				//var url = "profil.php";
				
				
				//var vars = "email="+email+"&mdp="+mdp;
               var return_data;
						
				hr.open(type,url,true);
				//set content type header information for sending url encoded variables in the request 
				
				hr.setRequestHeader('content-type',"application/x-www-form-urlencoded");
				
				// Access the onreadyStateChange event for the XMLHttpRequest object
				
				hr.onreadystatechange = function(){
					
					if(hr.readyState == 4 && hr.status == 200){
						
						 return_data = hr.responseText;
                         if(return_data == "sucess"){
                          $(".error_info").append('<h6 class="text-center alert-success"> updated </h6>');
                          setTimeout(function(){
                                $(".error_info").children("h6").remove();
                             }, 3000);
                         }
                         console.log(return_data);
					
					}
				}
				
				// drnf the data to PHP now...  and wait for response to update the status div 	
				hr.send(vars);
				return return_data;

    }        
        function update_profil(e){
        var h = $(e).parents(".profil-edit-parent").children(".col-10").children("p").html();
        $(e).parents(".profil-edit-parent").children(".col-10").children("p").remove();
        $(e).parents(".profil-edit-parent").children(".col-10").html("<input type='text' style='font-size: 10pt;padding-left: 5px;border: 1px solid gray;margin-bottom: 8px;' type='text' value='"+h+"'>");
        $(e).replaceWith('<i class="fas fa-clipboard-check update_profil" style="font-size:17pt;color:red;" onclick="update(this)"></i>');
        }
    
        

     function update(e){
        var h  = $(e).parents(".profil-edit-parent").children(".col-10").children("input").val();

      //la partie compliquer

        if($(e).parents(".profil-edit-parent").attr("key") == "0"){
          
          console.log(ajax("POST","conf.php","updatePseudo="+h));
        }
        if($(e).parents(".profil-edit-parent").attr("key") == "1"){
          console.log(ajax("POST","conf.php","updateEmail="+h));
        }
        if($(e).parents(".profil-edit-parent").attr("key") == "2"){
          console.log(ajax("POST","conf.php","updatepwd="+h));
          window.location.assign("profil.php");
        }


        


        $(e).parents(".profil-edit-parent").children(".col-10").children("input").remove();
        $(e).parents(".profil-edit-parent").children(".col-10").append("<p>"+h+"</p>");
        $(e).replaceWith('<i class="fas fa-edit edit_profil"  onclick="update_profil(this)" ></i>');
     }

     
    
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>