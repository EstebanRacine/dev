<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";

/* Requête 5
 * Récupérer les articles à afficher ordonné par date de création (du plus récent au plus ancien)
 * On souhaite récupérer l'id, le titre, la date de création et le libellé de la catégorie
*/
function R8(array $tableArticles, array $tableCategories):array
{
    $resultats = [];
    foreach ($tableArticles as $cle => $article) {
        $cache[] = [$cle, $article['titre'], $article['date_creation'], $tableCategories[$article['id_categorie']]['libelle'],
            'temps' => strtotime($article['date_creation'])];
    }
    $colonneTri = array_column($cache, "temps");
    array_multisort($colonneTri, SORT_DESC, $cache);

    foreach ($cache as $tab) {
        unset($tab['temps']);
        $resultats[] = $tab;
    }
    return $resultats;
}

//test
print_r(R8($tableArticles, $tableCategories));