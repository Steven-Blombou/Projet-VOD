<?php

  include ('../include/connectBDD.php');
  $affiche_film = !empty($_POST['affiche_film']) ? $_POST['affiche_film'] : NULL;
  $image_real = !empty($_POST['image_real']) ? $_POST['image_real'] : NULL;
  $image_product = !empty($_POST['image_product']) ? $_POST['image_product'] : NULL;
  $image_acteur = !empty($_POST['image_acteur']) ? $_POST['image_acteur'] : NULL;
  $id_film = !empty($_POST['id_film']) ? $_POST['id_film'] : NULL;


  $req = $bdd->prepare ("INSERT INTO Image (affiche_film, id_film, image_real, image_product, image_acteur)
                        VALUES (:affiche_film, :id_film, :image_real, :image_product, :image_real)");
  $req->execute(array(
    'affiche_film'=> $affiche_film,
    'id_film'=> $id_film,
    'image_real'=> $image_real,
    'image_product'=> $image_product,
    'image_acteur'=> $image_acteur
  ));
  // echo "L' ajout d'images est effectuées";
  header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_image.php?message=1');
  // retour();

  function retour(){
          echo '<a href="../admin.php">retour</a>';
      }

      // $sql-> closeCursor();
      //   header('location: admin.php');
?>
