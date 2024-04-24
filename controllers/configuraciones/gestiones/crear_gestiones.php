<?php
    include("../../../app/config.php");

    $nombre = $_POST["nombre"];
    $usuario_id = $_POST["usuario_id"];
    $estado_form = $_POST["estado"];

    $nombre = mb_strtoupper($nombre);//pone todo el nombre en mayúscula

    if($nombre == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese un nombre a la gestión.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/configuraciones/gestiones/create.php");
    }
    else
    {
        //Consulta si la gestión ya existe en la BD
        $consulta = $pdo->prepare("SELECT nombre FROM gestiones WHERE nombre = :nombre");
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();

        $gestiones = $consulta->fetch(PDO::FETCH_ASSOC);

        if($gestiones)
        {
            session_start();
            $_SESSION['mensaje'] = "Esta gestión escolar ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/configuraciones/gestiones/create.php");
        }
        else
        {
            $sentencia = $pdo->prepare("INSERT INTO gestiones(nombre,usuario_id,estado,fyh_creacion) 
            VALUES(:nombre,:usuario_id,:estado,:fecha)");

            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':usuario_id',$usuario_id);
            $sentencia->bindParam(':estado',$estado_form);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "La gestión escolar se registro correctamente";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/configuraciones/gestiones/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo registrar esta gestión escolar, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/configuraciones/gestiones/create.php");
            }
        }
    }
    