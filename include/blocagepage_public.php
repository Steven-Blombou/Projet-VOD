<?php
if (isset($_SESSION['username']) && isset($_SESSION['typeuser']))
{
goto b;
}
else
{
header('Location: http://blombou.simplon-charleville.fr/allo_simplon/index.php');
exit();
}
b:
?>