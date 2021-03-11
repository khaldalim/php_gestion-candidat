<?php
session_start();
require '../database.php';
if (isset($_SESSION['user']) && $_SESSION['log'] == 1) {
    require '../model/candidat.php';

    if (isset($_GET['id'])) {
        $idCandidat = $_GET['id'];

    $candidat = getCandidatById($idCandidat, $pdo);
    //var_dump($candidat);
    $candLanguages = getAllLanguageFromCandidatById($idCandidat, $pdo);
    //var_dump($languages);

    require '../view/candidat_view.php';
    }else{
        header('Location: candidats');
    }
} else {
    header('Location: login?login=error');
}
