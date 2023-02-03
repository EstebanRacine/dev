<?php
$notes = [10, 12.5, 14, 7, 15, 9.5, 8];
$max = 0;
foreach($notes as $note){
    if($note > $max){
        $max = $note;
    }
}
echo "La note maximale est $max";


echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;
$max2 = max($notes);
echo $max2;