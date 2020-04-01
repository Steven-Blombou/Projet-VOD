<?php

  include ('connectBDD.php');

  $affiche_film = !empty($_POST['affiche_film']) ? $_POST['affiche_film'] : NULL;
  $image_real = !empty($_POST['nom_real']) ? $_POST['nom_real'] : NULL;
  $image_product = !empty($_POST['image_product']) ? $_POST['image_product'] : NULL;
  $image_acteur = !empty($_POST['image_acteur']) ? $_POST['image_acteur'] : NULL;


  $sql = $bdd->prepare ("INSERT INTO Image  SET (affiche_film, image_real, image_product, image_acteur)
                        VALUES (?, ?,  ?, ?)");
  $req->execute([$affiche_film, $image_real, $image_product, $image_acteur,]);
  echo "L' ajout d'images est effectuées";
  retour();
  }

  function retour(){
          echo '<a href="admin.php">retour</a>';
      }
?>
