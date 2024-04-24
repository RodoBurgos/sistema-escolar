<?php
    //$id = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM instituciones");
    //$query->bindParam(':id', $id);
    $query->execute();

    $instituciones = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($instituciones as $datos_inst)
    {
        $id_instituciones = $datos_inst['id_instituciones'];
        $nombre_instituciones = $datos_inst['nombre'];
        $direccion_instituciones = $datos_inst['direccion'];
        $email_instituciones = $datos_inst['email'];
        $telefono_instituciones = $datos_inst['telefono'];
        $celular_instituciones = $datos_inst['celular'];
        $logo_instituciones = $datos_inst['logo'];

        $fyh_creacion_instituciones = $datos_inst['fyh_creacion'];
        $fyh_actualizacion_instituciones = $datos_inst['fyh_actualizacion'];
    }