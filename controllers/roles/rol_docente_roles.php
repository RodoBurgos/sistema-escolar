<?php
    //include("../../app/config.php");

    $sql = "SELECT id_roles,nombre as rol FROM roles WHERE nombre = 'DOCENTE' AND estado = '1'";
    $query_roles = $pdo->prepare($sql);
    $query_roles->execute();

    $roles = $query_roles->fetchAll(PDO::FETCH_ASSOC);

    foreach ($roles as $rol)
    {
        $rol["id_roles"];
        $rol["rol"];
    }
    