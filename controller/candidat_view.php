<?php
session_start();
require '../database.php';
if (isset($_SESSION['user']) && $_SESSION['log'] == 1) {
    require '../model/candidat.php';

    if (isset($_GET['id'])) {
        $arrayIdCand = getAllCandidatsId($pdo);
        $idCandidat = $_GET['id'];


        if (in_array($idCandidat, $arrayIdCand)) {
            $candidat = getCandidatById($idCandidat, $pdo);
            //var_dump($candidat);
            $candLanguages = getAllLanguageFromCandidatById($idCandidat, $pdo);
            //var_dump($languages);

            require '../view/candidat_view.php';
        } else {
            http_response_code(404);
            require '../view/404.php';
        }

    } else {
        header('Location: candidats');

    }
} else {
    header('Location: login?login=error');
}
