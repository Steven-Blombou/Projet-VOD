<!--INFO FILM-->
<?php
include ('connectBDD.php');
$film=$_GET['id'];
// Note
$requete_note=$bdd->prepare("SELECT note FROM Film WHERE id_film=$film");
$requete_note->execute();
$note=$requete_note->fetch();
// Duree
$requete_duree=$bdd->prepare("SELECT duree FROM Film WHERE id_film=$film");
$requete_duree->execute();
$duree=$requete_duree->fetch();
//date sortie
$requete_date_sortie=$bdd->prepare("SELECT date_sortie FROM Film WHERE id_film=$film");
$requete_date_sortie->execute();
$date_sortie=$requete_date_sortie->fetch();

///$bdd->closeCursor(); // fermer la connexion
 ?>

<div class="rond-titre">Résumé</div>

<h3 class="info-film"></h3>

<div class="ronds-info">

    <div class="ronds-bis">
        <div class="ronds-ronds">
            <?php echo $duree['duree'];?>
        </div>
        Durée
    </div>


    <div class="ronds-bis">
        <div class="ronds-ronds">
            <?php echo $note['note']; ?>
        </div>
        Note
    </div>


    <div class="ronds-bis">
        <div class="ronds-ronds">
            <?php echo $date_sortie['date_sortie']; ?>
        </div>
        Date de sortie
    </div>


</div>
