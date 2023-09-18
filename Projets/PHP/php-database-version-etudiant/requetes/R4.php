<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";

/* Requête 4
 * Récupérer les articles dont la date de création est supérieure à une date donnée
 * On souhaite récupérer l'id, le titre, le contenu, la date de création, le prénom et le nom de l'auteur
*/
function R4(string $dateCreation, array $tableArticles, array $tableAuteurs):array
{
    $dateCreation = str_replace("/", "-", $dateCreation);
    $resultats = [];
    $dateCreation = strtotime($dateCreation);
    foreach ($tableArticles as $cle => $article) {
        $dateArticle = strtotime($article["date_creation"]);
        if ($dateArticle > $dateCreation) {
            $AuteurID = $article["id_auteur"];
            $resultats[] = [$cle, $article["titre"], $article["contenu"], $article["date_creation"],
                $tableAuteurs[$AuteurID]["prenom"], $tableAuteurs[$AuteurID]["nom"]];
        }
    }
    return $resultats;
}

// test
print_r(R4("16/09/2022", $tableArticles, $tableAuteurs));