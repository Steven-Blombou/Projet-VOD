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
<!-- Ajut de Realisateur  -->

<div align="center" id="Real" class="tabcontent">
   <form class="form-contact" action="traitement/real_insert.php" method="post">
       <h2 class="contact">Ajout de realisateurs</h2>
       <br>
       <?php
       if(isset($_GET['erreur'])){  //je verifie si il ya des erreurs
           $err = $_GET['erreur'];
           if($err==1 || $err==2 || $err==3)
               echo "<p style='color:red'>Le réalisateur n'a pas été ajouté</p>"; // si oui affichage du message d erreur en rouge
       }
       ?>

       <?php
       if(isset($_GET['message'])){  //je verifie si il ya des erreurs
           $mess = $_GET['message'];
           if($mess==1)
               echo "<p style='color:green'>le réalisateur a bien été ajouté</p>"; // si oui affichage du message d erreur en rouge
       }
       ?>
       <br>

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
								<button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Envoyer</button>
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
