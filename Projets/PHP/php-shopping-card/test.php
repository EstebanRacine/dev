<?php
$mdp = "Azerty123";
$hash1 = password_hash($mdp, PASSWORD_DEFAULT);
echo $hash1.PHP_EOL.strlen($hash1).PHP_EOL;

$hash2 = password_hash($mdp, PASSWORD_ARGON2I);
echo $hash2.PHP_EOL;

$hash3 = password_hash($mdp, PASSWORD_ARGON2ID);
echo $hash3.PHP_EOL;

var_dump(password_verify("Azerty123", $hash1));