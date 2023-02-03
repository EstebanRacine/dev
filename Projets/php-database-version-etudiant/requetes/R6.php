<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";

/* Requête 6
 * Récupérer le nombre d'articles postés par un auteur donné (id_auteur)
*/
function R6(array $tableArticles, int $auteurId):int
{
    $compt = 0;
    foreach ($tableArticles as $cle => $article) {
        if ($article['id_auteur'] == $auteurId) {
            $compt += 1;
        }
    }
    return $compt;
}

echo R6($tableArticles, 2);