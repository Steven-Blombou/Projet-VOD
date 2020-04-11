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
  $new_pseudo = $_POST['new_pseudo'];
  $old_password_user = $_POST['old_password_user'];
  $new_password_user = $_POST['new_password_user'];
  $new_password2_user = $_POST['new_password2_user'];
  $new_mail_username = $_POST['new_mail_username'];

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
   }
   ?>
