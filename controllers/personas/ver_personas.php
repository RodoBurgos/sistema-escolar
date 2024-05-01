<?php
    $id_personas = $_GET['id'];

    $query = $pdo->prepare("SELECT * FROM personas WHERE id_personas = :id_personas");
    $query->bindParam(':id_personas', $id_personas);
    $query->execute();

    $personas = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($personas as $datos_persona)
    {
        //$id_personas = $datos_persona['id_personas'];
        $dni_persona = $datos_persona['dni'];
        $nombre_persona = $datos_persona['nombre'];
        $apellido_persona = $datos_persona['apellido'];
        $direccion_persona = $datos_persona['direccion'];
        $celular_persona = $datos_persona['celular'];
        $f_nacimiento_persona = $datos_persona['f_nacimiento'];
        $profesion_persona = $datos_persona['profesion'];
        $estado_persona = $datos_persona['estado'];
        $fyh_creacion_persona = $datos_persona['fyh_creacion'];
        $fyh_actualizacion_persona = $datos_persona['fyh_actualizacion'];
    }