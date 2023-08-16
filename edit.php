<?php
session_start();
require_once("connexion.php");
  
  if(isset($_GET["id"]))
  {
    $id=$_GET["id"];
    $_req=$bb->query("SELECT * FROM livre WHERE id=$id");
    $mod=$_req->fetch();
    
  }

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>MODIFIER</title>
</head>
<body>

    <div class="container mt-5">
      <div class="col-md-12">
        <h2>MODIFIER UN EMPLOYE :  </h2>
        <p class="erreur_message" style="color: red;" >
        </p>
        <div class="col-md-6">
        <form action="" method="POST">
       
        
          <div class="form-group">
        <label for="titre">TITRE</label>
         <input type="text" name="titre" value="<?php echo $mod['titre']; ?>" class="form-control" ><br>
         </div>
         <div class="form-group">
         <label for="dat_sortie">DATE_SORTIE</label>
        <input type="DATE" name="dat_sortie" value="<?php echo $mod['dat_sortie'] ; ?>" class="form-control" ><br>
        </div>
        <div class="form-group mt-3">
        <input type="submit" value="Modifier" name="Modifier" class="btn btn-primary">
        <a href="index.php" class="btn btn-danger">BACK</a>

        </div>
        </form>
        </div>
        </div>
    </div>
    
</body>
</html>
<?php 
if(isset($_POST['Modifier']))
{
   $titre=$_POST['titre'];
   $dat_sortie=$_POST['dat_sortie'];
   
 $_req=$bb->prepare("UPDATE livre SET  titre= ?, dat_sortie= ? WHERE id=$id");
  $_req->execute(array( $titre, $dat_sortie)) ;
  if($_req)
  {
   header("location:index.php");
   $_SESSION['message']=" modifier avec success";
  }
}
?>
