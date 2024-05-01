<?php
    include("../../../app/config.php");

    $id_gestiones = $_POST["id_gestiones"];
    $nombre = $_POST["nombre"];
    $estado_form = $_POST["estado"];

    $nombre = mb_strtoupper($nombre);//pone todo el nombre en mayúscula

    if($nombre == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese un nombre a la gestión.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/configuraciones/gestiones/edit.php?id=$id_gestiones");
    }
    else
    {
        //Consulta si la gestión ya existe en la BD
        $consulta = $pdo->prepare("SELECT nombre FROM gestiones WHERE nombre = :nombre AND id_gestiones != :id_gestiones");
        $consulta->bindParam(':id_gestiones', $id_gestiones);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();

        $gestiones = $consulta->fetch(PDO::FETCH_ASSOC);

        if($gestiones)
        {
            session_start();
            $_SESSION['mensaje'] = "Esta gestión escolar ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/configuraciones/gestiones/edit.php?id=$id_gestiones");
        }
        else
        {
            $sentencia = $pdo->prepare("UPDATE gestiones SET nombre=:nombre, estado=:estado_form, 
            fyh_actualizacion=:fecha WHERE id_gestiones = :id_gestiones");

            $sentencia->bindParam(':id_gestiones',$id_gestiones);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':estado_form',$estado_form);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "La gestión escolar se actualizo correctamente";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/configuraciones/gestiones/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo actualizar esta gestión escolar, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/configuraciones/gestiones/edit.php?id=$id_gestiones");
            }
        }
    }