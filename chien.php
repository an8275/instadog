<?php
session_start();
include("Connexion.php");
$obj = new Connexion();
$chien = $obj->selectChien($_GET["id"]);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Hello, world!</title>
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

  
    <div class="container">
    <br>
    <div class="row-fluid alert alert-secondary">
            <div class="media">
                <img src="<?php echo $chien->getPhoto() ?>" class="mr-3 chienProfil" alt="...">
                <div class="media-body">
                    
                </div>
            </div>
    </div>
    <div class="row-fluid alert alert-secondary">
        <!-- <span><strong>Nom : </strong> chocko</span>
        <h6><strong>Surnom : </strong> Pseudo</h6>
        <h6><strong>Sex : </strong>male</h6>
        <h6><strong>Race : </strong>kanishe</h6>
        <h6><strong>Date_de_Naissance : </strong>kanishe</h6> -->

        <?php

          
          echo '<span><strong>Nom : </strong> '.$chien->getNom().'</span>';
          echo '<h6><strong>Surnom : </strong> '.$chien->getSurnom().'</h6>';
          echo '<h6><strong>Sex : </strong>'.$chien->getSex().'</h6>';
          echo '<h6><strong>Race : </strong>'.$chien->getRace().'</h6>';
          echo '<h6><strong>Age : </strong>'.$chien->getAge().'</h6>';
        ?>

    </div>
      <div class="row">

        <!-- <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="card" style="width: 18rem;">
                <img src="images/dog1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Article 1</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="Article.html" class="btn btn-info">Go somewhere</a>
                </div>
            </div>  
        </div> -->
        <?php


          $chien_article = $obj->selectAllArticleChien($_GET["id"]);
          
          foreach($chien_article as $article){

             echo '<div class="col-sm-12 col-md-6 col-lg-3">
             <div class="card" style="width: 18rem;">
                 <img src="'.$article->getImage().'" class="card-img-top" alt="...">
                 <div class="card-body">
                   <p class="card-text">'.$article->getContenu().'</p>
                   <a href="Article.php?'.$_GET["chien_id"].'" class="btn btn-info">Go somewhere</a>
                 </div>
             </div>  
            </div>';

            
          }
        ?>

    </div>
   
      

    
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>