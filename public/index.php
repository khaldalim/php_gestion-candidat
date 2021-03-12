<?php
/*
 * Contrôleur frontal / Front controller
 * Point d'entrée de l'application, toutes les requêtes passent par ce fichier
 */

// router : récupérer l'url pour exécuter le bon contrôleur
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// on execute le controller en fonction de cette url
if ($url == "/index.php" || $url == "/") {
    require '../controller/candidat_form.php';
} elseif ($url == "/index.php/login" || $url == "/login") {
    require '../controller/user_login.php';
} elseif ($url == "/index.php/candidats" || $url == "/candidats") {
    require '../controller/candidat_list.php';
} elseif ($url == "/index.php/logout" || $url == "/logout") {
    require '../controller/user_logout.php';
} elseif ($url == "/index.php/updateCandidat" || $url == "/updateCandidat") {
    require '../controller/candidat_update.php';
} elseif ($url == "/index.php/viewCandidat" || $url == "/viewCandidat") {
    require '../controller/candidat_view.php';
} elseif ($url == "/index.php/deleteCandidat" || $url == "/deleteCandidat") {
    require '../controller/candidat_delete.php';
} //url pour l'affichage des CV
elseif ($url == "/index.php/candidat/cv" || $url == "/candidat/cv") {
    require '../controller/candidat_cv.php';
} elseif ($url == "/index.php/languageNumber" || $url == "/languageNumber") {
    require '../controller/language_number.php';
} else {
    //go to 404
    http_response_code(404);
    require '../controller/404.php';
}





