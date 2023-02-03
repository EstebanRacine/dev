<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";

/* Requête 3
 * Récupérer l'ensemble des articles
 * On souhaite récupérer l'id, le titre, le contenu, la date de création et le nom de la catégorie
*/
function R3(array $tableArticles, array $tableCategories):array
{
    $resultats = [];
    foreach ($tableArticles as $cle => $article) {
        $resultats[] = [$cle, $article["titre"], $article["contenu"], $article["date_creation"],
            $tableCategories[$article["id_categorie"]]["libelle"]];
    }
    return $resultats;
}
// test
print_r(R3($tableArticles, $tableCategories));