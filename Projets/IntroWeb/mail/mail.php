<?php
$dest = "dest@mail.net";
$objet = "Sujet";
$message = "Voici un message quelconque avec des caractères accentués.";
$utilisateur = "send@contact.fr";
$headers = [
    "From"=>$utilisateur,
    "Cc"=>"esteban.racine@laposte.net",
    "content-type"=>"text/plain; charset=utf-8",

];

//if(mail($dest, $objet, $message, $headers)){
//    echo "Le mail a bien été envoyé.";
//}else{
//    echo "Un problème est survenu.";
//}

$message = "<h1>test</h1><p>Ce texte est en html</p>";
$headers = [
    "From"=>$utilisateur,
    "Cc"=>"esteban.racine@laposte.net",
    "content-type"=>"text/html; charset=utf-8",

];
if(mail($dest, $objet, $message, $headers)){
    echo "Le mail a bien été envoyé.";
}else{
    echo "Un problème est survenu.";
}