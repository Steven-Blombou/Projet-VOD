 <!--REAL BA-->
 <?php
 include ('connectBDD.php');
 $film=$_GET['id'];
 // Id acteur
   $req=$bdd->prepare("SELECT id_realisateur FROM Realiser WHERE id_film=$film");
   $req->execute();
   $id_real=$req->fetch();
  ?>

  <?php
  // Image realisateur
    $requete_image_real=$bdd->prepare("SELECT image_real FROM Image WHERE id_film=$film");
    $requete_image_real->execute();
    $image_real=$requete_image_real->fetch();
   ?>

   <?php
   // Nom et bio realisateur
     $requete_nom_real=$bdd->prepare("SELECT nom_real, prenom_real, bio, id_realisateur FROM Realisateur NATURAL JOIN Realiser WHERE id_film=$film");
     $requete_nom_real->execute();
     $nom_real=$requete_nom_real->fetch();
    ?>

    <?php
    // trailer film
      $requete_trailer=$bdd->prepare("SELECT trailer FROM Film WHERE id_film=$film");
      $requete_trailer->execute();
      $trailer=$requete_trailer->fetch();
     ?>

 <div class="real-real">Réalisateur</div>

<div class="real-ba">




    <div class="real">

        <div class="img-real">
            <img src="<?php echo $image_real['image_real'];?>" alt="">
            <div><?php echo $nom_real['nom_real']."&nbsp".$nom_real['prenom_real'];?></div>
        </div>
        <div class="text-real">
          <p><?php echo $nom_real['bio'];?></p>

        </div>
    </div>

    <div class="ba-yt">
        <iframe width="400" height="250" src=<?php echo $trailer['trailer'];?> frameborder="0"
            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen></iframe>
    </div>

</div>
