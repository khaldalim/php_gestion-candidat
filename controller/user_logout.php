<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['log'] == 1) {
    require '../model/user.php';
    logout();
}
else {
    header('Location: login?login=error');
}

