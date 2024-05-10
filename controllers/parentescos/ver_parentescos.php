<?php
    $id_parentesco = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM parentescos WHERE id_parentescos = :id_parentesco");
    $query->bindParam(':id_parentesco', $id_parentesco);
    $query->execute();

    $parentescos = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($parentescos as $datos)
    {
        //$id_parentescos = $datos['id_parentescos'];
        $nombre_parentesco = $datos['nombre'];
        $estado_parentesco = $datos['estado'];
        $fyh_creacion_parentesco = $datos['fyh_creacion'];
        $fyh_actualizacion_parentesco = $datos['fyh_actualizacion'];
    }