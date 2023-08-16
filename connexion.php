<?php
try {

    $bb=new PDO("mysql:host=localhost;dbname=biblio" , "root","");

} catch (PDOException $ex) {
    echo " erreur " .$ex ;
} 
?>