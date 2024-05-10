<?php
    include('../../app/config.php');

    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $nombre = mb_strtoupper($nombre);//pone todo el nombre en mayúscula
    

    //Verifica que la variable nombre no este vació
    if($nombre == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese un nombre del parentesco familiar.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/parentescos/edit.php?id=$id");
    }
    else
    {
        //Consulta si el parentesco ya existe en la BD
        $consulta = $pdo->prepare("SELECT id_parentescos, nombre FROM parentescos WHERE nombre = :nombre AND id_parentescos != :id");
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();

        $parentescos = $consulta->fetch(PDO::FETCH_ASSOC);

        if($parentescos)
        {
            session_start();
            $_SESSION['mensaje'] = "Este parentesco familiar ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/parentescos/edit.php?id=$id");
        }
        else
        {
            $sentencia = $pdo->prepare("UPDATE parentescos SET nombre=:nombre, fyh_actualizacion=:fecha WHERE id_parentescos=:id");

            $sentencia->bindParam(':id',$id);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "El parentesco familiar se actualizo de la manera correcta.";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/parentescos/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo actualizar el parentesco familiar, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/parentescos/edit.php?id=$id");
            }
        }
    }