<?php
$save = fopen("save.txt", "w+");
$nbParties = intval(fgets($save));
echo "$nbParties";
fwrite($save,"26");
fclose($save);
$save = fopen("save.txt", "r");
$nbParties = intval(fgets($save));
echo "$nbParties";
fclose($save);