<?php
    $id_persona = $_GET['id'];

    $query = $pdo->prepare("SELECT p.*,a.id_administrativos,u.id_usuarios,u.usuario,u.email,r.nombre as rol FROM administrativos as a 
    INNER JOIN personas as p ON a.persona_id=p.id_personas  
    INNER JOIN usuarios as u ON u.persona_id=p.id_personas 
    INNER JOIN roles as r ON u.rol_id=r.id_roles WHERE p.id_personas = :id_persona");
    $query->bindParam(':id_persona', $id_persona);
    $query->execute();

    $personas = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($personas as $dato)
    {
        //Tabla personas
        $dni_persona = $dato["dni"];
        $nombre_persona = $dato["nombre"];
        $apellido_persona = $dato["apellido"];
        $direccion_persona = $dato["direccion"];
        $celular_persona = $dato["celular"];
        $f_nacimiento_persona = $dato["f_nacimiento"];
        $profesion_persona = $dato["profesion"];
        $estado_persona = $dato["estado"];
        $fyh_creacion_persona = $dato["fyh_creacion"];
        $fyh_actualizacion_persona = $dato["fyh_actualizacion"];

        //Tabla usuarios
        $id_usuario = $dato["id_usuarios"];
        $usuario_persona = $dato["usuario"];
        $email_persona = $dato["email"];

        //Tabla rol
        $rol_persona = $dato["rol"];

        //Tabla administrativo
        $id_administrativo = $dato["id_administrativos"];
    }