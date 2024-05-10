<?php
    //include("../../app/config.php");

    $sql = "SELECT p.*,u.id_usuarios,u.usuario,u.email,r.nombre as rol,d.id_docentes,d.especialidad,d.antiguedad 
        FROM docentes as d 
        INNER JOIN personas as p ON d.persona_id=p.id_personas 
        INNER JOIN usuarios as u ON u.persona_id=p.id_personas 
        INNER JOIN roles as r ON u.rol_id=r.id_roles WHERE p.estado='1'";
    $query_docentes = $pdo->prepare($sql);
    $query_docentes->execute();

    $docentes = $query_docentes->fetchAll(PDO::FETCH_ASSOC);
    