<?php
include '../partials/header.php';
setlocale(LC_TIME, "fr_FR");
?>

<h1>Information sur <?php echo $candidat['cand_name']; ?></h1>

<p>Email : <a href="mailto:<?php echo $candidat['cand_email']; ?>"><?php echo $candidat['cand_email']; ?></a></p>

<p>Disponible à partir du : <?php echo $candidat['cand_dateDispo']; ?></p>

<h6>Langages :</h6>
<ul>
    <?php foreach ($candLanguages as $lang) {
        echo "<li>{$lang['lang_name']}</li>";
    } ?>
</ul>
<h6>Message :</h6>
<p><?php echo $candidat['cand_motivation']; ?></p>
<p>
    <?php echo "<a target=\"_blank\" href=\"/upload/{$candidat['cand_cv']}\">Voir le CV</a>" ?>
</p>

<?php
include '../partials/footer.php';
?>

