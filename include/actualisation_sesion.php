<?php
if (isset($_SESSION['username']) && isset($_SESSION['typeuser'])) // je verifie l existence des valeurs de session
{
goto a; // Si oui j ouvre une session sans cookie
}
elseif (isset($_COOKIE['allo_simplon_name']) && isset($_COOKIE['allo_simplon_type_user'])) // je verifie l existence des valeurs cookie
{
$_SESSION['username'] = $_COOKIE['allo_simplon_name']; // si cookie valide je creer une session avec
$_SESSION['typeuser'] = $_COOKIE['allo_simplon_type_user'];
goto a;
}
else // sinon on va a la page mais on as aucune valeur de session; utilisateur  nn enregestrer
{
	goto a;
}
a:
?>
