<?php
session_start();
require("Connexion.php");
$obj = new Connexion();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>profil</title>
  </head>
  <body>

  <?php

    if(!isset($_SESSION["email"])){

        if(!isset($_SESSION["guest"])){

        echo "<div class='jumbotron'>";
        echo "<h3 class='text-danger mt-3 text-center'>Please log first</h3><br>";
        echo "<h5 class='text-center'><a  href='connexion.php' class=' btn btn-outline-info btn-sm'>log in </a></h5>";
        echo "</div>";

        die();
        }
    }
?>     
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Accueil.php">
            <img src="images/logo.png" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
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
                    echo '<li class="nav-item"><a class="nav-link" href="profil.php">profil</a></li>';
                  }                  
                ?>
              <li class="nav-item">
                <a class="nav-link" href="conf.php?destroy">sortir</a>
              </li>
              
            </ul>
        </div>
    </nav>

  
    <div class="container ">
           <div class="row">

                <?php
                
                  $articles = $obj->selectAllArticleChien($_GET["id"]);
                  
                  
                  foreach($articles as $article){
                    echo '<div class="col-sm-12 col-md-6 col-lg-3">
                  <div class="card" style="width: 18rem;">
                      <img src="'.$article->getImage().'" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title alert-info">Article title 1</h5>
                          <p class="card-text">'.$article->getContenu().'</p>
                          <div class="row">
                            <div class="col-9">
                                <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseExample1'; echo $article->getId();  echo '" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-comments"></i>
                                </a>
                            </div>
                            <div class="col-3">
                                <a class="btn btn-danger btn-sm">
                                     <i class="fa fa-heart" style="color:white"></i>
                                </a>
                            </div>
                          </div>
                          <div class="comment_box collapse" id="collapseExample1'; echo $article->getId(); echo'" style=" margin-top: 21px;
                          border-top: 1px solid rgb(224, 224, 224);padding-top:10px;">
                              
                                  <div class="comment_list"  style="margin-top:10px;">
                                    <ul class="list-unstyled">';
                                    $comments = $obj->selectAllCommentaire($article->getId());

                                      foreach($comments as $comment){
                                        echo '<li class="media">
                                        <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                        <div class="media-body">
                                            <h6 style="font-size:16px;"><strong class="zheader">'.$obj->selectUserById($comment->getUserId())->getPseudo().'</strong></h6>
                                            <p style="font-size:12px;">'; echo  $comment->getContenu();echo '</p>
                                        
                                        </div>
                                    </li>';
                                      }                                
                                          
                                        
                                    echo '</ul>
                                  </div>
                                  <div class="input-group input-group-sm">
                                          <input  type="text" class="form-control info" placeholder="send your comment" aria-label="Recipient username" aria-describedby="'.$comment->getId().'">
                                          <div class="input-group-append">
                                          <span class="input-group-text btn btn-outline-info btn-sm" id="'.$comment->getId().'" onclick="addcomment(this,'.$obj->selectUserAvecEmail($_SESSION["email"])->getId().','.$article->getId().')">share</span>
                                          </div>
                                  </div>
                            </div>
                        </div>
                  </div>
                  </div>
                  ';

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
						
						 if(hr.responseText = "sucess"){
              var url = window.location.href;

              setTimeout(() => {
                window.location.assign(url);
              }, 1000);
             }
                         
                         
					
					}
				}
				
				// drnf the data to PHP now...  and wait for response to update the status div 	
				hr.send(vars);

      
    }

    function addcomment(evt,user_id,article_id){
      var text = $(evt).parents(".input-group").children(".form-control").val();

        vars = "comment="+text+"&user_id="+user_id+"&article_id="+article_id;

        ajax("POST","conf.php",vars)

        event.preventDefault();
        //ajax("POST","conf.php",)


        //$(evt).parents('.comment_box').children(".comment_list").children("ul").append('<li class="media"><img src="images/téléchargement.png" width="30px" class="mr-3" alt="..."><div class="media-body"><h6 style="font-size:16px;"><strong class="zheader">'+user_name+'</strong></h6><p style="font-size:12px;">'+text+'</p></div></li>');
        
    }


   
    
    
    </script>
    
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>