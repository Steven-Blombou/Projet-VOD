<!--CATALOGUE FILMS-->

<?php
include ('connectBDD.php');

$film=$_GET['id'];
// Id Film
$requete_id_film = $bdd->prepare("SELECT id_film, titre, synopsis, note, duree, date_sortie, trailer FROM Film");
$requete_id_film ->execute();
while( $donnees = $requete_id_film->fetch() ) { // Boucle
// Image Film
$requete_image_film=$bdd->prepare("SELECT affiche_film FROM Image WHERE id_film=$donnees['id_film']");
$requete_image_film->execute();
$imgage_film=$requete_image_film->fetch();
 ?>

<div class="axeldroite">
            <a href="<?php echo "parasite.php?id=".$donnees['id_film']; ?>" class="versfilm">
            <div class="cardaxel">
                <img class="poster-img" src="<?php echo $image_film['image_film'];?>" alt="">
                <div class="titrefilm"><?php echo $donnees['titre'];?></div>
                <div class="infoaxel">
                    <div class="textaxel">
                       <p><?php echo $donnees['note'];?></p>
                       <p><?php echo $donnees['duree'];?></p>
                       <p>Thriller</p>
                    </div>
                </div>
            </div>
            </a>
            <a href="" class="versfilm">
            <div class="cardaxel">
                <img class="poster-img" src="./img/poster2.jpg" alt="">
                <div class="titrefilm">The Irishman</div>
                <div class="infoaxel">
                    <div class="textaxel">
                        <p>3.3/5</p>
                        <p>3h29</p>
                        <p>Thriller, Biopic</p>
                    </div>
                </div>
            </div>
              <?php
            } ;
            ?>
            </a>


        </div>


    </div>
