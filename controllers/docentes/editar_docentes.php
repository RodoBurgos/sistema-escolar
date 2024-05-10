<?php
    include('../../app/config.php');

    //Para la tabla persona
    $id_persona = $_POST["id_persona"];
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];
    $f_nacimiento = $_POST["f_nacimiento"];
    $profesion = $_POST["profesion"];

    $profesion = mb_strtoupper($profesion);//pone todo el nombre en mayúscula

    //Para la tabla usuarios
    $id_usuario = $_POST["id_usuario"];
    $rol_id = $_POST["rol_id"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];

    //Para la tabla docentes
    $id_docente = $_POST["id_docente"];
    $especialidad = $_POST["especialidad"];
    $antiguedad = $_POST["antiguedad"];
    

    //Verifica que la variable nombre no este vació
    if($dni == "" || $nombre == "" || $apellido == "" || $direccion == "" || $usuario == "" || $email == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor llene todos los campos.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/docentes/edit.php?id=$id_persona");
    }
    else
    {
        //Consulta si el dni de la persona ya existe en la BD
        $consulta = $pdo->prepare("SELECT dni FROM personas WHERE dni = :dni AND id_personas != :id_persona");
        $consulta->bindParam(':id_persona', $id_persona);
        $consulta->bindParam(':dni', $dni);
        $consulta->execute();

        $dni_persona = $consulta->fetch(PDO::FETCH_ASSOC);
        
        //Consulta si el email de usuario ya existe en la BD
        $consulta = $pdo->prepare("SELECT email FROM usuarios WHERE email = :email AND id_usuarios != :id_usuario");
        $consulta->bindParam(':id_usuario', $id_usuario);
        $consulta->bindParam(':email', $email);
        $consulta->execute();

        $email_usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if($dni_persona)
        {
            session_start();
            $_SESSION['mensaje'] = "Esta persona ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/docentes/edit.php?id=$id_persona");
        }
        else if($email_usuario)
        {
            session_start();
            $_SESSION['mensaje'] = "Este email ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/docentes/edit.php?id=$id_persona");
        }
        else
        {
            $pdo->beginTransaction();

            //*************** ACTUALIZA EN LA TABLA PERSONAS ***************//
            $sentencia = $pdo->prepare("UPDATE personas SET dni=:dni, nombre=:nombre, apellido=:apellido, direccion=:direccion, 
            celular=:celular, f_nacimiento=:f_nacimiento, profesion=:profesion, fyh_actualizacion=:fecha 
            WHERE id_personas=:id_persona");

            $sentencia->bindParam(':id_persona',$id_persona);
            $sentencia->bindParam(':dni',$dni);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':apellido',$apellido);
            $sentencia->bindParam(':direccion',$direccion);
            $sentencia->bindParam(':celular',$celular);
            $sentencia->bindParam(':f_nacimiento',$f_nacimiento);
            $sentencia->bindParam(':profesion',$profesion);
            $sentencia->bindParam(':fecha',$fecha);
            $sentencia->execute();
            
            //*************** ACTUALIZA EN LA TABLA USUARIOS ***************//
            $sentencia = $pdo->prepare("UPDATE usuarios SET rol_id=:rol_id,email=:email,usuario=:usuario,
            fyh_actualizacion=:fecha WHERE id_usuarios=:id_usuario");

            $sentencia->bindParam(':id_usuario',$id_usuario);
            $sentencia->bindParam(':rol_id',$rol_id);
            $sentencia->bindParam(':email',$email);
            $sentencia->bindParam(':usuario',$usuario);
            $sentencia->bindParam(':fecha',$fecha);
            $sentencia->execute();

            //*************** ACTUALIZA EN LA TABLA DOCENTES ***************//
            $sentencia = $pdo->prepare("UPDATE docentes SET especialidad=:especialidad, antiguedad=:antiguedad, 
            fyh_actualizacion=:fecha WHERE id_docentes=:id_docente");

            $sentencia->bindParam(':id_docente',$id_docente);
            $sentencia->bindParam(':especialidad',$especialidad);
            $sentencia->bindParam(':antiguedad',$antiguedad);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                $pdo->commit();
                session_start();
                $_SESSION['mensaje'] = "El personal docente se actualizo correctamente.";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/docentes/");
            }
            else
            {
                $pdo->rollBack();
                session_start();
                $_SESSION['mensaje'] = "No se pudo actualizar al personal docente, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/docentes/edit.php?id=$id_persona");
            }
        }
    }