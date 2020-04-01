<?php
session_start();
include ('include/actualisation_session.php'); // Actualisation session
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';

// connexion à la base de données
include('include/connectBDD.php');

// Je recherche les derniers membres inscrit
	$user = $bdd->prepare('SELECT * FROM User ORDER BY id_user DESC');

 ?>



 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Center</title>

     <link rel="stylesheet" href="css/reset.css">

     <link rel="stylesheet" media="screen, projection" type="text/css" id="css" href="<?php echo $url; ?>" />

     <!--GOOGLE FONTS-->

     <link
         href="https://fonts.googleapis.com/css?family=Baloo+Tammudu+2:400,500,600,700,800|Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap"
         rel="stylesheet">
     <link
         href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
         rel="stylesheet">
     <link
         href="https://fonts.googleapis.com/css?family=Asap:400,400i,500,500i,600,600i,700,700i|Bellota+Text:300,300i,400,400i,700,700i&display=swap"
         rel="stylesheet">
     <link href="https://fonts.googleapis.com/css?family=Orbitron:700,800,900|Quicksand:300,400,500,600,700&display=swap"
         rel="stylesheet">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




 </head>

 <body>

<?php
 include 'include/nav.php';
?>

  <div id="container">
    <ul>
<?php
  while($membre = $user->fetch()) { // J affiche tous les membres
?>
  <li><?= $membre['id_user'] ?> : <?= $membre['pseudo_user'] ?></li>
<?php
  }
?>
  </ul>

</div>

<!-- Pour ajouter un film -->

<div align="center" id="Films" class="tabcontent">
    <form class="form-contact" action="films_insert.php" method="post">
        <h2 class="contact">Ajout de films</h2>

        <div class="info_form">
            <div class="infos">
                <label class="contact" for="Title">Titre film</label>
            </div>
              <input class="login" type="text" id="titre" name="titre" placeholder="Titre film">

            <div class="message_form">
                <div class="infos">
                    <label class="contact" for="synop">Synopsis </label>
                </div>
                  <textarea id="synop" name="synop" placeholder="Synopsis du film"></textarea>
            </div>

            <div class="infos">
                <label class="contact" for="note">Note</label>
            </div>
              <input class="login" type="text" id="note" name="note" placeholder="Note">

            <div class="infos">
                <label class="contact" class="labels" for="duree">Durée du film </label>
            </div>
              <input class="login" type="text" id="date" name="duree" placeholder="Duree du film">

            <div class="infos">
                <label class="contact" class="labels" for="date">Date de sortie</label>
            </div>
              <input class="login" type="text" id="note" name="date" placeholder="Date de sortie">

            <div class="infos">
                <label class="contact" class="labels" for="trailer">Trailer</label>
            </div>
              <input class="login" type="text" id="trailer" name="trailer" placeholder="Iframe YouTube">
        </div>
            <div class="button">
               <button class="button_form" type="submit">Envoyer</button>
           </div>
   </form>
 </div>

<!-- Ajout des images -->

<div align="center" id="Affiche" class="tabcontent">
    <form class="form-contact" action="affiche_insert.php" method="post">
        <h2 class="contact">Ajout des photo</h2>

        <div class="info_form">
            <div class="infos">
                <label class="contact" class="labels" for="affiche">Affiche </label>
            </div>
              <input class="login" type="text" id="affiche" name="affiche" placeholder="Affiche">

              <div class="infos">
                  <label class="contact" for="image">Image Real</label>
              </div>
               <input class="login" type="text" id="image_real" name="image_real" placeholder="Images_real">

               <div class="infos">
                   <label class="contact" for="image">Image Product</label>
               </div>
                <input class="login" type="text" id="image_product" name="image_product" placeholder="Images_product">

                <div class="infos">
                    <label class="contact" for="image">Image Acteur</label>
                </div>
                 <input class="login" type="text" id="image_acteur" name="image_acteur" placeholder="Images_real">


        </div>
            <div class="button">
               <button class="button_form" type="submit">Envoyer</button>
           </div>
   </form>
 </div>



<!-- Ajout de Producteur -->

<div align="center" id="Producteurs" class="tabcontent">
    <form class="form-contact" action="product_insert.php" method="post">
        <h2 class="contact">Ajout de producteur</h2>

        <div class="info_form">
            <div class="infos">
                <label class="contact" for="Name">Nom</label>
            </div>
              <input class="login" type="text" id="nom_prod" name="nom_prod" placeholder="Nom">

            <div class="infos">
                <label class="contact" for="Prenom">Prénom</label>
            </div>
              <input class="login" type="text" id="prenom_prod" name="prenom_prod" placeholder="Prénom">

              <div class="infos">
                  <label class="contact" for="Date">Date</label>
              </div>
               <input class="login" type="text" id="born_real" name="born_real" placeholder="Date">

        </div>
            <div class="button">
                <button class="button_form" type="submit">Envoyer</button>
            </div>
    </form>
</div>

<!-- Ajut de Realisateur  -->

<div align="center" id="Real" class="tabcontent">
   <form class="form-contact" action="real_insert.php" method="post">
       <h2 class="contact">Ajout de realisateurs</h2>

       <div class="info_form">
           <div class="infos">
               <label class="contact" for="Name">Nom</label>
           </div>
            <input class="login" type="text" id="nom_real" name="nom_real" placeholder="Nom">

           <div class="infos">
               <label class="contact" for="Prenom">Prénom</label>
           </div>
            <input class="login" type="text" id="prenom_real" name="prenom_real" placeholder="Prénom">

            <div class="infos">
                <label class="contact" for="Date">Date</label>
            </div>
             <input class="login" type="text" id="born_real" name="born_real" placeholder="Date">

              <div class="button">
                <button class="button_form" type="submit">Envoyer</button>
              </div>
           </div>
   </form>
</div>

<!-- Ajout d'acteur -->

<div align="center" id="Acteur" class="tabcontent">
   <form class="form-contact" action="acteur_insert.php" method="post">
       <h2 class="contact">Ajout d'acteur</h2>

       <div class="info_form">
           <div class="infos">
               <label class="contact" for="Name">Nom</label>
           </div>
            <input class="login" type="text" id="nom_acteur" name="nom_acteur" placeholder="Nom">

           <div class="infos">
               <label class="contact" for="Prenom">Prénom</label>
           </div>
            <input class="login" type="text" id="prenom_acteur" name="prenom_acteur" placeholder="Prénom">

            <div class="infos">
                <label class="contact" for="Date">Date</label>
            </div>
             <input class="login" type="text" id="born_acteur" name="born_acteur" placeholder="Date">

              <div class="button">
                <button class="button_form" type="submit">Envoyer</button>
              </div>
           </div>
   </form>
</div>

<div class="vide">

</div>

<?php
include 'include/footer.php';
?>

  </body>
 </html>
