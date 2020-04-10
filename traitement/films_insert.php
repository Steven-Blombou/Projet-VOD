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
          // echo "Erreur lors de l'ajout du titre";
          header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_film.php?erreur=1');
          // retour();
      }
      if(empty($synopsis)){
          // echo "Erreur lors de l'ajout du synopsis";
          header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_film.php?erreur=2');
          // retour();
      }
      if(empty($note)){
          // echo "Erreur lors de l'ajout de la note";
          header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_film.php?erreur=3');
          // retour();
      }
      if(empty($duree)){
          // echo "Erreur lors de l'ajout de la duree";
          header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_film.php?erreur=4');
          // retour();
      }
      if(empty($date_sortie)){
          // echo "Erreur lors de l'ajout de la date de soortie";
          header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_film.php?erreur=5');
          // retour();
        }
        if(empty($trailer)){
            // echo "Erreur lors de l'ajout du trailer";
            header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_film.php?erreur=6');
            // retour();
      }else{

  // $req = $bdd->prepare ("INSERT INTO Film SET (titre, synopsis, note, duree, date_sortie, trailer)
  //                       VALUES (:titre, :synopsis, :note, :duree, :date_sortie, :trailer)");
    $req=$bdd->prepare("INSERT INTO Film (titre, synopsis, note, duree, date_sortie, trailer)
                        VALUES (:titre, :synopsis, :note, :duree ,:date_sortie, :trailer)");
    $req->execute(array(
      'titre'=> $titre,
      'sysnopsis'=> $synopsis,
      'note'=> $note,
      'duree'=> $duree,
      'date_sortie'=> $date_sortie,
      'trailer'=> $trailer
    ));


  // echo "L ajout de film est effectuer";
  header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_ajout_film.php?message=1');
  // retour();
}

function retour(){
      echo '<a href="../admin.php">retour</a>';
  }

  // $sql-> closeCursor();
  //   header('location: admin.php');
?>
