<?php
    include('../../app/config.php');

    $id = $_POST["id_materias"];
    $nombre = $_POST["nombre"];
    $nombre = mb_strtoupper($nombre);//pone todo el nombre en mayúscula
    

    //Verifica que la variable nombre no este vació
    if($nombre == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese un nombre de una materia.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/materias/edit.php?id=$id");
    }
    else
    {
        //Consulta si la materia ya existe en la BD
        $consulta = $pdo->prepare("SELECT nombre FROM materias WHERE nombre = :nombre AND id_materias != :id");
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->execute();

        $roles = $consulta->fetch(PDO::FETCH_ASSOC);

        if($roles)
        {
            session_start();
            $_SESSION['mensaje'] = "Esta materia ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/materias/edit.php?id=$id");
        }
        else
        {
            $sentencia = $pdo->prepare("UPDATE materias SET nombre=:nombre,fyh_actualizacion=:fecha WHERE id_materias=:id");
            $sentencia->bindParam(':id',$id);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "La materia se registro correctamente.";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/materias/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo registrar la materia, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/materias/edit.php?id=$id");
            }
        }
    }