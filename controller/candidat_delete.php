<?php
session_start();
require '../database.php';
if (isset($_SESSION['user']) && $_SESSION['log'] == 1) {
    require '../model/candidat.php';

    if (isset($_GET['id'])) {
        $idCandidat = $_GET['id'];


        $code = deleteCandidatwithById($_GET['id'], $pdo);


        header("Location: candidats?delete=$code");

    } else {
        header('Location: candidats');
    }
} else {
    header('Location: login?login=error');
}
