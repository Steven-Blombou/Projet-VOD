<?php
session_start();
include ('include/actualisation_session.php'); // Actualisation session
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';

 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>


    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" media="screen, projection" type="text/css" id="css" href="<?php echo $url; ?>" />


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

<main class="container">
  <div id="container">
  <form id="mail_contact-form" action="traitement/mail_traitement.php" method="post">
      <br>
        <h2>Contactez-nous</h2>
        <br>
        <aside class="alert d-none">
          </aside>
        <br>
        <table>
          <td>
            <tr>
              <label class="contact" for="name"><b>Nom d'utilisateur</b></label>
            </tr>
            <tr>
              <input type="text" class="login" id="nom_user" placeholder="Nom d'utilisateur" name="nom_user" required> <br>
            </tr>
          </td>
          <td>
            <tr>
              <label class="contact" for="name"><b>Prenom d'utilisateur</b></label>
            </tr>
            <tr>
              <input type="text" class="login" id="prenom_user"  placeholder="Prenom d'utilisateur" name="prenom_user" required> <br>
            </tr>
          </td>
          <td>
            <tr>
              <label class="contact" for="mail"><b>Entrer votre Mail</b></label>
            </tr>
            <tr>
              <input type="email" class="login" id="mail_username" placeholder="E-Mail" name="mail_username" required><br>
            </tr>
          </td>
          <td>
            <tr>
              <label class="contact" for="subject">Sujet</label>
            </tr>
            <tr>
              <input type="text" class="login" id="subject" placeholder="Sujet" name="subject" required><br>
            </tr>
          </td>
          <td>
            <tr>
              <label class="contact" for="message">Message </label>
            </tr>
            <tr>
              <textarea name="user_message" id="user_message" placeholder="Tapez votre message ici">
              </textarea>
            </tr>
          </td>
        </table>
        <input class="ok"type="submit" id='submit' value='Envoyer'> <br>
    </form>
</div>
</main>




<?php
include 'include/footer.php';
 ?>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="js/mail.js"></script>
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
