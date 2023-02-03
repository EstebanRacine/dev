<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";

/* Requête 2
 * Récupérer les articles d'une catégorie donnée
 * On souhaite récupérer l'id, le titre, le contenu et la date de création
*/
function R2(int $categorieId, array $tableArticles):array
{
    $resultats = [];
    foreach ($tableArticles as $cle => $article) {
        if ($article['id_categorie'] == $categorieId) {
            $resultats[] = [$cle, $article["titre"], $article["contenu"], $article["date_creation"]];
        }
    }
    return $resultats;
}

// test
print_r(R2(2, $tableArticles));