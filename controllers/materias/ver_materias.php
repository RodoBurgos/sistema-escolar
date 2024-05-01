<?php
    $id_materias = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM materias WHERE id_materias = :id_materias");
    $query->bindParam(':id_materias', $id_materias);
    $query->execute();

    $materias = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($materias as $datos_materia)
    {
        //$id_materias = $datos_materia['id_materias'];
        $nombre_materia = $datos_materia['nombre'];
        $estado_materia = $datos_materia['estado'];
        $fyh_creacion_materia = $datos_materia['fyh_creacion'];
        $fyh_actualizacion_materia = $datos_materia['fyh_actualizacion'];
    }