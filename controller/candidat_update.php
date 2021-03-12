<?php
session_start();
require '../database.php';
if (isset($_SESSION['user']) && $_SESSION['log'] == 1) {

    if (isset($_GET['id'])) {
        require "../model/candidat.php";


        $idCandidat = $_GET['id'];
        $arrayIdCand = getAllCandidatsId($pdo);
        if (in_array($idCandidat, $arrayIdCand)) {


            $languages = getAllLanguages($pdo);
            $candidat = getCandidatById($idCandidat, $pdo);

            $candName = $candidat['cand_name'];
            $candEmail = $candidat['cand_email'];
            $candDispo = $candidat['cand_dateDispo'];
            $candMotiv = $candidat['cand_motivation'];
            $candCV = $candidat['cand_cv'];

            $tabLang = getAllLanguageidFromCandidatById($idCandidat, $pdo);
            $selectedLang = [];
            //put all selected id in array
            for ($i = 0; $i < count($tabLang); $i++) {
                $selectedLang[] = $tabLang[$i]['lang_id'];
            }


            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $candName = filter_input(INPUT_POST, 'candName');
                $candEmail = filter_input(INPUT_POST, 'candEmail');
                $candDispo = filter_input(INPUT_POST, 'candDispo');
                $candMotiv = filter_input(INPUT_POST, 'candMotiv');
                $candCV = filter_input(INPUT_POST, 'candCV');
                $arrayLang = $_POST['candLang'];

                $errors = [];
                require '../control/candidat_control.php';

                if (empty($errors)) {
                    $success = updateCandidatwithLanguages($candName, $candEmail, $candDispo, $candMotiv, $candCV, $arrayLang, $idCandidat, $pdo);

                    if ($success) {
                        header("Location: candidats?update=$idCandidat");
                    } else {
                        $message = "<span style='color : #ff0000; font-weight: bold'>Probleme lors de la mise à jour</span>";
                    }
                } else {
                    $message = "<span style='color : red; font-weight: bold'>Erreur</span>";
                }
            }

            require '../view/candidat_form.php';

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
