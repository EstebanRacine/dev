<?php

//ACCEDER A LA SESSION
    session_start();

//    Accès aux infos de session
    $prenom = null;
    if(!empty($_SESSION['prenom'])){
        $prenom = $_SESSION['prenom'];
    }

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Use Session</title>
</head>
<body>
<h1>Utiliser une session</h1>
<?php
if(!empty($prenom)){
    echo "<p>Bonjour $prenom</p>";
}else{
    echo "<p>Vous m'êtes inconnu</p>";
}
?>
</body>
</html>
