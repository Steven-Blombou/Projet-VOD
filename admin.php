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

<div align='center' class="container">
  <h2>Panneau d administration</h2>
  <br>
  <br>
  <div class="row">
    <table>
      <tr>
        <td>
          <a href="admin_user.php">Gestion Droit User</a>
        </td>
      </tr>
      <tr>
      <tr>
        <td>
          <a href="admin_ajout_film.php">Ajouter Film</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_ajout_image.php">Ajouter image</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_ajout_real.php">Ajouter real</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_ajout_product.php">Ajouter product</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_ajout_acteur.php">Ajout acteur</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_liaison_film_real.php">Liaison film/real</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_liaison_film_product.php">Liaison Film/product</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_liaison_film_acteur.php">Liaison Film/acteur</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="admin_delete_film.php">Supprimer Film</a>
        </td>
      </tr>
    </table>

  </div>
  <br>
  <br>

</div>



<?php
include 'include/footer.php';
?>

  </body>
 </html>
