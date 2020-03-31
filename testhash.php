<?php
$passwordhash2 = password_hash("rasmuslerdorf", PASSWORD_BCRYPT);
echo $passwordhash2;
$passwordEnteredSecondTime = "rasmuslerdorf";
$passisvalid = password_verify($passwordEnteredSecondTime, $passwordhash2);
echo "</br>";
echo $passisvalid;
?>
