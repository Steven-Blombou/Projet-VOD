<?php

  include ('connectBDD.php');

  $titre = !empty($_POST['titre']) ? $_POST['titre'] : NULL;
  $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;
  $note = !empty($_POST['note']) ? $_POST['note'] : NULL;
  $duree = !empty($_POST['duree']) ? $_POST['duree'] : NULL;
  $date_sortie = !empty($_POST['date_sortie']) ? $_POST['date_sortie'] : NULL;
  $trailer = !empty($_POST['trailer']) ? $_POST['trailer'] : NULL;

  if(empty($titre)){
          $bool=false;
          echo "Erreur lors de l'ajout du film";
          retour();
      }else if(empty($synopsis)){
          echo "Erreur lors de l'ajout du film";
          retour();
      }else if(empty($note)){
          echo "Erreur lors de l'ajout du film";
          retour();
      }else if(empty($duree)){
          echo "Erreur lors de l'ajout du film";
          retour();
      }else if(empty($date_sortie)){
          echo "Erreur lors de l'ajout du film";
          retour();
        }else if(empty($trailer)){
            echo "Erreur lors de l'ajout du film";
            retour();
      }else{

  $req = $bdd->prepare ("INSERT INTO Film (titre, synopsis, note, duree, date_sortie, trailer)
                        VALUES ( :titre, :synopsys, :note, :duree, :date_sortie, :trailer)");
    // ou $req=$bdd->prepare("INSERT INTO Film SET titre = ?, synopsis = ?, note= ?, duree = ?, datesortie = ?");

  $req->execute(array(
    'titre' => $titre,
    'synopsis' => $synopsis,
    'note' => $note,
    'duree' => $duree,
    'date_sortie' => $date_sortie,
    'trailer' => $trailer
    ));


  echo "L ajout de film est effectuer";
  retour();
}

//$req-> closeCursor();

function retour(){
      echo '<a href="admin.php">retour</a>';
  }

?>
