<?php
session_start();
// connexion a la base de donnees 
require_once("connexion.php");
//recuperation de id
$id=$_GET['id'];
//requete de suppression 
$sql=$bb->prepare("DELETE FROM livre WHERE id=$id");
$sql->execute();
//redirection 
header("Location:index.php");
$_SESSION['message']="Une Livre a bien été Supprimer Dans BASE";

?>