<?php
/**
 * ADD CANDIDAT
 */
require '../database.php';
session_start();

$candName = "";
$candEmail = "";
$candDispo = "";
$candMotiv = "";
$selectedLang = [];

require "../model/candidat.php";
$languages = getAllLanguages($pdo);


if ($_SERVER['REQUEST_METHOD'] == "POST") {


    $candName = filter_input(INPUT_POST, 'candName');
    $candEmail = filter_input(INPUT_POST, 'candEmail');
    $candDispo = filter_input(INPUT_POST, 'candDispo');
    $candMotiv = filter_input(INPUT_POST, 'candMotiv');
    $candCV = filter_input(INPUT_POST, 'candCV');
    $selectedLang = $_POST['candLang'];
    $arrayLang = $_POST['candLang'];





    $errors = [];

    if (empty($errors)) {
        $success = insertCandidatwithLanguages($candName, $candEmail, $candDispo, $candMotiv, $candCV, $arrayLang, $pdo);
        if ($success) {
            $message = "<span style='color : green; font-weight: bold'>Envoi OK</span>";
            $candName = "";
            $candEmail = "";
            $candDispo = "";
            $candMotiv = "";
            $selectedLang = [];
        } else {
            $message = "<span style='color : red; font-weight: bold'>Probleme lors de l'envoi</span>";
        }
    }
}

require '../view/candidat_form.php';


