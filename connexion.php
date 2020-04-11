<?php
session_start(); // lancement session
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php'; // Changement de theme
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>

<?php
include 'include/nav.php'; ?>


  <!-- zone de connexion -->

    <div id="container">


        <form action="traitement/verif.php" method="POST">
          <br>
          <br>
            <h2>Connexion</h2>
            <br>
            <br>
            <div id="resultat">
                  <!-- Nous allons afficher un retour en jQuery au visiteur -->
            </div>
            <br>

            <?php
            if(isset($_GET['erreur'])){  //je verifie si il ya des erreurs
                $err = $_GET['erreur'];
                if($err==1 || $err==2 || $err==3)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>"; // si oui affichage du message d erreur en rouge
            }
            ?>

            <?php
            if(isset($_GET['message'])){  //je verifie si il ya des erreurs
                $mess = $_GET['message'];
                if($mess==1)
                    echo "<p style='color:green'>Votre compte a bien été créé</p>"; // si oui affichage du message d erreur en rouge
            }
            ?>

            <br>
            <br>

            <table>
              <td>
                <tr>
                  <!-- <label><b>Nom d'utilisateur</b></label> -->
                </tr>
                <tr>
                  <!-- <input class="login" type="text" placeholder="Nom d'utilisateur" name="username" required> <br> -->
                </tr>
              </td>
              <td>
                <tr>
                  <label><b>Nom  ou Email d'utilisateur</b></label>
                </tr>
                <tr>
                  <input class="login" type="text" placeholder="Nom ou Mail d'utilisateur" name="mail_username" required> <br>
                </tr>
              </td>
              <td>
                <tr>
                  <label><b>Entrer votre Mot de passe</b></label>
                </tr>
                <tr>
                  <input class="login"  type="password" placeholder="Mot de passe" name="password_user" required><br>
                </tr>
              </td>
            </table>

            <input class="login" type="checkbox" name="accord_cookie" value="1">
            <label>Veuillez se rappellez de moi a la prochaine connexion</b></label> <br>
            <br>

            <input class="ok"type="submit" id='submit' value='LOGIN'> <br>




        </form>
    </div>

<?php
// $sql-> closeCursor();
//   header('location:../index.php');

 ?>


<?php
include 'include/footer.php';
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

    $("#submit").click(function{

        $.post(
            'traitement/verif.php', // Un script PHP que l'on va créer juste après
            {
                mail_username : $("#mail_username").val(),  // Nous récupérons la valeur de nos inputs que l'on fait passer à connexion.php
                password_user : $("#password_user").val()
            },

            function(data){
              if(data == 'Success'){
                     // Le membre est connecté. Ajoutons lui un message dans la page HTML.

                     $("#resultat").html("<p>Vous avez été connecté avec succès !</p>");
                }
                else{
                     // Le membre n'a pas été connecté. (data vaut ici "failed")

                     $("#resultat").html("<p>Erreur lors de la connexion...</p>");
                }
            },

            'text' // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !
         );

    });

});

</script>
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
