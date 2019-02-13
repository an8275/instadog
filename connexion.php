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
    
    <title>Inst@Dog: Connexion</title>
  </head>
  <body>
    
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
              <li class="nav-item active">
                <a class="nav-link" href="connexion.php">Se connecter</a>
              </li>
              
              <?php
                session_start();
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

    <div class="container alert-secondary">
        <div class="row pt-3">
            <div class="col-12 error_info">
                <h3 class="text-center">Se connecter</h3>
                
            </div>
        </div>
        <div class="row pl-3 pr-3">
            <div class="col-12 col-auto">
                
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="text" class="form-control email" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
        </div>
        <div class="row pl-3 pr-3">
            <div class="col-12 col-auto">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="fas fa-unlock"></i></span>
                    </div>
                    <input type="password" class="form-control mdp" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                </div>
            </div>
        </div>
        <div class="row pl-3 pr-3 col-auto">
            <div class="col-7">
                <button class="btn btn-outline-success login">se conneter</button>
            </div>
            <div class="col-3 ml-3">
                <a href="inscription.php" class="btn btn-outline-primary">s'inscrire</a>
            </div>
        </div>
        <div class="row pl-3 pr-3 mt-3 pb-5 col-auto">
            <div class="col-12">
                <button class="btn btn-outline-secondary guest" style="width:80%;">Visiter sans compte</button>
            </div>
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
                             window.location.assign("Accueil.php");
                         }else {
                             $(".error_info").append('<h6 class="text-center alert-danger">wrong passwrod or email </h6>');
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
    
    $(".login").click(function(){

            var email = $(".email").val();
            var mdp = $(".mdp").val();
            var vars = "email="+email+"&mdp="+mdp;
            ajax("POST","conf.php",vars);
    });

    $(".guest").click(function(){
    var vars = "guest=guest";
    ajax("POST","conf.php",vars);
    });





    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
</body>
</html>