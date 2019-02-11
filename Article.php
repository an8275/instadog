<?php
session_start();
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

  
    <div class="container ">
           <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card" style="width: 18rem;">
                            <img src="images/dog1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title alert-info">Article title 1</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="row">
                                  <div class="col-9">
                                      <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                          <i class="fa fa-comments"></i>
                                      </a>
                                  </div>
                                  <div class="col-3">
                                      <a class="btn btn-danger btn-sm">
                                           <i class="fa fa-heart" style="color:white"></i>
                                      </a>
                                  </div>
                                </div>
                                <div class="comment_box collapse" id="collapseExample1" style=" margin-top: 21px;
                                border-top: 1px solid rgb(224, 224, 224);padding-top:10px;">
                                    
                                        <div class="comment_list"  style="margin-top:10px;">
                                          <ul class="list-unstyled">
                                              <li class="media">
                                                <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                <div class="media-body">
                                                  <h6 style="font-size:16px;"><strong class="zheader">jose</strong></h6>
                                                  <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                
                                                </div>
                                              </li>
                                              <li class="media">
                                                <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h6 style="font-size:16px;"><strong class="zheader">Vincent Bersey</strong></h6>
                                                    <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                
                                                </div>
                                                </li>
                                                <li class="media">
                                                    <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                    <div class="media-body">
                                                        <h6 style="font-size:16px;"><strong class="zheader">Rondens</strong></h6>
                                                        <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                    
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="input-group input-group-sm">
                                                <input  type="text" class="form-control info" placeholder="send your comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                <span class="input-group-text btn btn-outline-info btn-sm" id="basic-addon2">share</span>
                                                </div>
                                        </div>
                                  </div>
                              </div>
                        </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card" style="width: 18rem;">
                            <img src="images/dog1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Article title 2</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="row">
                                  <div class="col-9">
                                      <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
                                          <i class="fa fa-comments"></i>
                                      </a>
                                  </div>
                                  <div class="col-3">
                                      <a class="btn btn-danger btn-sm">
                                           <i class="fa fa-heart" style="color:white"></i>
                                      </a>
                                  </div>
                                </div>
                                <div class="comment_box collapse" id="collapseExample2" style=" margin-top: 21px;
                                border-top: 1px solid rgb(224, 224, 224);padding-top:10px;">
                                    
                                      <div  style="margin-top:10px;">
                                          <ul class="list-unstyled">
                                              <li class="media">
                                                <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                <div class="media-body">
                                                  <h6 style="font-size:16px;"><strong class="zheader">jose</strong></h6>
                                                  <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                
                                                </div>
                                              </li>
                                              <li class="media">
                                                <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h6 style="font-size:16px;"><strong class="zheader">Vincent Bersey</strong></h6>
                                                    <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                
                                                </div>
                                                </li>
                                                <li class="media">
                                                    <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                    <div class="media-body">
                                                        <h6 style="font-size:16px;"><strong class="zheader">Rondens</strong></h6>
                                                        <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                    
                                                    </div>
                                                </li>
                                            </ul>
                                      </div>
                                      <div class="input-group input-group-sm">
                                          <input  type="text" class="form-control info" placeholder="send your comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                          <div class="input-group-append">
                                            <span class="input-group-text btn btn-outline-info btn-sm" id="basic-addon3">share</span>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                        </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card" style="width: 18rem;">
                            <img src="images/dog1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Article title 3</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="row">
                                  <div class="col-9">
                                      <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
                                          <i class="fa fa-comments"></i>
                                      </a>
                                  </div>
                                  <div class="col-3">
                                      <a class="btn btn-danger btn-sm">
                                           <i class="fa fa-heart" style="color:white"></i>
                                      </a>
                                  </div>
                                </div>
                                <div class="comment_box collapse" id="collapseExample3" style=" margin-top: 21px;
                                border-top: 1px solid rgb(224, 224, 224);padding-top:10px;">
                                    
                                      <div  style="margin-top:10px;">
                                          <ul class="list-unstyled">
                                              <li class="media">
                                                <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                <div class="media-body">
                                                  <h6 style="font-size:16px;"><strong class="zheader">jose</strong></h6>
                                                  <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                
                                                </div>
                                              </li>
                                              <li class="media">
                                                <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h6 style="font-size:16px;"><strong class="zheader">Vincent Bersey</strong></h6>
                                                    <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                
                                                </div>
                                                </li>
                                                <li class="media">
                                                    <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                    <div class="media-body">
                                                        <h6 style="font-size:16px;"><strong class="zheader">Rondens</strong></h6>
                                                        <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                    
                                                    </div>
                                                </li>
                                            </ul>
                                      </div>
                                      <div class="input-group input-group-sm">
                                          <input  type="text" class="form-control info" placeholder="send your comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                          <div class="input-group-append">
                                            <span class="input-group-text btn btn-outline-info btn-sm" id="basic-addon3">share</span>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                        </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="card" style="width: 18rem;">
                            <img src="images/dog1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Article title 4</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <div class="row">
                                  <div class="col-9">
                                      <a class="btn btn-info btn-sm" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
                                          <i class="fa fa-comments"></i>
                                      </a>
                                  </div>
                                  <div class="col-3">
                                      <a class="btn btn-danger btn-sm">
                                           <i class="fa fa-heart" style="color:white"></i>
                                      </a>
                                  </div>
                                </div>
                                <div class="comment_box collapse" id="collapseExample4" style=" margin-top: 21px;
                                border-top: 1px solid rgb(224, 224, 224);padding-top:10px;">
                                    
                                      <div  style="margin-top:10px;">
                                          <ul class="list-unstyled">
                                              <li class="media">
                                                <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                <div class="media-body">
                                                  <h6 style="font-size:16px;"><strong class="zheader">jose</strong></h6>
                                                  <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                
                                                </div>
                                              </li>
                                              <li class="media">
                                                <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                <div class="media-body">
                                                    <h6 style="font-size:16px;"><strong class="zheader">Vincent Bersey</strong></h6>
                                                    <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                
                                                </div>
                                                </li>
                                                <li class="media">
                                                    <img src="images/téléchargement.png" width="30px" class="mr-3" alt="...">
                                                    <div class="media-body">
                                                        <h6 style="font-size:16px;"><strong class="zheader">Rondens</strong></h6>
                                                        <p style="font-size:12px;">Lorem ipsum dolor sit, amet consectetur fuga eum ha molestias nam.</p>
                                                    
                                                    </div>
                                                </li>
                                            </ul>
                                      </div>
                                      <div class="input-group input-group-sm">
                                          <input  type="text" class="form-control info" placeholder="send your comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                          <div class="input-group-append">
                                            <span class="input-group-text btn btn-outline-info btn-sm" id="basic-addon4">share</span>
                                          </div>
                                        </div>
                                  </div>
                              </div>
                        </div>
                </div>
           </div>
    </div>

    
      
    <script>
    $(".btn-info").click(function(){
        var h = $(this).parents(".card-body").children(".comment_box").height();
        console.log(h);
    });
    $("#basic-addon2").click(function(event) {

        var text = $(this).parents(".input-group").children(".form-control").val();
        event.preventDefault();
        $(this).parents('.comment_box').children(".comment_list").children("ul").append('<li class="media"><img src="images/téléchargement.png" width="30px" class="mr-3" alt="..."><div class="media-body"><h6 style="font-size:16px;"><strong class="zheader">Guest</strong></h6><p style="font-size:12px;">'+text+'</p></div></li>');
        
        /* remove(); */
    });
    
    </script>
    
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>