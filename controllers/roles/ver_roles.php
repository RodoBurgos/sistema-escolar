<?php
    $id_rol = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM roles WHERE id_roles = :id_rol");
    $query->bindParam(':id_rol', $id_rol);
    $query->execute();

    $roles = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($roles as $datos_rol)
    {
        //$id_roles = $datos_rol['id_roles'];
        $nombre_rol = $datos_rol['nombre'];
        $estado_rol = $datos_rol['estado'];
        $fyh_creacion_rol = $datos_rol['fyh_creacion'];
        $fyh_actualizacion_rol = $datos_rol['fyh_actualizacion'];
    }