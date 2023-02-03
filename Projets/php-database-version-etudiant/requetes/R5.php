<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";

/* Requête 5
 * Récupérer les articles à afficher ordonnés sur le titre (ordre alphabétique)
 * On souhaite récupérer l'id, le titre, la date de création et le libellé de la catégorie
*/
function R5(array $tableArticles):array
{
    $resultats = $tableArticles;
    $colonne = array_column($resultats, "titre");
    array_multisort($colonne, SORT_ASC, $resultats);
    return $resultats;

}



// test
print_r(R5($tableArticles));
