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

          echo "<div class='jumbotron '>";
          echo "<h3 class='text-danger mt-3 text-center '>please log first</h3><br>";
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

  
    <div class="container jumbotron pt-2">
        <div class="row mt-3 message_area">
            <div class="col-12">
              <h3 class="text-center">Ajouter un Article</h3>
            </div>
        </div>
        <div class="row pl-3 pr-3 mt-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input btn-sm article_photo" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="inputGroupFile04">Charger un photo</label>
                </div>
        </div>
        <div class="row pl-3 pr-3 mt-3">
                <textarea class="form-control article_contenu" id="validationTextarea" placeholder="Required example textarea"></textarea>
                
        </div>
        <div class="col-12 mt-3 pl-0 pr-0"> 
            <input class="btn btn-primary col-5 btn-md mr-3 " type="button" value="Enregistrer">
            <input class="btn btn-secondary col-6 btn-md" type="button" value="Annuler">
        </div> 
    </div>


    <script>

      
     $("input[value=Enregistrer]").click(()=>{  
       img = document.querySelector(".article_photo");
       contenu = document.querySelector(".article_contenu").value;
       

      if(img != null && contenu != ""){
        ext = img.files[0].type.split("/")[1];
        if(ext =="jpg" || ext == "jpeg" || ext == "png"){
         
          var ajax = new XMLHttpRequest();
          var formdata = new FormData();
          formdata.append("img",img.files[0]);
          formdata.append("contenu",contenu);
          formdata.append("chien_id",<?php echo $_GET["chien_id"]?>);

          
          //ajax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
          ajax.onreadystatechange = function(){
						
						if(ajax.readyState == 4 && ajax.status==200){
						
						// 200 is used to show the object that is come from server is  not empty 
						
						$(".message_area > .col-12 .text-center").replaceWith("<h3 class='text-center text-success'>L'article a bien ajouté</h3>");
						setTimeout(() => {
              $(".message_area > .col-12 .text-success").replaceWith('<h3 class="text-center">Ajouter un Article</h3>');
            }, 3000);
            window.location.assign("chien.php?chien_id="+<?php echo $_GET["chien_id"]?>);
						
						
						}
						
					}
         
          ajax.open("POST",'conf.php');
          ajax.send(formdata);




        }else
        console.log("not a bon format");

      }else {
        console.log("filed are required");
      }

      
       
     })
    </script>

    
      

    
    
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>