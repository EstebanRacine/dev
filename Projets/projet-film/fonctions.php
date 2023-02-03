<?php

/**
 * Cette fonction permet de convertir une durée (exprimée en minutes) en une chaine de caractères avec le format hmn
 * Exemple : 121mn -> 2h01mn
 * @param int $dureeMinutes
 * @return string
 */
function convertirDuree(int $dureeMinutes) : string {
    $h = 0;
    while ($dureeMinutes >= 60){
        $h += 1;
        $dureeMinutes -= 60;
    }
    return "$h H $dureeMinutes min";
}

function convertirDuree2(int $dureeMinutes) : string {
    $date = date("h:i", $dureeMinutes*60-3600);
    return str_replace(":", "h", $date)."mn";
}

/**
 * Cette fonction permet de retourner la liste des films
 * @param array $films : le tableau contenant la liste des films
 * @return array : la liste des films
 */
function rechercherFilms(array $films) : array {
    return $films;
}

/**
 * Cette fonction permet de rechercher et retourner un film dont on connait l'id
 * @param array $films : le tableau contenant la liste des films
 * @param int $id : id du film à rechercher
 * @return array|null : Si le film est trouvé, on retourne le film (tableau associatif) sinon on retourne la valeur null
 */
function rechercherFilmParID(array $films, int $id) : array|null {
    foreach($films as $film){
        if($film['id']==$id){
            return $film;
        }
    }
    return null;
}
