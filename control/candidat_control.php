<?php
//error control
if (mb_strlen($candName) < 3) {
    $errors['name'] = "Nom trop court";
}
if (!filter_var($candEmail, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email incorrect";
}
if (!preg_match('@^\d{4}-\d{2}-\d{2}@', $candDispo)) {
    $errors['dispo'] = "date disponibilité incorrect";
}

/**
 * if (mb_strlen($candMotiv) < 10) {
 * $errors['motivation'] = "Veuillez taper au moins 10 caractères";
 * }
 */

if (empty($arrayLang)) {
    $errors['language'] = "veuillez choisir au moins un langage";
}

if ($_FILES['candCV']['tmp_name'] == "") {
    $errors['cv'] = "Veuillez ajouter un CV";
}
