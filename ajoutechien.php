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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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

  
    <div class="container jumbotron pt-2">
        <div class="row">
            <div class="col-12"><h3 class="text-center">Ajoute un nouvel chien</h3></div>
        </div>
        <div class="row pl-3 pr-3">
            <form>
                <div class="form-group col-12 mx-auto mt-3">
                    <label for="formGroupExampleInput">Nom</label>
                    <input type="text" class="form-control nom_de_chien" id="formGroupExampleInput" placeholder="Nom du chien">
                </div>
                <div class="form-group col-12 mx-auto">
                    <label for="formGroupExampleInput2">Surnom</label>
                    <input type="text" class="form-control surnom_de_chien" id="formGroupExampleInput2" placeholder="Surnom du chien">
                </div>

                <div class="form-group col-12 mx-auto">
                    <label for="formGroupExampleInput2">Sex</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input male" type="radio" checked name="inlineRadioOptions" id="inlineRadio1" value="male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input female" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>      
                </div>
                <div class="form-group col-12 mx-auto">
                    <label for="formGroupExampleInput4">Date de naissance</label>
                    <div class="form-check form-check-inline">
                        <input class="form-control mr-2 date_de_naissance" type="date" name="inlineRadio2" placeholder=" / /">
                        <i class="far fa-calendar-alt" style="font-size:35px;" for="inlineRadio2"></i>   
                    </div> 
                </div>
                <div class="form-group col-12 mx-auto">
                    <label for="formGroupExampleInput2">Race</label>
                    <input type="text" class="form-control race_de_chien" id="formGroupExampleInput2" placeholder="Race du chien">
                </div>
                <div class="input-group col-12">
                   
                    <div class="custom-file">
                        <input type="file" class="custom-file-input btn-sm image_de_chien" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                        <label class="custom-file-label" for="inputGroupFile04">Charger un photo</label>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <input class="btn btn-primary col-5 btn-md mr-3 submit" type="button" value="Enregistrer">
                    <input class="btn btn-secondary col-6 btn-md" type="button" value="Annuler">
                    
                </div> 
            </form>
        </div>
      
    </div>
   
      

    <script>
   

    $(".submit").click(function(){
        nom_de_chien = $(".nom_de_chien").val();
        surnom_de_chien = $(".surnom_de_chien").val();

        male   = $(".male")[0].checked;
        female = $(".female")[0].checked;

        sex = ($(".male")[0].checked)? "male" : "female";

        date_de_naissance = $(".date_de_naissance").val();
        now  = new Date();

        date_de_naissance = date_de_naissance.split("-");

        
        age = now.getFullYear() - date_de_naissance[0];

        race = $(".race_de_chien").val();

        image_de_chien = document.querySelector(".image_de_chien");

       

      
        ext = image_de_chien.files[0].type.split("/")[1];
        if(ext =="jpg" || ext == "jpeg" || ext == "png"){
         
          var ajax = new XMLHttpRequest();
          var formdata = new FormData();
          formdata.append("image_de_chien",image_de_chien.files[0]);
          formdata.append("nom_de_chien",nom_de_chien);
          formdata.append("surnom_de_chien",surnom_de_chien);
          formdata.append("sex",sex);
          formdata.append("age",age);
          formdata.append("race_de_chien",race);

        ajax.onreadystatechange = function(){
						
            if(ajax.readyState == 4 && ajax.status==200){
            
                if(ajax.responseText == "sucess"){

                    $(".jumbotron").children(".row").children(".col-12").append("<h5 class='text-success text-center'>chien a bien ajouté</h5>");   
                
                    setTimeout(() => {
                        $(".jumbotron").children(".row").children(".col-12").children("h5").remove();
                    }, 3000);
                }
                
            
            }
						
		}
         
          ajax.open("POST",'conf.php');
          ajax.send(formdata);




        }else
        console.log("not a bon format");

      
    });

    
    
    </script>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>