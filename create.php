<?php 
session_start();
require_once("connexion.php");
if (isset($_POST['submit'])) {
if (!empty($_POST['titre']) && !empty($_POST['dat_sortie']) ) {
   
    $titre=strip_tags($_POST['titre']);
    $dat_sortie=strip_tags($_POST['dat_sortie']);
    

    
    $sql = ' INSERT INTO livre (titre,dat_sortie) 
    VALUES (:titre,:dat_sortie)';
    $classe=$bb->prepare($sql);
    
$classe->bindValue(':titre',$titre,PDO::PARAM_STR);
$classe->bindValue(':dat_sortie',$dat_sortie,PDO::PARAM_STR_CHAR);

    $classe->execute();

    $_SESSION['message'] = ' Votre Livre a bien ete enregistré(e) ! ';
    header('Location:index.php');
}else{
    $_SESSION['erreur'] = " veuillez remplir tous les champs ! ";
}
}
/*require_once("connexion.php");
if (isset($_POST['submit'])) {

    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $commune=$_POST['commune'];

    if (!empty($prenom) AND !empty($nom) AND !empty($commune)) {
        
        if (strlen($prenom) < 3) {
            echo " la chaine doit depasser  3 character";
         }else{
            $_req=$db->prepare("INSERT INTO  personne  (prenom,nom,commune) values(?,?,?)");
          $_req->execute(array($prenom,$nom,$commune));
 
           if($_req){
            header("Location:index.php");
           }
         }
    }else{
        echo" veuillez remplir tous les champs ! ";
    }

}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
  
    <title>AJOUTER</title>
</head>
<body>
    <main class="container mt-5">
        <div class="col-md-12">
            <h1>L'AJOUT DES livres</h1>
            <?php 
                if($_SESSION){
                    ?> 
                    <div class="alert">
                     <p class="alert alert-danger">
                        <?php 
                        echo $_SESSION['erreur'];
                        $_SESSION['erreur'] = "";
                        ?>
                     </p>
                    </div>

                    <?php
                }

                ?>
            <div class="col-md-6">
                <form action="" method="POST">
                    <div class="form-group">
                  <label for="titre" >TITRE</label>
                  <input type="text" id="titre" name="titre" class="form-control" >
                    </div>
                    <div class="form-group">
                  <label for="dat_sortie" >DATE_SORTIE</label>
                  <input type="DATE" id="dat_sortie" name="dat_sortie" class="form-control" >
                    </div>
                    
                    <div class="form-group mt-3">
                     <button type="submit" name="submit"  class="btn btn-primary">AJOUTER</button>
                     <a href="index.php" class="btn btn-danger">RESET</a>
                     </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

