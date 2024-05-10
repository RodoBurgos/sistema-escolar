<?php
    include('../../app/config.php');

    //Para la tabla persona
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];
    $f_nacimiento = $_POST["f_nacimiento"];
    $profesion = $_POST["profesion"];

    $profesion = mb_strtoupper($profesion);//pone todo el nombre en mayúscula

    //Para la tabla usuarios
    $rol_id = $_POST["rol_id"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $contrasena2 = $_POST["contrasena2"];
    

    //Verifica que la variable nombre no este vació
    if($dni == "" || $nombre == "" || $apellido == "" || $direccion == "" || $usuario == "" || $email == "" || $contrasena == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor llene todos los campos.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/administrativos/create.php");
    }
    else
    {
        if ($contrasena == $contrasena2)
        {
            //Consulta si el dni de la persona ya existe en la BD
            $consulta = $pdo->prepare("SELECT dni FROM personas WHERE dni = :dni");
            $consulta->bindParam(':dni', $dni);
            $consulta->execute();

            $dni_persona = $consulta->fetch(PDO::FETCH_ASSOC);
            
            //Consulta si el email de usuario ya existe en la BD
            $consulta = $pdo->prepare("SELECT email FROM usuarios WHERE email = :email");
            $consulta->bindParam(':email', $email);
            $consulta->execute();

            $email_usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            if($dni_persona)
            {
                session_start();
                $_SESSION['mensaje'] = "Esta persona ya existe en la base de datos.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/administrativos/create.php");
            }
            else if($email_usuario)
            {
                session_start();
                $_SESSION['mensaje'] = "Este email ya existe en la base de datos.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/administrativos/create.php");
            }
            else
            {
                $pdo->beginTransaction();

                //*************** INSERTA EN LA TABLA PERSONAS ***************//
                $sentencia = $pdo->prepare("INSERT INTO personas(dni,nombre,apellido,direccion,celular,f_nacimiento,profesion,estado,fyh_creacion) 
                VALUES(:dni,:nombre,:apellido,:direccion,:celular,:f_nacimiento,:profesion,:estado,:fecha)");

                $sentencia->bindParam(':dni',$dni);
                $sentencia->bindParam(':nombre',$nombre);
                $sentencia->bindParam(':apellido',$apellido);
                $sentencia->bindParam(':direccion',$direccion);
                $sentencia->bindParam(':celular',$celular);
                $sentencia->bindParam(':f_nacimiento',$f_nacimiento);
                $sentencia->bindParam(':profesion',$profesion);
                $sentencia->bindParam(':estado',$estado);
                $sentencia->bindParam(':fecha',$fecha);
                $sentencia->execute();

                //Trae el ultimo id insertado en la tabla personas
                $persona_id = $pdo->lastInsertId();

                // Encripta la contraseña
                $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
                
                //*************** INSERTA EN LA TABLA USUARIOS ***************//
                $sentencia = $pdo->prepare("INSERT INTO usuarios(rol_id,persona_id,email,usuario,contrasena,estado,fyh_creacion) 
                VALUES(:rol_id,:persona_id,:email,:usuario,:contrasena,:estado,:fecha)");

                $sentencia->bindParam(':rol_id',$rol_id);
                $sentencia->bindParam(':persona_id',$persona_id);
                $sentencia->bindParam(':email',$email);
                $sentencia->bindParam(':usuario',$usuario);
                $sentencia->bindParam(':contrasena',$contrasena);
                $sentencia->bindParam(':estado',$estado);
                $sentencia->bindParam(':fecha',$fecha);
                $sentencia->execute();

                //*************** INSERTA EN LA TABLA administrativos ***************//
                $sentencia = $pdo->prepare("INSERT INTO administrativos(persona_id,estado,fyh_creacion) 
                VALUES(:persona_id,:estado,:fecha)");

                $sentencia->bindParam(':persona_id',$persona_id);
                $sentencia->bindParam(':estado',$estado);
                $sentencia->bindParam(':fecha',$fecha);

                if($sentencia->execute())
                {
                    $pdo->commit();
                    session_start();
                    $_SESSION['mensaje'] = "El personal administrativo se registro correctamente.";
                    $_SESSION['icono'] = "success";

                    header("location:".APP_URL."/vistas/administrativos/");
                }
                else
                {
                    $pdo->rollBack();
                    session_start();
                    $_SESSION['mensaje'] = "No se pudo registrar al personal administrativo, comuníquese con el Administrador.";
                    $_SESSION['icono'] = "error";

                    header("location:".APP_URL."/vistas/administrativos/create.php");
                }
            }
        }
        else
        {
            session_start();
            $_SESSION['mensaje'] = "Error las contraseñas no son iguales.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/administrativos/create.php");
        }
    }