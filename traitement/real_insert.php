<?php

  include ('../include/connectBDD.php');

  $nom_real = !empty($_POST['nom_real']) ? $_POST['nom_real'] : NULL;
  $prenom_real = !empty($_POST['prenom_real']) ? $_POST['prenom_real'] : NULL;
  $born_real = !empty($_POST['born_real']) ? $_POST['born_real'] : NULL;

  if(empty($nom_real)) {
        // echo "Erreur lors de l'ajout du realisateur";
        header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_real.php?erreur=1');
        // retour();
    }
    else if(empty($prenom_real)) {
        // echo "Erreur lors de l'ajout du realisateur";
        header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_real.php?erreur=2');
        // retour();
    }
    else if(empty($born_real)) {
        // echo "Erreur lors de l'ajout du realisateur";
        header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_real.php?erreur=3');
        // retour();
    }
    else {


  $req = $bdd->prepare ("INSERT INTO Realisateur (nom_real, prenom_real, born_real)
                        VALUES (:nom_real, :prenom_real, :born_real)");
  $req->execute(array(
      'nom_real'=> $nom_real,
      'prenom_real'=> $prenom_real,
      'born_real'=> $born_real
    ));
  // echo "Le realisateur a bien été ajouté";
  header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_real.php?message=1');
        // retour();
    }

    function retour() {
            echo '<a href="../admin.php">retour</a>';
        }

        // $sql-> closeCursor();
        //   header('location: admin.php');

?>
