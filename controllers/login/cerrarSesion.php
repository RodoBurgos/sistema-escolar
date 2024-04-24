<?php
    include("../../app/config.php");

    session_start();

    if (isset($_SESSION['usuario']))
    {
        session_destroy();
        header("location: ".APP_URL);
    }