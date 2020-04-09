<?php
include ('../include/connectBDD.php');
$delete_film=$_POST['delete_film'];

$reqdel=$bdd->prepare("DELETE FROM Film WHERE id_film=$delete_film");
$reqdel->execute();
echo "Suppression effectuée ";
echo '<a href="../admin.php">retour</a>';

 ?>
