<?php
    //include("../../app/config.php");
    $id_niveles = $_GET["id"];

    $sql = "SELECT n.*, g.nombre as gestion, CONCAT(u.nombre,' ',u.apellido) as usuario FROM niveles as n INNER JOIN gestiones as g ON n.gestion_id=g.id_gestiones 
    INNER JOIN usuarios as u ON n.usuario_id=u.id_usuarios AND n.id_niveles=$id_niveles";
    $query_niveles = $pdo->prepare($sql);
    $query_niveles->execute();

    $niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($niveles as $datos_nivel)
    {
        //$id_roles = $datos_rol['id_roles'];
        $nivel = $datos_nivel['nivel'];
        $turno = $datos_nivel['turno'];
        $gestion = $datos_nivel['gestion'];
        $usuario = $datos_nivel['usuario'];
        $estado_rol = $datos_nivel['estado'];
        $fyh_creacion_rol = $datos_nivel['fyh_creacion'];
        $fyh_actualizacion_rol = $datos_nivel['fyh_actualizacion'];
    }