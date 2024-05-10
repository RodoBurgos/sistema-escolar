<?php
    $id_persona = $_GET['id'];

    $query = $pdo->prepare("SELECT p.*,d.id_docentes,d.especialidad,d.antiguedad,u.id_usuarios,u.usuario,u.email,r.nombre as rol 
    FROM docentes as d 
    INNER JOIN personas as p ON d.persona_id=p.id_personas  
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
        $id_usuario_persona = $dato["id_usuarios"];
        $usuario_persona = $dato["usuario"];
        $email_persona = $dato["email"];

        //Tabla roles
        $rol_persona = $dato["rol"];

        //Tabla docente
        $id_docentes_persona = $dato["id_docentes"];
        $especialidad_persona = $dato["especialidad"];
        $antiguedad_persona = $dato["antiguedad"];
    }