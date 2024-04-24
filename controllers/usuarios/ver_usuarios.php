<?php
    $id_usuario = $_GET['id'];

    $query = $pdo->prepare("SELECT u.*,r.nombre as rol FROM usuarios as u INNER JOIN roles as r ON u.rol_id=r.id_roles WHERE u.id_usuarios='$id_usuario'");
    $query->bindParam(':id_usuario', $id_usuario);
    $query->execute();

    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios as $datos)
    {
        //$id_roles = $datos_rol['id_roles'];
        $dni_usuario = $datos['dni'];
        $nombre_usuario = $datos['nombre'];
        $apellido_usuario = $datos['apellido'];
        $rol_usuario = $datos['rol'];
        $usuario_usuario = $datos['usuario'];
        $email_usuario = $datos['email'];
        $estado_usuario = $datos['estado'];

        $fyh_creacion_usuario = $datos['fyh_creacion'];
        $fyh_actualizacion_usuario = $datos['fyh_actualizacion'];
    }