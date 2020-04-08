<?php
    include ('connectBDD.php');

    $id_acteur=$_POST['id_acteur'];
    $id_film=$_POST['id_film'];

    $req=$bdd->prepare("INSERT INTO Jouer (id_acteur, id_film) VALUES (:id_acteur, :id_film)");
    $req->execute(array(
      'id_acteur'=> $id_acteur,
      'id_film'=> $id_film
    ));
    echo " l'acteur a bien éte lié";
    echo '<a href="../include/admin.php">retour</a>';


    // $sql-> closeCursor();
    //   header('location: admin.php');
?>
