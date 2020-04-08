<?php

  include ('connectBDD.php');

  $nom_acteur = !empty($_POST['nom_acteur']) ? $_POST['nom_acteur'] : NULL;
  $prenom_acteur = !empty($_POST['prenom_acteur']) ? $_POST['prenom_acteur'] : NULL;
  $born_acteur = !empty($_POST['born_acteur']) ? $_POST['born_acteur'] : NULL;

  if(empty($nom_acteur)){
        echo "Erreur ";
        retour();
    }else if(empty($prenom_acteur)){
        echo "Erreur ";
        retour();
    }else if(empty($born_acteur)){
        echo "Erreur ";
        retour();
    }else{


  $sql = $bdd->prepare ("INSERT INTO Acteur (nom_acteur, prenom_acteur, born_acteur)
                        VALUES (:nom_acteur, :prenom_acteur, :born_acteur)");
  $req->execute(array(
    'nom_acteur'=> $nom_acteur,
    'prenom_acteur'=> $prenom_acteur,
    'born_acteur'=> $born_acteur
  ));
  echo "L'acteur a bien été ajouté";
        retour();
    }


    function retour(){
            echo '<a href="admin.php">retour</a>';
        }
        // $sql-> closeCursor();
        //   header('location: admin.php');

?>
