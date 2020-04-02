<?php
    include ('connectBDD.php');

    $idProd=$_POST['id_prod'];
    $idFilm=$_POST['id_film'];

    $req=$bdd->prepare("INSERT INTO SET id_product=? , id_film=?");
    $req->execute([$id_product,$id_Film]);

    echo "le producteur a bien éte lié";
    echo '<a href="../include/admin.php">retour</a>';

?>
