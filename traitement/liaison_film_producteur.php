<?php
    include ('../include/connectBDD.php');

    $id_producteur=$_POST['id_producteur'];
    $id_film=$_POST['id_film'];

    $req=$bdd->prepare("INSERT INTO Produire (id_producteur, id_film) VALUES (:id_producteur, :id_film)");
    $req->execute(array(
      'id_producteur'=> $id_producteur,
      'id_film'=> $id_film
    ));
    echo " Le producteur a bien éte lié";
    echo '<a href="../admin.php">retour</a>';


    // $sql-> closeCursor();
    //   header('location: admin.php');
?>
