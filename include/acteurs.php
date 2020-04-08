<!--Liste acteurs-->

<?php
include ('connectBDD.php');
$film=$_GET['id'];
// Id acteur
  // $req=$bdd->prepare("SELECT id_acteur FROM Jouer WHERE id_film=$film");
  // $req->execute();
  // $id_acteur=$req->fetch();
 ?>

<div class="acteurs-titre">Acteurs</div>

<section class="liste-acteurs">

  <?php
  // Image acteur
    $requete_image_acteur=$bdd->prepare("SELECT image_acteur FROM Image WHERE id_film=$film");
    $requete_image_acteur->execute();
    $requete_nom_acteur=$bdd->prepare("SELECT nom_acteur, prenom_acteur, id_acteur FROM Acteur NATURAL JOIN Jouer WHERE id_film=$film");
    $requete_nom_acteur->execute();
    while($donnees = $requete_image_acteur->fetch() AND ($donnees1 = $requete_nom_acteur->fetch())) {
    //var_dump($image_acteur['image_acteur']);

   ?>

 <div class="acteur">

        <img class="img-acteur" src="<?php echo $donnees['image_acteur'];?>" alt="">


        <div><?php echo $donnees1['nom_acteur']."&nbsp".$donnees1['prenom_acteur'];?></div>

  </div>

  <?php
  }
  ///$bdd->closeCursor(); // fermer la connexion
   ?>


</section>
