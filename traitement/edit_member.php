<?php
session_start();
include ('../include/actualisation_session.php'); // Actualisation session
include ('../include/blocagepage_public.php'); // J interdis l acces a la page  si pas connecté
header('Content-type: text/html; charset=utf-8');
require_once '../styleswitcher.php';


// connexion à la base de données
include ('../include/connectBDD.php');

 ?>

 <?php
 if(isset($_SESSION['username']) && isset($_SESSION['typeuser'])) { // Je verifie que la varible exite
    $req_user = $bdd->prepare("SELECT * FROM User WHERE id_user = ?"); // Je selectionne le  user ds la BDD
    $req_user->execute(array($_SESSION['username'])); // J affiche le resultat
    $user = $req_user->fetch();

    if(isset($_POST['newpseudo_user']) AND !empty($_POST['newpseudo_user']) AND $_POST['newpseudo_user'] != $user['pseudo_user']) { // Je verifie que la valeur n est pas vide et differentes de la valeur precedente
       $newpseudo = htmlspecialchars($_POST['newpseudo_user']); // J empeche d entrer autre chose (inject sql)
       $insert_pseudo = $bdd->prepare("UPDATE User SET pseudo_user = ? WHERE id_user = ?"); // Je update la table User et important le WHERE permet juste la maj sur la l id concerné et pas tte la table
       $insert_pseudo->execute(array($newpseudo, $_SESSION['username'])); // J execute la requete
       header('Location: member_space.php?id='.$_SESSION['username']); // Redirection vers le profil user
    }

    if(isset($_POST['newmail_username']) AND !empty($_POST['newmail_username']) AND $_POST['newpmail_username'] != $user['mail_username']) { // Je verifie que la valeur n est pas vide et differentes de la valeur precedente
       $newmail = htmlspecialchars($_POST['newmail_username']); // J empeche d entrer autre chose (inject sql)
       $insert_mail = $bdd->prepare("UPDATE User SET mail_username = ? WHERE id_user = ?"); // Je update la table User et important le WHERE permet juste la maj sur la l id concerné et pas tte la table
       $insert_mail->execute(array($newmail, $_SESSION['username'])); // J execute la requete
       header('Location: member_space.php?id='.$_SESSION['username']); // Redirection vers le profil user
    }

    if(isset($_POST['new_password_user']) AND !empty($_POST['new_password_user']) AND isset($_POST['new_password2_user']) AND !empty($_POST['new_password2_user'])) { // Je verifie que la valeur existe et differentes de la valeur precedente et qu elle sont identique mdp=mdp2

       $password = password_hash($_POST['new_password_user'], PASSWORD_BCRYPT); // Je securise les mdp avec un hash
       $password2 = password_hash($_POST['new_password2_user'], PASSWORD_BCRYPT);
       if($password == $password2) {
         $insert_password = $bdd->prepare("UPDATE User SET password_user = ? WHERE id_user = ?"); // Je update la table User avec le mdp
         $insert_password->execute(array($password, $_SESSION['username'])); // J execute la requete
         header('Location: profil.php?id='.$_SESSION['username']); // Redirection vers le profil user
       }
       else {
          $message = "Vos deux mot de passe ne correspondent pas !";
       }
    }
    if(isset($_POST['new_pseudo_user']) AND $_POST['new_pseudo_user'] == $user['pseudo_user']) { // Si aucun changement de fait
      header('Location: profil.php?id='.$_SESSION['username']); // Redirection vers le profil user
    }
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

 <form action="edit_member.php" method="POST" >
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
 </form>

<?php if(isset($message)) { // Si la variable message existe
  echo $message; // J affiche le message
}
?>

 <br>
<input class="ok"type="submit" id='submit' value='Mettre à jour mon profil !'> <br>

</div>

<?php include 'include/footer.php'; ?>

</body>
</html>
<?php
}
else {
   header("Location: connexion.php");
}
?>
