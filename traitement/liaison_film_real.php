<?php
    include ('../include/connectBDD.php');

    $id_realisateur=$_POST['id_realisateur'];
    $id_film=$_POST['id_film'];

    $req=$bdd->prepare("INSERT INTO Realiser (id_realisateur, id_film) VALUES (:id_realisateur, :id_film)");
    $req->execute(array(
      'id_realisateur'=> $id_realisateur,
      'id_film'=> $id_film
    ));
    echo "le  realisateur a bien éte lié";
    echo '<a href="../include/admin.php">retour</a>';

    // $sql-> closeCursor();
    //   header('location: admin.php');

?>
