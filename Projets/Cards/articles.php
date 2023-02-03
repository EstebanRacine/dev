<?php
$articles = [[
    'libelle' => "Nom",
    'image' => 'https://loremflickr.com/320/240/dog',
    'prix' => 49.99,
    'promo' => True,
    'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sodales lacus quis est convallis elementum. Mauris tincidunt lacus sed mattis fermentum. Nullam mattis nisi eget odio ornare, quis ornare diam tincidunt. Pellentesque tristique diam purus, fringilla commodo enim rhoncus nec. Vestibulum quis dolor sit amet augue ornare tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et eros mattis, sagittis nulla ut, pulvinar libero. Quisque magna nisl, laoreet et sapien vitae, molestie laoreet erat. Curabitur varius nulla vel dolor tincidunt dictum. Ut sit amet diam ullamcorper, scelerisque sem nec, suscipit nunc. Aenean suscipit nisi arcu, non posuere nisl tristique vel. Vestibulum gravida pharetra dui, vel elementum est semper nec. Suspendisse porttitor aliquet purus, ac facilisis ex placerat eget. Sed a eros et ante iaculis venenatis ut vel turpis. Nulla at enim et purus auctor mattis quis dapibus lectus. Vestibulum egestas urna metus, nec egestas massa ullamcorper nec. "
],[
    'libelle' => "Chat",
    'image' => 'https://loremflickr.com/320/240/cat',
    'prix' => 2.00,
    'promo' => False,
    'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sodales lacus quis est convallis elementum. Mauris tincidunt lacus sed mattis fermentum. Nullam mattis nisi eget odio ornare, quis ornare diam tincidunt. Pellentesque tristique diam purus, fringilla commodo enim rhoncus nec. Vestibulum quis dolor sit amet augue ornare tristique. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis et eros mattis, sagittis nulla ut, pulvinar libero. Quisque magna nisl, laoreet et sapien vitae, molestie laoreet erat. Curabitur varius nulla vel dolor tincidunt dictum. Ut sit amet diam ullamcorper, scelerisque sem nec, suscipit nunc. Aenean suscipit nisi arcu, non posuere nisl tristique vel. Vestibulum gravida pharetra dui, vel elementum est semper nec. Suspendisse porttitor aliquet purus, ac facilisis ex placerat eget. Sed a eros et ante iaculis venenatis ut vel turpis. Nulla at enim et purus auctor mattis quis dapibus lectus. Vestibulum egestas urna metus, nec egestas massa ullamcorper nec. "
]];
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Articles</title>
</head>
<body>
<div id="conteneurGeneral">
<?php
foreach ($articles as $article){
    $lib = $article['libelle'];
    $img = $article['image'];
    $prix = $article['prix'];
    $promo = $article['promo'];
    if(strlen($article['description'])>100){
        $description = substr($article['description'], 0, 100)."...";
    } else{
        $description = $article['description'];
    }
    echo "<div class=\"card\">
    <div class=\"card-header\">
        <img class=\"card-img\" src = $img alt=\"\">
    </div>
    <div class=\"card-body\">
        <h2 class=\"card-title\"> $lib </h2>";
    if ($promo){
        echo "<p class=\"card-price\"> $prix euros <i class=\"fa-solid fa-tag\"></i></p>";} else {
        echo "<p class=\"card-price\"> $prix euros </p>";
    }
     echo "
        <p class=\"card-text\"> $description </p>
        <div class=\"card-btn-detail\">
            <a href=\"#\">Voir</a>
    </div>
    </div>
</div>";

}
?>
</div>

</body>
</html>
