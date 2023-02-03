<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Page</title>
</head>
<body>
<h1>Page exemple</h1>
    <pre>
        <?php
            if ($_SERVER['REQUEST_METHOD']=='GET'){
                echo "La requête est émise par la méthode GET";
            }else{
                echo "La requète n'est pas émise avec GET";
            }
            echo PHP_EOL;
            echo PHP_EOL;
            $date = date("d/m/Y H:i:s", $_SERVER['REQUEST_TIME']);
            echo "La requete date du $date";
        ?>
    </pre>
</body>
</html>
