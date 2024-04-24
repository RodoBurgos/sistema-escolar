<?php
    $id = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM gestiones WHERE id_gestiones = :id");
    $query->bindParam(':id', $id);
    $query->execute();

    $gestiones = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($gestiones as $datos_gest)
    {
        $id_gestiones = $datos_gest['id_gestiones'];
        $nombre_gestiones = $datos_gest['nombre'];
        $estado_gestiones = $datos_gest['estado'];

        $fyh_creacion_gestiones = $datos_gest['fyh_creacion'];
        $fyh_actualizacion_gestiones = $datos_gest['fyh_actualizacion'];
    }