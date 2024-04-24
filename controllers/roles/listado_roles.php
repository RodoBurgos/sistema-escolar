<?php
    //include("../../app/config.php");

    $sql = "SELECT * FROM roles WHERE estado = 'Activo'";
    $query_roles = $pdo->prepare($sql);
    $query_roles->execute();

    $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);
    