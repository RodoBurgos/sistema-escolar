<?php
    //include("../../app/config.php");

    $sql = "SELECT u.*,r.nombre as rol,p.dni,p.nombre,p.apellido FROM usuarios as u 
    INNER JOIN roles as r ON u.rol_id=r.id_roles 
    INNER JOIN personas as p ON u.persona_id=p.id_personas 
    WHERE u.estado='1'";
    $query_usuarios = $pdo->prepare($sql);
    $query_usuarios->execute();

    $usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
    