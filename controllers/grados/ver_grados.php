<?php
    //include("../../app/config.php");
    $id_grados = $_GET["id"];

    $sql = "SELECT g.*,n.nivel,n.turno FROM grados as g INNER JOIN niveles as n ON g.nivel_id=n.id_niveles AND g.id_grados=$id_grados";
    $query_grados = $pdo->prepare($sql);
    $query_grados->execute();

    $grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($grados as $datos_grados)
    {
        //$id_grados = $datos_grados['id_grados'];
        $nivel = $datos_grados['nivel'];
        $turno = $datos_grados['turno'];
        $curso = $datos_grados['curso'];
        $paralelo = $datos_grados['paralelo'];
        $estado_rol = $datos_grados['estado'];
        $fyh_creacion_rol = $datos_grados['fyh_creacion'];
        $fyh_actualizacion_rol = $datos_grados['fyh_actualizacion'];
    }