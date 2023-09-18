<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";

/* Requête 1
 * Récupérer les articles actifs (articles à afficher)
 * On souhaite récupérer l'id, le titre, le contenu et la date de création
*/

function R1(array $tableArticles): array
{
    $resultats = [];
    foreach ($tableArticles as $cle => $article) {
        if ($article['actif']) {
            $resultats[] = [$cle, $article["titre"], $article["contenu"], $article["date_creation"]];
        }
    }
    return $resultats;
}
// test
print_r(R1($tableArticles));

