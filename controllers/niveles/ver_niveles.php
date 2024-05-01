<?php
    //include("../../app/config.php");
    $id_niveles = $_GET["id"];

    $sql = "SELECT n.*, g.nombre as gestion FROM niveles as n INNER JOIN gestiones as g ON n.gestion_id=g.id_gestiones 
    AND n.id_niveles=$id_niveles";
    $query_niveles = $pdo->prepare($sql);
    $query_niveles->execute();

    $niveles = $query_niveles->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($niveles as $datos_nivel)
    {
        //$id_roles = $datos_rol['id_roles'];
        $nivel_nivel = $datos_nivel['nivel'];
        $turno_nivel = $datos_nivel['turno'];
        $gestion_nivel = $datos_nivel['gestion'];
        $estado_nivel = $datos_nivel['estado'];
        $fyh_creacion_nivel = $datos_nivel['fyh_creacion'];
        $fyh_actualizacion_nivel = $datos_nivel['fyh_actualizacion'];
    }