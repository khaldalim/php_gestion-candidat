<?php

require '../database.php';


function logout()
{

    session_destroy();
    header('Location: login');
}
