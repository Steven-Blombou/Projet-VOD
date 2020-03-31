<?php
session_start(); // Lancement session
if(isset($_POST['mail_username']) && isset($_POST['password_user'])) // Je verifie l existence des variable mail_username et password_user
	{
		// connexion à la base de données
		include('include/connectBDD.php');
		$username = !empty($_POST['mail_username']) ? $_POST['mail_username'] : NULL; // Je definie mes variables
		$password = !empty($_POST['password_user']) ? $_POST['password_user'] : NULL;

		// Je prepare ma requete de recherche
		$requete = $bdd->prepare("SELECT pseudo_user, id_type_user, password_user  FROM User WHERE (pseudo_user='$username') OR (mail_username='$username') ");
		$requete ->execute();
		$recupinfo = $requete->fetch();

			If(isset($recupinfo['password_user']))
				{
				$passisvalid = password_verify($password, $recupinfo['password_user']); // dehash
					 if($passisvalid == 1) 
					{
						If (isset($_POST['accord_cookie']))
						{
							$_SESSION['username'] = $recupinfo['pseudo_user']; // Je compte les valeurs des varibles
							$_SESSION['typeuser'] = $recupinfo['id_type_user'];
							setcookie("allo_simplon_name", $recupino['pseudo_user'], time()+604800,'/'); // mise en place cookie pseudo sur 7 jours emplacement ou sera save le cookie
							setcookie("allo_simplon_type_user", $recupinfo['id_type_user'], time()+604800,'/'); // mise en place cookie type user sur 7 jours emplacement ou sera save le cookie
							header('Location: /allo_simplon/index.php');

						}
						else
						{
							$_SESSION['username'] = $recupinfo['pseudo_user']; // Je compte les valeurs des varibles
							$_SESSION['typeuser'] = $recupinfo['id_type_user'];
							header('Location: /allo_simplon/index.php');  // nom d'utilisateur et mot de passe correctes
						}
					}
					else
					{
						header('Location: /allo_simplon/connexion.php?erreur=1'); // mot de passe incorrect
					}
				}
				else
				{
					header('Location: /allo_simplon/connexion.php?erreur=2'); // pseudo ou mail invalide
				}
			}
			else
			{
			header('Location: /allo_simplon/connexion.php?erreur=3'); // utilisateur ou mot de passe vide
			}

///$bdd->closeCursor(); // fermer la connexion
?>
