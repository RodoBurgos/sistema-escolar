<?php
    include('../../app/config.php');

    $id = $_POST["id_usuario"];
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $rol_id = $_POST["rol_id"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];

    if ($dni == "" || $nombre == "" || $apellido == "" || $rol_id == "" || $usuario == "" || $email == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor llene todos los campos.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/usuarios/edit.php?id=$id");
    }
    else
    {
        //Consulta si el email de usuario ya existe en la BD
        $consulta = $pdo->prepare("SELECT email FROM usuarios WHERE email = :email AND id_usuarios != :id");
        $consulta->bindParam(':id',$id);
        $consulta->bindParam(':email', $email);
        $consulta->execute();

        $email_usuario = $consulta->fetch(PDO::FETCH_ASSOC);

        if($email_usuario)
        {
            session_start();
            $_SESSION['mensaje'] = "Este email ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/usuarios/edit.php?id=$id");
        }
        else
        {            
            $sentencia = $pdo->prepare("UPDATE usuarios SET dni=:dni, nombre=:nombre, apellido=:apellido, email=:email,
            usuario=:usuario, rol_id=:rol_id, fyh_actualizacion=:fecha WHERE id_usuarios=:id");

            $sentencia->bindParam(':id',$id);
            $sentencia->bindParam(':dni',$dni);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':apellido',$apellido);
            $sentencia->bindParam(':email',$email);
            $sentencia->bindParam(':usuario',$usuario);
            $sentencia->bindParam(':rol_id',$rol_id);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "El usuario se actualizo correctamente.";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/usuarios/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo actualizar el usuario, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/usuarios/edit.php?id=$id");
            }
        }
    }