<?php
/*
 * Contrôleur frontal / Front controller
 * Point d'entrée de l'application, toutes les requêtes passent par ce fichier
 */

// router : récupérer l'url pour exécuter le bon contrôleur
$url = $_SERVER['REQUEST_URI'];
$url = parse_url($url, PHP_URL_PATH);
// on execute le controller en fonction de cette url
if ($url == "/index.php" || $url == "/") {
    require '../controller/candidat_form.php';
} elseif ($url == "/index.php/login") {
    require '../controller/user_login.php';
} elseif ($url == "/index.php/candidats") {
    require '../controller/candidat_list.php';
} elseif ($url == "/index.php/logout") {
    require '../controller/user_logout.php';
} elseif ($url == "/index.php/updateCandidat") {
    require '../controller/candidat_update.php';
} elseif ($url == "/index.php/viewCandidat") {
    require '../controller/candidat_view.php';
} elseif ($url == "/index.php/deleteCandidat") {
    require '../controller/candidat_delete.php';
}elseif ($url == "/index.php/languageNumber") {
    require '../controller/language_number.php';
} else {
    http_response_code(404);
    echo "Cette page n'existe pas";
}





