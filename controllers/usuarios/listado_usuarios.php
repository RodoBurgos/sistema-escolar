<?php
    //include("../../app/config.php");

    $sql = "SELECT u.*,r.nombre as rol FROM usuarios as u INNER JOIN roles as r ON u.rol_id=r.id_roles WHERE u.estado='ACTIVO'";
    $query_usuarios = $pdo->prepare($sql);
    $query_usuarios->execute();

    $usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
    