<?php
session_start();
include ('include/actualisation_session.php'); // Actualisation session
include ('include/blocagepage_public.php'); // J interdis l acces a la page  si pas connecté
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';


// connexion à la base de données
include ('include/connectBDD.php');

 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Space</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="../pol/index2.css">


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

<?php include 'include/nav.php'; ?>

<div id="container">

<h2 class="axeltitreh2">Bonjour <?php echo  ( "&nbsp" . $_SESSION['username'] . "</a>");?>,</h2> <!-- J affiche ce message -->

 <form action="traitement/edit_member2.php" method="POST" >
   <br>
   <h2>Edition de mon profil :</h2>
    <br>
   <table>
     <tr>
       <td>
         <label><b>Pseudo : <b></label>
       </td>
       <td>
         <input type="text" name="new_pseudo" placeholer "Pseudo" value="<?php echo $pseudo_user['pseudo']; ?>" /> <!-- affiche la valeur de l ancien champs a modifier -->
       </td>
     </tr>
     <tr>
       <td>
         <label><b> Ancien Password : <b></label>
       </td>
       <td>
         <input type="password" name="old_password_user" placeholer "Password"/> <!-- Pas ici comme le passwword est hash -->
       </td>
     </tr>
     <tr>
       <td>
         <label><b> Nouveau Password : <b></label>
       </td>
       <td>
         <input type="password" name="new_password_user" placeholer "Password"/> <!-- Pas ici comme le passwword est hash -->
       </td>
     </tr>
     <tr>
       <td>
         <label><b>Confirmation - Password : <b></label>
       </td>
       <td>
         <input type="password" name="new_password2_user" placeholer "Confirmer mot de passe"/> <!-- Pas ici comme le passwword est hash -->
       </td>
     </tr>
     <tr>
       <td>
         <label><b>Mail : <b></label>
       </td>
       <td>
         <input type="mail" name="new_mail_username" placeholer "Mail" value="<?php echo $mail_username['mail']; ?>"/> <!-- affiche la valeur de l ancien champs a modifier -->
       </td>
     </tr>
   </table>

   <?php if(isset($message)) { // Si la variable message existe
     echo $message; // J affiche le message
   }
   ?>

    <br>
   <input class="ok"type="submit" id='submit' value='Mettre à jour mon profil !'> <br>

 </form>


</div>

<?php include 'include/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('#search_film').keyup(function(){
  $('#result-search').html('');

  var film = $(this).val();

  if(film != ""){
    $.ajax({
      type: 'GET',
      url: 'fonctions/recherche_film.php',
      data: 'film=' + encodeURIComponent(film),
      success: function(data){
        if(data != ""){
          $('#result-search').append(data);
        }else{
          document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: left; margin-top: 10px'>Aucun films</div>"
        }
      }
    });
  }
});
});
</script>
</body>
</html>

?>
