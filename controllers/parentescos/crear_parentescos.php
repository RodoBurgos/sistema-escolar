<?php
    include('../../app/config.php');

    $nombre = $_POST["nombre"];
    $nombre = mb_strtoupper($nombre);//pone todo el nombre en mayúscula
    

    //Verifica que la variable nombre no este vació
    if($nombre == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese un nombre del parentesco familiar.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/parentescos/create.php");
    }
    else
    {
        //Consulta si el parentesco ya existe en la BD
        $consulta = $pdo->prepare("SELECT nombre FROM parentescos WHERE nombre = :nombre");
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();

        $parentescos = $consulta->fetch(PDO::FETCH_ASSOC);

        if($parentescos)
        {
            session_start();
            $_SESSION['mensaje'] = "Este parentesco familiar ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/parentescos/create.php");
        }
        else
        {
            $sentencia = $pdo->prepare("INSERT INTO parentescos(nombre,estado,fyh_creacion) 
            VALUES(:nombre,:estado,:fecha)");

            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':estado',$estado);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "El parentesco familiar se registro correctamente.";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/parentescos/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo registrar el parentesco familiar, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/parentescos/create.php");
            }
        }
    }