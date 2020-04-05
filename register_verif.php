<?php
session_start(); 
if(isset($_POST['formregister'])){
    $pseudo_user = htmlspecialchars($_POST['pseudo_user']);
    $nom_user = htmlspecialchars($_POST['nom_user']);
    $prenom_user = htmlspecialchars($_POST['prenom_user']);
    $mail_username = htmlspecialchars($_POST['mail_username']);
    $mail2_username = htmlspecialchars($_POST['mail2_username']);
    $password_user = password_hash($_POST['password_user'], PASSWORD_BCRYPT);
    $password2_user = ($_POST['password2_user']);
	 include('include/connectBDD.php');
    if(!empty($_POST['pseudo_user']) AND !empty($_POST['nom_user']) AND !empty($_POST['prenom_user']) AND !empty($_POST['mail_username']) AND !empty($_POST['mail2_username'])AND !empty($_POST['password_user'])AND !empty($_POST['password2_user'])) {
       $pseudolength = strlen($pseudo);
       if($pseudolength <= 100) {
          if($mail_username == $mail2_username) {
             if(filter_var($mail_username, FILTER_VALIDATE_EMAIL)) {
                $reqmail = $bdd->prepare("SELECT * FROM User WHERE mail_username = ?");
                $reqmail->execute(array($mail_username));
                $mail_exist = $reqmail->rowCount();
                if($mail_exist == 0) {
                  $reqpseudo = $bdd->prepare("SELECT * FROM User WHERE pseudo_user = ?");
                  $reqpseudo->execute(array($pseudo_user));
                  $pseudo_exist = $reqpseudo->rowCount();
                  if($pseudo_exist == 0) {
                    $passisvalid = password_verify($password2_user, $password_user);
                      if($passisvalid == 1)
					  {
                      $sql = $bdd->prepare("INSERT INTO User (pseudo_user, nom_user, prenom_user, mail_username, password_user, id_type_user) VALUES (:pseudo_user, :nom_user, :prenom_user, :mail_username, :password_user, :id_type_user)");
                      $sql->execute(array(
                        'pseudo_user'=> $pseudo_user,
                        'nom_user'=> $nom_user,
                        'prenom_user'=> $prenom_user,
                        'mail_username'=> $mail_username,
                        'password_user'=> $password_user,
                        'id_type_user'=> 3));
						header('Location: http://blombou.simplon-charleville.fr/allo_simplon/connexion.php?message=1');
					  	}
                   else 
				   {
					header('Location: http://blombou.simplon-charleville.fr/allo_simplon/register.php?erreur=1');
				   }
                }
                else {
                   header('Location: http://blombou.simplon-charleville.fr/allo_simplon/register.php?erreur=2');
                    }
                }
                else {
                  header('Location: http://blombou.simplon-charleville.fr/allo_simplon/register.php?erreur=3');
                }
             }
             else {
                header('Location: http://blombou.simplon-charleville.fr/allo_simplon/register.php?erreur=4');
             }
          }
          else {
            header('Location: http://blombou.simplon-charleville.fr/allo_simplon/register.php?erreur=5');
          }
       }
       else {
           header('Location: http://blombou.simplon-charleville.fr/allo_simplon/register.php?erreur=6');
       }
    }
    else {
      header('Location: http://blombou.simplon-charleville.fr/allo_simplon/register.php?erreur=7');
	}
 }
 			else
			{
header('Location: http://blombou.simplon-charleville.fr/allo_simplon/register.php?erreur=8');
			}
?>