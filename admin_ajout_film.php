<?php
session_start();
include ('include/actualisation_session.php'); // Actualisation session
include ('include/blocagepage_public.php');
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';

// connexion à la base de données
include('include/connectBDD.php');

// Je recherche les derniers membres inscrit
	// $user = $bdd->prepare('SELECT * FROM User ORDER BY id_user DESC');

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

  <!-- Liste des films -->
   <div align="center" id="Films" class="tabcontent">
           <h2 class="contact">Liste des films deja present</h2>
  				 <?php
  				 $req = $bdd->prepare(" SELECT id_film, titre FROM Film");
  				 $req->execute();
  				 while ( $donnees = $req->fetch() ) {
  				 	 ?>
  				 	<option  value="<?= $donnees['id_film']; ?>"> Nom du film : <?= $donnees['titre']; ?> | id du film : <?= $donnees['id_film']; ?> </option>
  				 <?php
  				 }
  				 ?>
    </div>




<!-- Pour ajouter un film -->

<div align="center" id="Films" class="tabcontent">
  <br>
  <?php
  if(isset($_GET['erreur'])){  //je verifie si il ya des erreurs
      $err = $_GET['erreur'];
      if($err==1 || $err==2 || $err==3 || $err==4 || $err==5 || $err==6)
          echo "<p style='color:red'>Le film n'a pas été ajouté</p>"; // si oui affichage du message d erreur en rouge
  }
  ?>

  <?php
  if(isset($_GET['message'])){  //je verifie si il ya des erreurs
      $mess = $_GET['message'];
      if($mess==1)
          echo "<p style='color:green'>Le film a bien été ajouté</p>"; // si oui affichage du message d erreur en rouge
  }
  ?>
  <br>
    <form class="form-contact" action="traitement/films_insert.php" method="post">
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
                  <textarea id="synop" name="synopsis" placeholder="Synopsis du film"></textarea>
            </div>

            <div class="infos">
                <label class="contact" for="note">Note</label>
            </div>
              <input class="login" type="text" id="note" name="note" placeholder="Note">

            <div class="infos">
                <label class="contact" class="labels" for="duree">Durée du film </label>
            </div>
              <input class="login" type="time" id="date" name="duree" placeholder="Duree du film">

            <div class="infos">
                <label class="contact" class="labels" for="date">Date de sortie</label>
            </div>
              <input class="login" type="date" id="note" name="date_sortie" placeholder="Date de sortie">

            <div class="infos">
                <label class="contact" class="labels" for="trailer">Trailer</label>
            </div>
              <input class="login" type="text" id="trailer" name="trailer" placeholder="Iframe YouTube">
        </div>
            <div class="button">
							<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Envoyer</button>
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
