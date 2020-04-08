<?php

  include ('connectBDD.php');

  $affiche_film = !empty($_POST['affiche_film']) ? $_POST['affiche_film'] : NULL;
  $image_real = !empty($_POST['image_real']) ? $_POST['image_real'] : NULL;
  $image_product = !empty($_POST['image_product']) ? $_POST['image_product'] : NULL;
  $image_acteur = !empty($_POST['image_acteur']) ? $_POST['image_acteur'] : NULL;

  if(empty($affiche_film)){
          $bool=false;
          echo "Erreur lors de l'ajout de l image";
          retour();
      }else if(empty($image_real)){
          echo "Erreur lors de l'ajout de l image";
          retour();
        }else if(empty($image_product)){
            echo "Erreur lors de l'ajout de l image";
            retour();
        }else if(empty($image_acteur)){
            echo "Erreur lors de l'ajout de l image";
            retour();
      }else{


  $sql = $bdd->prepare ("INSERT INTO Image (affiche_film, image_real, image_product, image_acteur)
                        VALUES (:affiche_film, :image_real, :image_product, :image_real)");
  $req->execute(array(
    'affiche_film'=> $affiche_film,
    'image_real'=> $image_real,
    'image_product'=> $image_product,
    'image_acteur'=> $image_acteur
  ));
  echo "L' ajout d'images est effectuées";
  retour();
  }

  function retour(){
          echo '<a href="admin.php">retour</a>';
      }

      // $sql-> closeCursor();
      //   header('location: admin.php');
?>
