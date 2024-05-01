<?php
    //include("../../app/config.php");

    $sql = "SELECT * FROM materias WHERE estado = '1'";
    $query_materias = $pdo->prepare($sql);
    $query_materias->execute();

    $materias = $query_materias->fetchAll(PDO::FETCH_ASSOC);
    