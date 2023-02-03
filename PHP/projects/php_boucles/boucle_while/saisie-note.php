<?php
$note = intval(readline("Quelle est la note ?"));
while($note < 0 || $note > 20){
    $note = intval(readline("Note ($note) incorrecte veuillez recommencer."));
}
echo "La note $note est correcte";