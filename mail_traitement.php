<?php

  $nom_user = !empty($_POST['nom_user']) ? $_POST['nom_user'] : NULL;
  $prenom_user = !empty($_POST['prenom_user']) ? $_POST['prenom_user'] : NULL;
  $mail_username = !empty($_POST['mail_username']) ? $_POST['mail_username'] : NULL;
  $user_message= !empty($_POST['user_message']) ? $_POST['user_message'] : NULL;
  $headers = "From: $nom_user $prenom_user" . "\r\n" .
  "CC: $mail_username";

  $to = "Blombou@simplon-charleville.fr";
  $subject = "New message";

  mail($to,$subject, $user_message,$headers);
  echo "Le mail a bien éte envoyé";
  echo '<a href="index.php"> Retourner a Acceuil</a>';

?>
