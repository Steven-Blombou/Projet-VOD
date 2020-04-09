<?php
session_start();
include ('../include/actualisation_session.php'); // Actualisation session
include ('../include/blocagepage_public.php'); // J interdis l acces a la page  si pas connecté
header('Content-type: text/html; charset=utf-8');
require_once '../styleswitcher.php';


// connexion à la base de données
include ('../include/connectBDD.php');
$new_pseudo = $_POST['new_pseudo'];
$old_password_user = $_POST['old_password_user'];
$new_password_user = $_POST['new_password_user'];
$new_password2_user = $_POST['new_password2_user'];
$new_mail_username = $_POST['new_mail_username'];

if(isset($old_passord_user))
  {
    $requete = $bdd->prepare("SELECT pseudo_user, id_type_user, password_user  FROM User WHERE (pseudo_user='$username') OR (mail_username='$username') ");
		$requete ->execute();
		$recupinfo = $requete->fetch();
    $passisvalid = password_verify($old_password_user, $recupinfo['password_user']);
    if($passisvalid){
      if(isset($_POST['new_pseudo']) {
         $newpseudo = htmlspecialchars($_POST['new_pseudo']);
         $insert_pseudo = $bdd->prepare("UPDATE User SET pseudo_user = ? WHERE id_user = ?");
         $insert_pseudo->execute(array($newpseudo, $_SESSION['username']));
      }

    }

  }


 ?>
