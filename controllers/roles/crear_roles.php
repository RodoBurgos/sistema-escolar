<?php
    include('../../app/config.php');

    $nombre = $_POST["nombre"];
    $nombre = mb_strtoupper($nombre);//pone todo el nombre en mayúscula
    

    //Verifica que la variable nombre no este vació
    if($nombre == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese un nombre de rol.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/roles/create.php");
    }
    else
    {
        //Consulta si el rol ya existe en la BD
        $consulta = $pdo->prepare("SELECT nombre FROM roles WHERE nombre = :nombre");
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();

        $roles = $consulta->fetch(PDO::FETCH_ASSOC);

        if($roles)
        {
            session_start();
            $_SESSION['mensaje'] = "Este rol ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/roles/create.php");
        }
        else
        {
            $sentencia = $pdo->prepare("INSERT INTO roles(nombre,estado,fyh_creacion) 
            VALUES(:nombre,:estado,:fecha)");

            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':estado',$estado);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "El rol se registro correctamente";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/roles/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo registrar el rol, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/roles/create.php");
            }
        }
    }