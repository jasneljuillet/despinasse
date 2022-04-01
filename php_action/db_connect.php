<?php
/*
$localhost = "desenipepnwa.ipagemysql.com";
$username ="vamark";
$password ="Orelus2022";
*/
$localhost = "127.0.0.1";
$username ="root";
$password ="";

$dbname ="stock";

// creation de la connection de base de donnees

 $connect = new mysqli($localhost,$username,$password,$dbname);
 
 //  verification de la connection

    if($connect->connect_error)
    {
        die("La connexion a échoué :".$connect->connect_error);
    }
    else
    {
       // echo "Connexion Réussie";
    }




?>