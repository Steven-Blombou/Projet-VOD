<?php
    include ('connectBDD.php');

    $id_Real=$_POST['id_real'];
    $id_Film=$_POST['id_film'];

    $req=$bdd->prepare("INSERT INTO Realiser SET id_realisateur=? , id_film=?");
    $req->execute([$id_Real,$id_Film]);

    echo "le  realisateur a bien éte lié";
    echo '<a href="../include/admin.php">retour</a>';

?>
