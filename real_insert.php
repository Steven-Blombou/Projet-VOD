<?php

  include ('connectBDD.php');

  $nom_real = !empty($_POST['nom_real']) ? $_POST['nom_real'] : NULL;
  $prenom_real = !empty($_POST['prenom_real']) ? $_POST['prenom_real'] : NULL;
  $born_real = !empty($_POST['born_real']) ? $_POST['born_real'] : NULL;

  if(empty($nom_real)) {
        echo "Erreur ";
        retour();
    }
    else if(empty($prenom_real)) {
        echo "Erreur ";
        retour();
    }
    else if(empty($born_real)) {
        echo "Erreur ";
        retour();
    }
    else {


  $req = $bdd->prepare ("INSERT INTO Realisateur (nom_real, prenom_real, born_real)
                        VALUES ( :nom_real, :prenom_real, :born_real)");
  $req->execute(array(
    'nom_real' => $nom_real,
    'prenom_real' => $prenom_real,
    'born_real' => $born_real
  ));

  echo "Le realisateur a bien été ajouté";
        retour();
    }


//$req-> closeCursor();
    function retour() {
            echo '<a href="admin.php">retour</a>';
        }


?>
