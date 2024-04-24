<?php
    include('../../app/config.php');

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $nombre = mb_strtoupper($nombre);//pone todo el nombre en mayúscula
    

    //Verifica que la variable nombre no este vació
    if($nombre == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese un nombre de rol.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/roles/edit.php?id=$id");
    }
    else
    {
        //Consulta si el rol ya existe en la BD
        $consulta = $pdo->prepare("SELECT id_roles, nombre FROM roles WHERE nombre = :nombre AND id_roles != :id");
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();

        $roles = $consulta->fetch(PDO::FETCH_ASSOC);

        if($roles)
        {
            session_start();
            $_SESSION['mensaje'] = "Este rol ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/roles/edit.php?id=$id");
        }
        else
        {
            $sentencia = $pdo->prepare("UPDATE roles SET nombre=:nombre, fyh_actualizacion=:fecha WHERE id_roles=:id");

            $sentencia->bindParam(':id',$id);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "El rol se actualizo de la manera correcta";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/roles/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo actualizar el rol, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/roles/edit.php?id=$id");
            }
        }
    }