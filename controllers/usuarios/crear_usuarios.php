<?php
    include('../../app/config.php');

    $persona_id = $_POST["persona_id"];
    $rol_id = $_POST["rol_id"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $contrasena2 = $_POST["contrasena2"];

    if ($persona_id == "" || $rol_id == "" || $usuario == "" || $email == "" || $contrasena == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor llene todos los campos.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/usuarios/create.php");
    }
    else
    {
        if ($contrasena == $contrasena2)
        {
            //Consulta si el email de usuario ya existe en la BD
            $consulta = $pdo->prepare("SELECT email FROM usuarios WHERE email = :email");
            $consulta->bindParam(':email', $email);
            $consulta->execute();

            $email_usuario = $consulta->fetch(PDO::FETCH_ASSOC);

            if($email_usuario)
            {
                session_start();
                $_SESSION['mensaje'] = "Este email ya existe en la base de datos.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/usuarios/create.php");
            }
            else
            {
                //Encripta la contraseña
                $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
                
                $sentencia = $pdo->prepare("INSERT INTO usuarios(rol_id,persona_id,email,usuario,contrasena,estado,fyh_creacion) 
                VALUES(:rol_id,:persona_id,:email,:usuario,:contrasena,:estado,:fecha)");

                $sentencia->bindParam(':rol_id',$rol_id);
                $sentencia->bindParam(':persona_id',$persona_id);
                $sentencia->bindParam(':email',$email);
                $sentencia->bindParam(':usuario',$usuario);
                $sentencia->bindParam(':contrasena',$contrasena);
                $sentencia->bindParam(':estado',$estado);
                $sentencia->bindParam(':fecha',$fecha);

                if($sentencia->execute())
                {
                    session_start();
                    $_SESSION['mensaje'] = "El usuario se registro correctamente.";
                    $_SESSION['icono'] = "success";

                    header("location:".APP_URL."/vistas/usuarios/");
                }
                else
                {
                    session_start();
                    $_SESSION['mensaje'] = "No se pudo registrar el usuario, comuníquese con el Administrador.";
                    $_SESSION['icono'] = "error";

                    header("location:".APP_URL."/vistas/usuarios/create.php");
                }
            }
        }
        else
        {
            session_start();
            $_SESSION['mensaje'] = "Error las contraseñas no son iguales.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/usuarios/create.php");
        }
    }