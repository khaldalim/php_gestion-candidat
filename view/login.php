<?php include '../partials/header.php'; ?>
<form method="POST" action="">
    <fieldset>
        <div class="form-group">
            <input class="form-control" type="email" name="email" required placeholder="Votre email"
                   pattern="[a-zA-Z0-9\-_]+@[a-zA-Z0-9\-_]+\.[a-z]{2,}"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" required placeholder="mot de passe"/><br>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </fieldset>
</form>
<?php include '../partials/footer.php'; ?>
