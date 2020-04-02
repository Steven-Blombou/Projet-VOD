<!--Liste acteurs-->
<?php
function transpose($array) {
    array_unshift($array, null);
    return call_user_func_array('array_map', $array);
}
?>

<?php
include ('connectBDD.php');
$film=$_GET['id'];
// Id acteur
  $req=$bdd->prepare("SELECT id_acteur FROM Jouer WHERE id_film=$film");
  $req->execute();
  $id_acteur=$req->fetch();


 ?>

<div class="acteurs-titre">Acteurs</div>

<section class="liste-acteurs">
    <div class="acteur">
<?php
// Image acteur
  $requete_image_acteur=$bdd->prepare("SELECT image_acteur FROM Image WHERE id_film=$film");
  $requete_image_acteur->execute();
  while($donnees = $requete_image_acteur->fetch()) {
  //var_dump($image_acteur['image_acteur']);

 ?>
        <img class="img-acteur" src="<?php echo $donnees['image_acteur'];?>" alt="">
        <?php
        }
         ?>
        <?php
        // Nom acteur
          $requete_nom_acteur=$bdd->prepare("SELECT nom_acteur, prenom_acteur, id_acteur FROM Acteur NATURAL JOIN Jouer WHERE id_film=$film");
          $requete_nom_acteur->execute();
          while($donnees = $requete_nom_acteur->fetch()) {
         ?>
        <div><?php echo $donnees['nom_acteur']."&nbsp".$donnees['prenom_acteur'];?></div>
        <?php
        }
         ?>
    </div>







</section>
