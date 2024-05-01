<?php
    //include("../../app/config.php");

    $sql = "SELECT * FROM personas WHERE estado = '1'";
    $query_personas = $pdo->prepare($sql);
    $query_personas->execute();

    $personas = $query_personas->fetchAll(PDO::FETCH_ASSOC);
    