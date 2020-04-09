<?php
session_start();
include ('include/actualisation_session.php'); // Actualisation session
include ('include/blocagepage_public.php'); // J interdis l acces a la page  si pas connecté
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';
include ('include/connectBDD.php');


 ?>


 <?php
 // Affichage Info user
/// $id_user = $_SESSION['username'] && $_SESSION['typeuser']; // Je verifie la session et definit la varaiable id_user
 $user_pseudo=$_SESSION['username'];
 $sql_user = "SELECT pseudo_user, nom_user, prenom_user, mail_username, password_user FROM User WHERE pseudo_user='$user_pseudo'"; // Je recherche les info ds la table user
 $requete_user = $bdd->prepare($sql_user);
 $requete_user->execute();
 $recupinfo = $requete_user->fetch(); // Je recupere la bonne ligne
 $requete_user-> closeCursor(); // Je ferme la requete
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Space</title>

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

<h2 class="axeltitreh2">Profil de <?php echo  ( "&nbsp" . $_SESSION['username'] . "</a>");?>,</h2> <!-- J affiche ce message -->


<?php
// if (isset($typeuser['type'] === "admin")) {
  ?>

    <!-- <p style='color:red'>Vous êtes un  admin<br><a href="admin.php">ACCEDER AU PANNEAU ADMIN</a></p> -->

<?php
  // }
 ?>
 <br>

<h2>Information de Profil :</h2>
 <br>
 <br>
 <br>

    <table style="text-align: left;">
        <tr>
            <td>
              Pseudo :
            </td>
            <td>
              <?php
              echo $_SESSION['username'];
              ?>
            </td>
        </tr>
        <tr>
            <td>
              Nom :
            </td>
            <td>
              <?php
              echo  $recupinfo['nom_user'];
              ?>
            </td>
        </tr>
        <tr>
            <td>
              Prenom :
            </td>
            <td>
              <?php
              echo $recupinfo['prenom_user'];
              ?>
            </td>
        </tr>
        <tr>
            <td>
              Mail :
            </td>
            <td>
              <?php
              echo  $recupinfo['mail_username'];
              ?>
            </td>
        </tr>
        <tr>
            <!-- <td>
              Password :
            </td>
            <td>
              <?php
              // echo  $recupinfo['password_user'];
              ?>
            </td> -->
        </tr>
    </table>
<?php
if(isset($_SESSION['username']) AND $recupinfo['id_type'] == $_SESSION['typeuser']) {
?>

<?php
}
 ?>
<br />
<a href="edit_member_space.php">Editer mon profil</a>
<br>
<a href="admin.php">ACCEDER AU PANNEAU ADMIN</a>
<br>
<a href="include/sedeconnecter.php">Se déconnecter</a>

</div>

<?php
include 'include/footer.php';
?>

</body>
</html>
