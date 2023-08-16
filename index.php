<?php
session_start();
require_once("connexion.php");

$sql="SELECT * FROM livre ";

$data=$bb->prepare($sql);

$data->execute();

$livres=$data->fetchAll(PDO::FETCH_ASSOC);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>AFFICHER</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <section class="mt-5">
            
            <h1>LISTES DES LIVRES</h1>  
            <?php 
                if($_SESSION){
                    ?> 
                    <div class="alert">
                     <p class="alert alert-success">
                        <?php 
                        echo $_SESSION['message'];
                        $_SESSION['message'] = "";
                        ?>
                     </p>
                    </div>

                    <?php
                }

                ?>

            <a href="create.php" class="btn btn-primary">AJOUTER</a>
            <table class="table ">
      <thead>
        <th>ID</th>
        <th>TITRE</th>
        <th>DATE_SORTIE</th>
        <th>PASSWORD</th>
        <th>ACTION</th>
      </thead>
      <tbody>
        <?php foreach($livres as $livre ) { ?>
        <tr>
            <td><?php echo $livre['id'] ; ?></td>
            <td><?php echo $livre['titre'] ; ?></td>
            <td><?php echo $livre['dat_sortie'] ; ?></td>
            <td><?php echo $livre['password'] ; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $livre['id'] ; ?>" class="btn btn-success">MODIFIER</a>
                <a href="delete.php?id=<?php echo $livre ['id'] ; ?>" class="btn btn-danger">SUPPRIMMER</a>
            </td>
        </tr>
        <?php }?>
      </tbody>
            </table>
            </section>
        </div>
    </div>
    
</body>
</html>