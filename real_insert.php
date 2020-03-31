<?php

  include ('connectBDD.php');

  $nom_real = !empty($_POST['nom_real']) ? $_POST['nom_real'] : NULL;
  $prenom_real = !empty($_POST['prenom_real']) ? $_POST['prenom_real'] : NULL;
  $born_real = !empty($_POST['born_real']) ? $_POST['born_real'] : NULL;


  $sql = $bdd->prepare ("INSERT INTO Realisateur (nom_real, prenom_real,born_real)
                        VALUES (:nom_real, :prenom_real,  :born_real)");

  $sql->execute(array(
      'nom_real' => $nom_real,
      'prenom_real' => $prenom_real,
      'born_real' => $born_real
      ));

  $sql-> closeCursor();
  header('location:admin.php');

?>