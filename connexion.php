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




</head>

<body>

<?php
include 'include/nav.php'; ?>


  <!-- zone de connexion -->

    <div id="container">


        <form action="verif.php" method="POST">
          <br>
          <br>
            <h2>Connexion</h2>
            <br>
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


            <?php
            if(isset($_GET['erreur'])){  //je verifie si il ya des erreurs
                $err = $_GET['erreur'];
                if($err==1 || $err==2 || $err==3)
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>"; // si oui affichage du message d erreur en rouge
            }
            ?>

        </form>
    </div>

            <?php
            if(isset($_GET['message'])){  //je verifie si il ya des erreurs
                $mess = $_GET['message'];
                if($mess==1)
                    echo "<p style='color:red'>Votre compte a bien était créé</p>"; // si oui affichage du message d erreur en rouge
            }
            ?>

        </form>
    </div>
<?php
// $sql-> closeCursor();
//   header('location:../index.php');

 ?>


<?php
include 'include/footer.php';
?>

</body>
</html>
