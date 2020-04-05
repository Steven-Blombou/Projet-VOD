<?php
session_start();
include ('include/actualisation_session.php'); // Actualisation session
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';
include('include/connectBDD.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>

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
<?php
  if(isset($_GET['erreur'])){  //je verifie si il ya des erreurs
                $err = $_GET['erreur'];
                if($err==1)
                    $erreur_register="Votre Mot de Passe n'est pas valide";
				elseif ($err==2)
					         $erreur_register="Pseudo déjà utilisée !";
				elseif ($err==3)
					         $erreur_register="Adresse Mail déjà utilisée !";
				elseif ($err==4)
					         $erreur_register="Votre adresse mail n'est pas valide !";
				elseif ($err==5)
					         $erreur_register="Vos adresses mail ne sont pas identiques !";
				elseif ($err==6)
					         $erreur_register="Votre pseudo ne doit pas dépasser 100 caractères !";
				elseif ($err==7)
					         $erreur_register="Tous les champs doivent être complétés !";
				elseif ($err==8)
					         $erreur_register="Tous les champs doivent être complétés !";
		   }
?>
  <!-- zone de connexion -->

    <div  id="container">
        <form action="register_verif.php" method="POST">
          <br>
          <br>
            <h2>Inscription</h2>
            <br>
            <?php
           if(isset($erreur_register)) { // Je verifie si il y a une valeur ds ma variable erreur
              echo '<font color="red">'.$erreur_register."</font>"; // Si oui j affiche le message d erreur en rouge
           }
           ?>
            <br>
            <br>
            <br>

            <table>
              <tr>
                <td>
                  <label><b>Pseudo d'utilisateur</b></label>
                </td>
                <td>
                  <input class="login" type="text" placeholder="Pseudo d'utilisateur" name="pseudo_user" value="<?php if(isset($pseudo_user)) { echo $pseudo_user; } ?>" require> <br> <!--Garde la valeur du champs si erreur-->
                </td>
              </tr>
              <tr>
                <td>
                  <label><b>Nom d'utilisateur</b></label>
                </td>
                <td>
                  <input class="login" type="text" placeholder="Nom d'utilisateur" name="nom_user" value="<?php if(isset($nom_user)) { echo $nom_user; } ?>" require>  <br> <!--Garde la valeur du champs si erreur-->
                </td>
              </tr>
              <tr>
                <td>
                  <label><b>Prenom d'utilisateur</b></label>
                </td>
                <td>
                  <input class="login" type="text" placeholder="Prenom d'utilisateur" name="prenom_user" value="<?php if(isset($prenom_user)) { echo $prenom_user; } ?>" require> <br> <!--Garde la valeur du champs si erreur-->
                </td>
              </tr>
              <tr>
                <td>
                  <label><b>Email d'utilisateur</b></label>
                </td>
                <td>
                  <input class="login" type="email" placeholder="Mail d'utilisateur" name="mail_username" value="<?php if(isset($mail_username)) { echo $mail_username; } ?>" require> <br> <!--Garde la valeur du champs si erreur-->
                </td>
              </tr>
              <tr>
                <td>
                  <label ><b>Confirmation du mail</b></label>
                </td>
                <td>
                  <input class="login" type="email" placeholder="Confirmer votre mail" name="mail2_username" value="<?php if(isset($mail2_username)) { echo $mail2_username; } ?>" require> <br> <!--Garde la valeur du champs si erreur-->
                </td>
              </tr>
              <tr>
                <td>
                  <label><b>Mot de passe</b></label>
                </td>
                <td>
                  <input class="login"  type="password" placeholder="Mot de passe" name="password_user" require><br> <!--pas ce value ici pour permettre a l utlisateur de refaire son mdp-->
                </td>
              </tr>
              <tr>
                <td>
                  <label><b>Confirmation du mdp</b></label>
                </td>
                <td>
                  <input class="login"  type="password" placeholder="Confirmer votre mdp" name="password2_user" require><br> <!--pas ce value ici pour permettre a l utlisateur de refaire son mdp-->
                </td>
              </tr>
            </table>
            <br>

            <!-- <input class="login" type="checkbox" name="accord_cookie" value="1">
            <label>Veuillez se rappellez de moi a la prochaine connexion</b></label> <br>
            <br> -->

            <input class="ok"type="submit" id='submit' name="formregister" value='LOGIN'> <br>

          </form>


      </div>

<?php
include 'include/footer.php';
 ?>
</body>
</html>
