<?php
include '../partials/header.php';

//titre
if (isset($_GET['id'])) {
    echo "<h1>MODIFIER LA CANDIDATURE</h1>";
} else {
    echo "<h1>SOUMETTEZ VOTRE CANDIDATURE</h1>";
}

if (isset($message)) {
    echo "<p>$message</p>";
    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li style='color: red'>$error</li>";
        }
        echo "</ul>";
    }
}
?>
<form method="POST" enctype="multipart/form-data">
    <fieldset>
        <div class="form-group row">
            <label for="candName" class="col-sm-10 col-form-label">Nom :</label><br>
            <input class="form-control" type="text" minlength="3" id="candName" name="candName" value="<?php echo $candName ?>"
                   required>
        </div>

        <div class="form-group row">
            <label for="candEmail" class="col-sm-10 col-form-label">Email :</label><br>
            <input type="email" class="form-control" name="candEmail" id="candEmail" required placeholder="Votre email"
                   value="<?php echo $candEmail ?>"
                   pattern="[a-zA-Z0-9\-_]+@[a-zA-Z0-9\-_]+\.[a-z]{2,}"/>
        </div>

        <div class="form-group row">
            <label for="candDispo" class="col-sm-10 col-form-label">Date de disponibilité :</label><br>
            <input class="form-control" id="candDispo" type="date" name="candDispo" required
                   value="<?php echo $candDispo ?>" pattern="\d{4}-\d{2}-\d{2}">
        </div>

        <div class="form-group row">
            <label for="candMotiv" class="col-sm-10 col-form-label">Message de motivation :</label><br>
            <textarea class="form-control" id="candMotiv" name="candMotiv"><?php echo $candMotiv ?></textarea>
        </div>


        <div class="form-group row">

            <label for="candLang" class="col-sm-10 col-form-label">Categorie: </label><br>
            <select multiple="" class="form-control" id="candLang" name="candLang[]" required>

                <?php

                foreach ($languages as $lang) {
                    if (in_array($lang['lang_id'], $selectedLang)) {
                        echo "<option selected value='{$lang['lang_id']}' >{$lang['lang_name']}</option>";
                    } else {
                        echo "<option  value='{$lang['lang_id']}' >{$lang['lang_name']}</option>";
                    }

                } ?>

            </select>

        </div>

        <div class="form-group row">
            <label class="col-sm-10 col-form-label" for="exampleInputFile">CV</label>
            <input type="file" class="form-control-file" id="candCV" name="candCV" aria-describedby="fileHelp" required>
            <small id="candCV" class="form-text text-muted">Choissiez votre cv en format PDF</small>

        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enregister</button>
    </fieldset>
</form>
<?php include '../partials/footer.php'; ?>
