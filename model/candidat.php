<?php


function getAllLanguages($pdo)
{
    $query = "SELECT * FROM language ";
    $statement = $pdo->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getAllCandidats($pdo)
{
    $query = "SELECT * FROM candidat ORDER BY cand_createdDate DESC ";
    $statement = $pdo->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getCandidatById($id, $pdo)

    /**
     * SELECT C.cand_id, C.cand_name, C.cand_email, C.cand_dateDispo, C.cand_motivation, C.cand_cv,
     * L.lang_name
     * FROM candidat_language AS CL
     * INNER JOIN language AS L
     * INNER JOIN candidat as C
     * ON CL.cand_id = C.cand_id
     * AND CL.lang_id = L.lang_id
     * WHERE C.cand_id = :id
     */
{
    $query = "SELECT C.cand_id, C.cand_name, C.cand_email, C.cand_dateDispo, C.cand_motivation, C.cand_cv 
                FROM candidat AS C WHERE C.cand_id = :id";
    $statement = $pdo->prepare($query);
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function getAllLanguageIdFromCandidatById($id, $pdo)
{
    $query = "SELECT L.lang_id FROM candidat_language AS CL 
    INNER JOIN language AS L 
    INNER JOIN candidat as C 
        ON CL.cand_id = C.cand_id 
               AND CL.lang_id = L.lang_id 
    WHERE C.cand_id = :id";
    $statement = $pdo->prepare($query);
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getAllLanguageFromCandidatById($id, $pdo)
{
    $query = "SELECT L.lang_name FROM candidat_language AS CL 
    INNER JOIN language AS L 
    INNER JOIN candidat as C 
        ON CL.cand_id = C.cand_id 
               AND CL.lang_id = L.lang_id 
    WHERE C.cand_id = :id";
    $statement = $pdo->prepare($query);
    $statement->execute([
        ':id' => $id
    ]);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}


function insertCandidatwithLanguages($candName, $candEmail, $candDateDispo, $candMotivation, $candCv, $arrayLang, $pdo)
{
    //insert
    $sql = "INSERT INTO candidat( cand_name, cand_email, cand_dateDispo, cand_motivation, cand_cv)  
                            VALUES (:candName, :candEmail, :candDateDispo, :candMotivation, :candCv )";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute([
        ':candName' => $candName,
        ':candEmail' => $candEmail,
        ':candDateDispo' => $candDateDispo,
        ':candMotivation' => $candMotivation,
        ':candCv' => $_FILES['candCV']['name']
    ]);

    if ($result) {
        $uploaddir = '../public/upload/';
        $uploadfile = $uploaddir . basename($_FILES['candCV']['name']);

        if (move_uploaded_file($_FILES['candCV']['tmp_name'], $uploadfile)) {

        } else {
            $errors['upload'] = "erreur lors de l'upload du fichier";
        }

        $last_id = $pdo->lastInsertId();

        foreach ($arrayLang as $lang) {
            $sql2 = "INSERT INTO candidat_language( cand_id, lang_id)  
                            VALUES (:candId, :langId)";
            $statement2 = $pdo->prepare($sql2);
            $result2 = $statement2->execute([
                ':candId' => $last_id,
                ':langId' => $lang,
            ]);
        }

        return true;
    } else {
        return false;
    }
}

function deleteCandidatwithById($id, $pdo)
{
    $sql = "DELETE FROM candidat WHERE cand_id = :id";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([':id' => $id]);

    if (!$result) {
        return 0;
    } else {
        return $id;
    }
}


function updateCandidatwithLanguages($candName, $candEmail, $candDateDispo, $candMotivation, $candCv, $arrayLang, $id, $pdo)
{
    //insert
    $sql = "UPDATE candidat set cand_name = :candName ,
                                cand_email = :candEmail,
                                cand_dateDispo = :candDateDispo,
                                cand_motivation = :candMotivation,
                                cand_cv  = :candCv
                            WHERE cand_id = :candId;
                           ";
    $statement = $pdo->prepare($sql);
    $result = $statement->execute([
        ':candName' => $candName,
        ':candEmail' => $candEmail,
        ':candDateDispo' => $candDateDispo,
        ':candMotivation' => $candMotivation,
        ':candCv' => $_FILES['candCV']['name'],
        ':candId' => $id
    ]);

    if ($result) {
        $uploaddir = '../public/upload/';
        $uploadfile = $uploaddir . basename($_FILES['candCV']['name']);

        if (move_uploaded_file($_FILES['candCV']['tmp_name'], $uploadfile)) {
            echo "upload ok";
        } else {
            echo "probleme upload";
        }

        $sqldelete = "DELETE FROM candidat_language WHERE cand_id = :candId";
        $statementDelete = $pdo->prepare($sqldelete);
        $resultDelete = $statementDelete->execute([':candId' => $id]);

        foreach ($arrayLang as $lang) {
            $sql2 = "INSERT INTO candidat_language( cand_id, lang_id)  
                            VALUES (:candId, :langId)";
            $statement2 = $pdo->prepare($sql2);
            $result2 = $statement2->execute([
                ':candId' => $id,
                ':langId' => $lang,
            ]);
        }
        return true;
    } else {
        return false;
    }
}
