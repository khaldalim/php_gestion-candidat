<?php

session_start();
require '../database.php';
if (isset($_SESSION['user']) && $_SESSION['log'] == 1) {
    require '../model/candidat.php';

    if (isset($_GET['id'])) {
        $idCandidat = $_GET['id'];
        $arrayIdCand = getAllCandidatsId($pdo);
        $name = getcandidatCVById($idCandidat, $pdo);


        $filename = "../uploads/" . $name[0]['cand_cv'];
        if (in_array($idCandidat, $arrayIdCand)) {

            $file_parts = pathinfo($name[0]['cand_cv']);
            $fileExtension = $file_parts['extension'];


            if ($fileExtension == "pdf") {
                header("Content-Disposition: inline; filename=$filename");
                header("Content-type: application/pdf");
                readfile($filename);
            } else {
                switch ($fileExtension) {
                    case "gif":
                        $ctype = "image/gif";
                        break;
                    case "png":
                        $ctype = "image/png";
                        break;
                    case "jpeg":
                    case "jpg":
                        $ctype = "image/jpeg";
                        break;
                    case "svg":
                        $ctype = "image/svg+xml";
                        break;
                    default:
                }
                header('Content-type: ' . $ctype);
                readfile($filename);
            }


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
