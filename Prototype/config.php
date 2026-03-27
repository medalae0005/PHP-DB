<?php

// connexion a la base...
$host="localhost";
$db="gestion_produits";
$user="root";
$pass="";

try{
    $pdo=new PDO("mysql:host=$host;dbname=$db;charset=utf8",$user,$pass);
} catch(PDOException $e){
    echo "Erreur connexion";
}

?>