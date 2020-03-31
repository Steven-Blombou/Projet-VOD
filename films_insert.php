<?php

  include ('connectBDD.php');

  $titre = !empty($_POST['titre']) ? $_POST['titre'] : NULL;
  $synopsis = !empty($_POST['synopsis']) ? $_POST['synopsis'] : NULL;
  $note = !empty($_POST['note']) ? $_POST['note'] : NULL;
  $duree = !empty($_POST['duree']) ? $_POST['duree'] : NULL;
  $date_sortie = !empty($_POST['date_sortie']) ? $_POST['date_sortie'] : NULL;
  $trailer = !empty($_POST['trailer']) ? $_POST['trailer'] : NULL;



  $sql = $bdd->prepare ("INSERT INTO Film (titre, Synopsis, note, duree, date_sortie, trailer)
                        VALUES ( :titre, :synopsis, :note, :duree, :date_sortie, :trailer)");

  $sql->execute(array(
      'titre' => $titre,
      'synopsis' => $synopsis,
      'note' => $note,
      'duree' => $duree,
      'date_sortie' => $date_sortie,
      'trailer' => $trailer
  ));

  $sql-> closeCursor();
  header('location:admin.php');
  
?>
