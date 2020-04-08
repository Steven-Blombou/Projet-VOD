<?php
    include ('connectBDD.php');

    $id_producteur=$_POST['id_producteur'];
    $id_film=$_POST['id_film'];

    $req=$bdd->prepare("INSERT INTO (id_producteur, id_film) VALUES (:id_producteur, :id_film)");
    $req->execute(array(
      'id_producteur'=> $id_producteur,
      'id_film'=> $id_film
    ));
    echo "le producteur a bien éte lié";
    echo '<a href="../include/admin.php">retour</a>';

    // $sql-> closeCursor();
    //   header('location: admin.php');

?>
