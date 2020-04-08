<?php

  include ('connectBDD.php');

  $nom_product = !empty($_POST['nom_product']) ? $_POST['nom_product'] : NULL;
  $prenom_product = !empty($_POST['prenom_product']) ? $_POST['prenom_product'] : NULL;
  $born_product = !empty($_POST['born_product']) ? $_POST['born_product'] : NULL;

  if(empty($nom_product)){
        echo "Erreur ";
        retour();
    }else if(empty($prenom_product)){
        echo "Erreur ";
        retour();
    }else if(empty($born_product)){
        echo "Erreur ";
        retour();
    }else{


  $sql = $bdd->prepare ("INSERT INTO Producteur (nom_product, prenom_product,born_product)
                        VALUES (:nom_product, :prenom_product, :born_product)");
  $req->execute(array(
    'nom_product'=> $nom_product,
    'prenom_prooduct'=> $prenom_product,
    'born_product'=> $born_product
  ));
  echo "Le producteur a bien été ajouté";
        retour();
    }

    function retour(){
            echo '<a href="admin.php">retour</a>';
        }

        // $sql-> closeCursor();
        //   header('location: admin.php');

?>
