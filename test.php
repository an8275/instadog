<?php
/* include("Connexion.php");
$obj = new Connexion();
$con = $obj->getConnexion(); 

echo "<pre>";

echo "ok";
echo date("Y-m-d H:i:s");

echo $obj->insertArticle("test.png","the best dog i ever had",date("Y-m-d H:i:s"),3);

echo "</pre>"; 

    
    */   
    
    
    
// The message

$headers  = "Organization: www.realise.ch\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
if(mail("zabiullah.ahmadi.241994@gmail.com", "Message", "A simple message.", $headers)){
    echo "send";
}else {
    echo "failed";
}
    
?>



