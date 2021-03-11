<?php
session_start();
require '../database.php';
if (isset($_SESSION['user']) && $_SESSION['log'] == 1) {
    require '../model/language.php';

    $languageNumber = selectNumbersofUserOfLanguage($pdo);


    require '../view/language_number.php';
} else {
    header('Location: login?login=error');
}
