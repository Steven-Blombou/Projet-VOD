<?php
session_start(); // Lancement session
include ('include/actualisation_session.php'); // Actualisation session
include ('../include/connectBDD.php');
header('Content-type: text/html; charset=utf-8');
//require_once 'styleswitcher.php'; // Changement de theme



  if(isset($_GET['film'])){
    $film = (String) trim($_GET['film']);

    $req = $bdd->prepare("SELECT * FROM Film WHERE titre LIKE ? LIMIT 10");
    $req->execute(array("$film%"));
      
    $req = $req->fetchALL();

    foreach($req as $r){
      ?>
        <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc"><?= $r['titre'] ?></div><?php
    }
  }
?>
