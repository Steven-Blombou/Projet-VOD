<!--CATALOGUE FILMS-->


<div class="axeldroite">
  <?php
  include ('connectBDD.php');

  // Requete dde recherche des info du film  et de l affiche
  $requete_id_film = $bdd->prepare("SELECT titre, note, duree, id_film, affiche_film
                                    FROM Film NATURAL JOIN Image
                                    where id_film=id_affiche; ");
  $requete_id_film ->execute();


   while( $donnees = $requete_id_film->fetch() ) { // Boucle
   ?>
  <a href="<?php echo "parasite.php?id=".$donnees['id_film']; ?>" class="versfilm">
            <div class="cardaxel">
                <img class="poster-img" src="<?php echo $donnees['affiche_film'];?>" alt="">
                  <div class="titrefilm"><?php echo $donnees['titre'];?>
                    <div class="infoaxel">
                      <div class="textaxel">
                         <p><?php echo $donnees['note'];?></p>
                         <p><?php echo $donnees['duree'];?></p>
                         <p>Thriller</p>
                       </div>
                     </div>
                  </div>
  </a>
              </div>
              <?php
                 }
                     ?>

	   </div>
   </div>
