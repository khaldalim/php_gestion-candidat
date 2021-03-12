<?php
session_start();
require '../database.php';
if (isset($_SESSION['user']) && $_SESSION['log'] == 1) {
    require '../model/candidat.php';

    if (isset($_GET['id'])) {
        $idCandidat = $_GET['id'];
        $arrayIdCand = getAllCandidatsId($pdo);

        if (in_array($idCandidat, $arrayIdCand)) {
            $code = deleteCandidatwithById($_GET['id'], $pdo);
            header("Location: candidats?delete=$code");
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
