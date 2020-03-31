<?php
session_start(); // j ouvre la session
$_SESSION = array(); // je met les session a 0
setcookie("allo_simplon_name","", time()- 4200,'/'); // je perime le cookie et tu le vide
setcookie("allo_simplon_type_user","", time()- 4200,'/');
unset($_COOKIE["allo_simplon_name"]); // je supprime les variable direct pas la valeur du cookie pour etre sur
unset($_COOKIE["allo_simplon_type_user"]);
header('Location: /allo_simplon/index.php'); // redirection
session_destroy(); // je detruit la session
?>
