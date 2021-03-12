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
    $arrayLang = filter_input(INPUT_POST, 'candLang', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
    $selectedLang = $arrayLang;


    $errors = [];

    require '../control/candidat_control.php';

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
    } else {
        $message = "<span style='color : red; font-weight: bold'>Erreur</span>";
    }
}

require '../view/candidat_form.php';


