<?php
function selectNumbersofUserOfLanguage($pdo){
    $sql = "SELECT L.lang_name, COUNT(*) as number FROM language as L INNER JOIN candidat_language AS CL ON L.lang_id = CL.lang_id GROUP BY L.lang_name";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
