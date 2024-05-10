<?php
    //include("../../app/config.php");

    $sql = "SELECT p.*,u.id_usuarios,u.usuario,u.email,r.nombre as rol,a.id_administrativos FROM administrativos as a 
    INNER JOIN personas as p ON a.persona_id=p.id_personas  
    INNER JOIN usuarios as u ON u.persona_id=p.id_personas 
    INNER JOIN roles as r ON u.rol_id=r.id_roles WHERE p.estado='1'";
    $query_administrativos = $pdo->prepare($sql);
    $query_administrativos->execute();

    $administrativos = $query_administrativos->fetchAll(PDO::FETCH_ASSOC);
    