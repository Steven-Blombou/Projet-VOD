<?php

  include ('connectBDD.php');

  $nom_product = !empty($_POST['nom_product']) ? $_POST['nom_product'] : NULL;
  $prenom_product = !empty($_POST['prenom_product']) ? $_POST['prenom_product'] : NULL;
  $born_product = !empty($_POST['born_product']) ? $_POST['born_product'] : NULL;


  $sql = $bdd->prepare ("INSERT INTO Producteur (nom_product, prenom_product,born_product)
                        VALUES (:nom_product, :prenom_product,  :born_product)");

  $sql->execute(array(
      'nom_product' => $nom_product,
      'prenom_product' => $prenom_product,
      'born_product' => $born_product
      ));

  $sql-> closeCursor();
  header('location:admin.php');

?>
