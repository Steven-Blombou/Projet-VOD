 <!--AFFICHE-->

 <?php
 include ('connectBDD.php');
  ?>


 <div class="title-dada-affiche">
    <h2>A l'affiche</h2>
</div>

<div class="center slider">

<?php
// Requete dde recherche des affiche de film
$req = $bdd ->prepare("SELECT affiche_film, id_film FROM Image WHERE id_affiche <= 5 ORDER BY id_affiche;");
$req ->execute();
// Boucle pour afficher les resultats
while($donnees = $req->fetch()) {
//var_dump($donnee);

  ?>

    <a class="link-poster" href="parasite.php?id=<?php echo $donnees['id_film'];?>"><img src=<?php echo $donnees['affiche_film']; ?> alt=""></a>

<?php
}
 ?>

 </div>
