<?php

require "../base-de-donnees/tableArticle.php";
require "../base-de-donnees/tableAuteur.php";
require "../base-de-donnees/tableCategorie.php";

/* Requête 6
 * Récupérer le nombre d'articles postés par chaque auteur
 * On souhaite récupérer l'id, le prénom, le nom et le nombre d'articles
*/
function R7(array $tableAuteurs, array $tableArticles):array
{
    $resultats = [];
    foreach ($tableAuteurs as $id => $auteur) {
        $compt = 0;
        foreach ($tableArticles as $cle => $article) {
            if ($article['id_auteur'] == $id) {
                $compt += 1;
            }
        }
        $resultats[] = [$id, $auteur['prenom'], $auteur['nom'], $compt];
    }
return $resultats;
}
// test
print_r(R7($tableAuteurs, $tableArticles));