<?php

  include ('../include/connectBDD.php');

  $nom_acteur = !empty($_POST['nom_acteur']) ? $_POST['nom_acteur'] : NULL;
  $prenom_acteur = !empty($_POST['prenom_acteur']) ? $_POST['prenom_acteur'] : NULL;
  $born_acteur = !empty($_POST['born_acteur']) ? $_POST['born_acteur'] : NULL;
// var_dump($nom_acteur);
// var_dump($prenom_acteur);
// var_dump($born_acteur);

  if(empty($nom_acteur)){
        echo "Erreur lors de l'ajout de l'acteur ";
        retour();
    }else if(empty($prenom_acteur)){
        echo "Erreur lors de l'ajout de l'acteur ";
        retour();
    }else if(empty($born_acteur)){
        echo "Erreur lors de l'ajout de l'acteur ";
        retour();
    }else{


  $req = $bdd->prepare ("INSERT INTO Acteur (nom_acteur, prenom_acteur, born_acteur)
                        VALUES (:nom_acteur, :prenom_acteur, :born_acteur)");
  $req->execute(array(
    ':nom_acteur'=> $nom_acteur,
    ':prenom_acteur'=> $prenom_acteur,
    ':born_acteur'=> $born_acteur
  ));
  echo "L'ajout d'acteur est effectuées";
  retour();
    }

      function retour() {
          echo '<a href="../admin.php">retour</a>';
        }


      // $sql-> closeCursor();
      //   header('location: admin.php');
?>
