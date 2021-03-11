<?php
include '../partials/header.php';

?>


<table class="table">
    <thead>
    <tr>
        <th scope="col">Language</th>
        <th scope="col">Nombre d'utilisateur</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($languageNumber as $langNum) {
        echo "
<tr>
        <td>" . $langNum['lang_name'] . "</td>
        <td>{$langNum['number']}</td>";
    } ?>


    </tr>

    </tbody>
</table>
<?php include '../partials/footer.php'; ?>
