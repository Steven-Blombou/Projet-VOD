<?php
include ('connectBDD.php');
$film=$_GET['id'];


$req=$bdd->prepare("SELECT affiche_film FROM Image WHERE id_film=$film");
$req->execute();
$image_film=$req->fetch();

$requete_synopis=$bdd->prepare("SELECT synopsis, titre FROM Film WHERE id_film=$film");
$requete_synopis->execute();
$synopsis=$requete_synopis->fetch();

 ?>

<h2 class="page-film"><?php echo $synopsis['titre']; ?></h2>

    <!--SYNOPSIS-->



    <div class="img-resume">
        <img class="img-film" src="<?php echo $image_film['affiche_film'];?>"alt="">

        <div class="synop">
                <p class="synop-title">Synopsis</p>
                <?php echo $synopsis['synopsis']; ?>
        </div>
    </div>
