<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script
            src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>
<style>
    tr, td {
        text-align: center;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Cantidatures</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor02">

            <?php

            //base du site pour gerer les urls
            define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME']);
            if (isset($_SESSION['user']) && $_SESSION['log'] == 1) { ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo BASE_URL . "/candidats"; ?>">
                            Liste des candidats
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>">
                            Ajouter une candidature
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo BASE_URL . "/languageNumber"; ?>">
                            Nombre de personnes par langages
                        </a>
                    </li>


                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . "/logout"; ?>">
                            Deconnexion
                        </a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL . "/login"; ?>">
                            Login
                        </a>
                    </li>
                </ul>
            <?php } ?>


        </div>
    </div>
</nav>
<br>
<div class="container">
