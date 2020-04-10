<?php
    include ('../include/connectBDD.php');

    $id_acteur=$_POST['id_acteur'];
    $id_film=$_POST['id_film'];

    $req=$bdd->prepare("INSERT INTO Jouer (id_acteur, id_film) VALUES (:id_acteur, :id_film)");
    $req->execute(array(
      'id_acteur'=> $id_acteur,
      'id_film'=> $id_film
    ));
    // echo " l'acteur a bien éte lié";
    header('Location: http://blombou.simplon-charleville.fr/allo_simplon/admin_liaison_film_acteur.php?message=1');
    // echo '<a href="../admin.php">retour</a>';


    // $sql-> closeCursor();
    //   header('location: admin.php');
?>
