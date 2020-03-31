<?php
session_start();
include 'include/actualisation_session.php'; // Actualisation session
header('Content-type: text/html; charset=utf-8');
require_once 'styleswitcher.php';

// Interdire l'accès à la page si pas connecté
// if ( empty($_SESSION["username"]) ) {
//     header('Location:connexion.php');
//     exit();
// }


// connexion à la base de données
include('include/connectBDD.php');


 ?>

 <?php
 if(isset($_POST['formregister'])) { // je verifie l existence du formregister
    $pseudo_user = htmlspecialchars($_POST['pseudo_user']); // Je securise mes varibles htmlspec... enleve les caractere speciaux, permet d eviter  les injections
    $nom_user = htmlspecialchars($_POST['nom_user']);
    $prenom_user = htmlspecialchars($_POST['prenom_user']);
    $mail_username = htmlspecialchars($_POST['mail_username']);
    $mail2_username = htmlspecialchars($_POST['mail2_username']);
    $password_user = password_hash($_POST['password_user'], PASSWORD_BCRYPT); // Je securise les mdp avec un hachage ( encrypte) password_hash
    $password2_user = ($_POST['password2_user']);

    // Je verifie que les champs soit bien remplies
    if(!empty($_POST['pseudo_user']) AND !empty($_POST['nom_user']) AND !empty($_POST['prenom_user']) AND !empty($_POST['mail_username']) AND !empty($_POST['mail2_username'])AND !empty($_POST['password_user'])AND !empty($_POST['password2_user'])) {
       $pseudolength = strlen($pseudo); // Je test si le pseudo a une longeur plus petite que 100 characters avec la fct strlen ( voir ligne dessous)
       if($pseudolength <= 100) { // 100 characters

          if($mail_username == $mail2_username) { // Je verifie que les mails entrés soit identiques
             if(filter_var($mail_username, FILTER_VALIDATE_EMAIL)) { // Je utilise la fct (filter_var) pour filtré une seul des mail si elles sont identiques FILTER VALIDATE verifie que ce soit bien un mail ici (securite qui empeche d entrer autre chose )
                $reqmail = $bdd->prepare("SELECT * FROM User WHERE mail_username = ?"); // Je lis la BDD pour savoir si le mail n est as deja utilisée
                $reqmail->execute(array($mail_username)); // j execute ma requete sql
                $mail_exist = $reqmail->rowCount(); // Je compte le nombre de collonnes qui existent sur la variable mail_username
                if($mail_exist == 0) { // Si le mail n existe pas on continus

                  $reqpseudo = $bdd->prepare("SELECT * FROM User WHERE pseudo_user = ?"); // Je lis la BDD pour savoir si le pseudo n est as deja utilisée
                  $reqpseudo->execute(array($pseudo_user)); // j execute ma requete sql
                  $pseudo_exist = $reqpseudo->rowCount(); // Je compte le nombre de collonnes qui existent sur la variable pseudo_user
                  if($pseudo_exist == 0) { // Si le pseudo n existe pas on continus
                    $passisvalid = password_verify($password2_user, $password_user);


                      if($passisvalid == 1) { // Je verifie que les mdp soit identiques
                      $sql = $bdd->prepare("INSERT INTO User (pseudo_user, nom_user, prenom_user, mail_username, password_user, id_type_user)
                                                VALUES(:pseudo_user, :nom_user, :prenom_user, :mail_username, :password_user, :id_type_user)"); // Si tout est bon j inscrit les données ds la BDD
                      $sql->execute(array( // J execute ma requete sql avec un tableau
                        'pseudo_user'=> $pseudo_user, // Inscription des données
                        'nom_user'=> $nom_user,
                        'prenom_user'=> $prenom_user,
                        'mail_username'=> $mail_username,
                        'password_user'=> $password_user,
                        'id_type_user'=> 3,
                      ));
                      $message = "Votre compte a bien etais crée"; // ((A revoir ne s affiche pas et pas de redirection))
                      header('Location: connexion.php'); // Nom d'utilisateur et mot de passe correctes dc redirection

                   }
                   else {
                      $erreur = "Vos mots de passes ne correspondent pas !"; // Si les mdp sont differents j affiche ce message
                   }
                }
                else {
                   $erreur = "Adresse mail déjà utilisée !"; // Si le mail est deja ds la BDD j affiche ce message
                    }
                }
                else {
                   $erreur = "Pseudo déjà utilisée !"; // Si le pseudo est deja ds la BDD j affiche ce message
                }
             }
             else {
                $erreur = "Votre adresse mail n'est pas valide !"; // Si l adresse mail ne passe pas le FILTER VALIDATE j affiche ce message
             }
          }
          else {
             $erreur = "Vos adresses mail ne sont pas identiques !"; // Si les adresse mails sont differentes j affiche ce message
          }
       }
       else {
          $erreur = "Votre pseudo ne doit pas dépasser 100 caractères !"; // Si le mdp est trop grand j affiche ce messge
       }
    }
    else {
      echo $_POST['formregister'];
       $erreur = "Tous les champs doivent être complétés !"; // Je stock les erreurs ds une variable et j affiche ce message si  tous les champs ne sont pas remplie
    }
 }



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


  <!-- zone de connexion -->

    <div  id="container">
        <form action="" method="POST">
          <br>
          <br>
            <h2>Inscription</h2>
            <br>
            <?php
           if(isset($erreur)) { // Je verifie si il y a une valeur ds ma variable erreur
              echo '<font color="red">'.$erreur."</font>"; // Si oui j affiche le message d erreur en rouge
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
// $sql-> closeCursor();
//   header('location:../index.php');

 ?>


<?php
include 'include/footer.php';
 ?>


</body>
</html>
