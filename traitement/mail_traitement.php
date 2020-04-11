<?php

  include ('../include/connectBDD.php');

  $nom_user = !empty($_POST['nom_user']) ? $_POST['nom_user'] : NULL;
  $prenom_user = !empty($_POST['prenom_user']) ? $_POST['prenom_user'] : NULL;
  $mail_username = !empty($_POST['mail_username']) ? $_POST['mail_username'] : NULL;
  $subject = !empty($_POST['subject']) ? $_POST['subject'] : NULL;
  $user_message= !empty($_POST['user_message']) ? $_POST['user_message'] : NULL;
  "CC: $mail_username";

  $to = "Blombou@simplon-charleville.fr";
  $nom_user = $_POST['nom_user'];
  $prenom_user = $_POST['prenom_user'];
  $subject = $_POST['subject'];
  $user_essage = $_POST['user_message'];
  $headers = 'From: ' . $_POST['mail_username'] . "\r\n" . 'Reply-To: ' . $_POST['mail_username'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();

  // On envoie le mail et on stocke le résultat
  $result = mail($to, $subject, $user_message, $headers);

  mail($to,$subject, $user_message,$headers);
  // echo "Le mail a bien éte envoyé";
  // echo '<a href="index.php"> Retourner a Acceuil</a>';

  // Le contenu sera renvoyé au format JSON
header('Content-Type: application/json');
echo json_encode([
    'result' => $result
]);

?>
