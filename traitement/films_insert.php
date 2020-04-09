<?php

  include ('../include/connectBDD.php');

  $titre = $_POST['titre'];
  $synopsis = $_POST['synopsis'];
  $note = $_POST['note'];
  $duree = $_POST['duree'];
  $date_sortie = $_POST['date_sortie'];
  $trailer = $_POST['trailer'];

  if(empty($titre)){
          $bool=false;
          echo "Erreur lors de l'ajout du titre";
          retour();
      }
      if(empty($synopsis)){
          echo "Erreur lors de l'ajout du synopsis";
          retour();
      }
      if(empty($note)){
          echo "Erreur lors de l'ajout de la note";
          retour();
      }
      if(empty($duree)){
          echo "Erreur lors de l'ajout de la duree";
          retour();
      }
      if(empty($date_sortie)){
          echo "Erreur lors de l'ajout de la date de soortie";
          retour();
        }
        if(empty($trailer)){
            echo "Erreur lors de l'ajout du trailer";
            retour();
      }else{

  // $req = $bdd->prepare ("INSERT INTO Film SET (titre, synopsis, note, duree, date_sortie, trailer)
  //                       VALUES (:titre, :synopsis, :note, :duree, :date_sortie, :trailer)");
    $req=$bdd->prepare("INSERT INTO Film SET titre = ?");
    $req->execute([$titre]);

  echo "L ajout de film est effectuer";
  retour();
}

function retour(){
      echo '<a href="../admin.php">retour</a>';
  }

  // $sql-> closeCursor();
  //   header('location: admin.php');
?>
