<?php
    include("../../../app/config.php");

    $id_instituciones = $_POST["id_instituciones"];
    $usuario_id = $_POST["usuario_id"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $celular = $_POST["celular"];
    //$logo = $_FILES["logo"]["name"];

    if($nombre == "" || $direccion == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese un nombre y/o una dirección.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/configuraciones/instituciones/edit.php?id=$id_instituciones");
    }
    else
    {
        if ($_FILES['imagen']['name'] != null)
        {
            
            $nombreDelArchivo = date('Y-m-d H-i-s');
            $logo_nuevo = $nombreDelArchivo."__".$_FILES['imagen']['name'];
            $location = "../../../public/img/logos/".$logo_nuevo;

            move_uploaded_file($_FILES['imagen']['tmp_name'], $location);

            $sentencia = $pdo->prepare("UPDATE instituciones SET nombre=:nombre, direccion=:direccion, email=:email,
            telefono=:telefono, celular=:celular, logo=:logo_nuevo, usuario_id=:usuario_id, fyh_actualizacion=:fecha 
            WHERE id_instituciones=:id_instituciones");

            $sentencia->bindParam(':id_instituciones',$id_instituciones);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':direccion',$direccion);
            $sentencia->bindParam(':email',$email);
            $sentencia->bindParam(':telefono',$telefono);
            $sentencia->bindParam(':celular',$celular);
            $sentencia->bindParam(':logo_nuevo',$logo_nuevo);
            $sentencia->bindParam(':usuario_id',$usuario_id);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "Los datos de la Institución se actualizo de la manera correcta.";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/configuraciones/instituciones/show.php");
            }
            else
            {
                //echo "Error al guardar";
                session_start();
                $_SESSION['mensaje'] = "No se pudo actualizar los datos de la Institución, comuníquese con el Administrador.";
                $_SESSION['icono'] = 'error';

                header("location:".APP_URL."/vistas/configuraciones/instituciones/edit.php?id=$id_instituciones");
            }
        }
        else
        {
            $sentencia = $pdo->prepare("UPDATE instituciones SET nombre=:nombre, direccion=:direccion, email=:email,
            telefono=:telefono, celular=:celular, usuario_id=:usuario_id, fyh_actualizacion=:fecha 
            WHERE id_instituciones=:id_instituciones");

            $sentencia->bindParam(':id_instituciones',$id_instituciones);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':direccion',$direccion);
            $sentencia->bindParam(':email',$email);
            $sentencia->bindParam(':telefono',$telefono);
            $sentencia->bindParam(':celular',$celular);
            $sentencia->bindParam(':usuario_id',$usuario_id);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "Los datos de la Institución se actualizo de la manera correcta.";
                $_SESSION['icono'] = 'success';

                header("location:".APP_URL."/vistas/configuraciones/instituciones/show.php");
            }
            else
            {
                //echo "Error al guardar";
                session_start();
                $_SESSION['mensaje'] = "No se pudo actualizar los datos de la Institución, comuníquese con el Administrador.";
                $_SESSION['icono'] = 'error';

                header("location:".APP_URL."/vistas/configuraciones/instituciones/edit.php?id=$id_instituciones");
            }
        }
    }