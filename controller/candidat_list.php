<?php
session_start();
require '../database.php';
if (isset($_SESSION['user']) && $_SESSION['log'] == 1) {
    require '../model/candidat.php';

    $candidats = getAllCandidats($pdo);


    require '../view/candidat_list.php';
} else {
    header('Location: login?login=error');
}
