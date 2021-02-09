<?php
 $user='root';
 $pwd='';
 $bd ='bmakendi';
 $host='localhost';
 
 try{
 $con='mysql:host='.$host.';dbname='.$bd;
 $dbh=new PDO($con, $user, $pwd);
 }  
 
 catch(Exception $e){
  die('Connexion impossible a la base de donnees impossible.');
 }
?>

