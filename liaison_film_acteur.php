<?php
    include ('connectBDD.php');

    $idAct=$_POST['id_acteur'];
    $idFilm=$_POST['id_film'];

    $req=$bdd->prepare("INSERT INTO Jouer SET id_acteur=? , id_film=?");
    $req->execute([$id_acteur,$id_Film]);

    echo " l'acteur a bien éte lié";
    echo '<a href="../include/admin.php">retour</a>';

?>
