<?php

  include ('../include/connectBDD.php');

  $nom_product = !empty($_POST['nom_product']) ? $_POST['nom_product'] : NULL;
  $prenom_product = !empty($_POST['prenom_product']) ? $_POST['prenom_product'] : NULL;
  $born_product = !empty($_POST['born_product']) ? $_POST['born_product'] : NULL;

  if(empty($nom_product)) {
        // echo "Erreur lors de l'ajout du realisateur";
        header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_product.php?erreur=1');
        // retour();
    }
    else if(empty($prenom_product)) {
        // echo "Erreur lors de l'ajout du realisateur";
        header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_product.php?erreur=2');
        // retour();
    }
    else if(empty($born_product)) {
        // echo "Erreur lors de l'ajout du realisateur";
        header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_product.php?erreur=3');
        retour();
    }
    else {


  $req = $bdd->prepare ("INSERT INTO Producteur (nom_product, prenom_product, born_product)
                        VALUES (:nom_product, :prenom_product, :born_product)");
  $req->execute(array(
      'nom_product'=> $nom_product,
      'prenom_product'=> $prenom_product,
      'born_product'=> $born_product
    ));
  // echo "Le producteur a bien été ajouté";
  header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_product.php?message=1');
        // retour();
    }

    function retour() {
            echo '<a href="../admin.php">retour</a>';
        }

        // $sql-> closeCursor();
        //   header('location: admin.php');

?>
