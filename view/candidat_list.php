<?php
include '../partials/header.php';

//action après suppression
if (isset($_GET['delete'])) {
    $code = $_GET['delete'];
    switch ($code) {
        case 0:
            echo "La requête a planté";
            break;
        default:
            echo "<b style='color: red'>Le candidat $code a bien été supprimé</b>";
    }
} else if (isset($_GET['update'])) {
    $code = $_GET['update'];
    echo "<b style='color: green'>Le candidat $code a bien été modifié</b>";
}
?>


<table class="table">
    <thead>
    <tr>
        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">Date de disponibilité</th>
        <th scope="col">CV</th>
        <th scope="col"></th>

    </tr>
    </thead>
    <tbody>

    <?php foreach ($candidats as $candidat) {
        echo "
<tr>
        <td>" . $candidat['cand_name'] . "</td>
        <td>{$candidat['cand_email']}</td>
        <td>{$candidat['cand_dateDispo']}</td>
        <td><a target='_blank' href='/upload/{$candidat['cand_cv']}'>CV</a></td>

        <td>
            <a class='btn btn-info' href ='viewCandidat?id={$candidat['cand_id']}'> Afficher</a >
            <a class='btn btn-success' href ='updateCandidat?id={$candidat['cand_id']}' > Modifier</a >
            <a class='btn btn-danger' href ='deleteCandidat?id={$candidat['cand_id']}'
               onclick ='if (!confirm(\"Etes vous sur de vouloir supprimer cette candidature ? \")) return false;' >
                   Supprimer
            </a >
        </td >
    ";
    } ?>


    </tr>

    </tbody>
</table>
<?php include '../partials/footer.php'; ?>
