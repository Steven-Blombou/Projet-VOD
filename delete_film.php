<?php
include ('connectBDD.php');
$delete_film=$_POST['delete_film'];

$req=$bdd->prepare("DELETE FROM Film WHERE id_film=$delete_film");
$req->execute();
echo "Suppression effectuée ";
echo '<a href="admin.php">retour</a>';

 ?>
