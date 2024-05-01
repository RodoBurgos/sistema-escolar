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
        $nivel_grados = $datos_grados['nivel'];
        $turno_grados = $datos_grados['turno'];
        $curso_grados = $datos_grados['curso'];
        $paralelo_grados = $datos_grados['paralelo'];
        $estado_grados = $datos_grados['estado'];
        $fyh_creacion_grados = $datos_grados['fyh_creacion'];
        $fyh_actualizacion_grados = $datos_grados['fyh_actualizacion'];
    }