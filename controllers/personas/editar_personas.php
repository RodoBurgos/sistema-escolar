<?php
    include('../../app/config.php');

    $id = $_POST["id_personas"];
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $direccion = $_POST["direccion"];
    $celular = $_POST["celular"];
    $f_nacimiento = $_POST["f_nacimiento"];
    $profesion = $_POST["profesion"];

    $profesion = mb_strtoupper($profesion);//pone todo el nombre en mayúscula
    

    //Verifica que la variable nombre no este vació
    if($dni == "" || $nombre == "" || $apellido == "" || $direccion == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese ingrese un dni, nombre, apellido y/o dirección.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/personas/edit.php?id=$id");
    }
    else
    {
        //Consulta si la persona ya existe en la BD
        $consulta = $pdo->prepare("SELECT dni FROM personas WHERE dni = :dni AND id_personas != :id");
        $consulta->bindParam(':id', $id);
        $consulta->bindParam(':dni', $dni);
        $consulta->execute();

        $personas = $consulta->fetch(PDO::FETCH_ASSOC);

        if($personas)
        {
            session_start();
            $_SESSION['mensaje'] = "Esta persona ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/personas/edit.php?id=$id");
        }
        else
        {
            $sentencia = $pdo->prepare("UPDATE personas SET dni=:dni, nombre=:nombre, apellido=:apellido, direccion=:direccion, celular=:celular,
            f_nacimiento=:f_nacimiento, profesion=:profesion, fyh_actualizacion=:fecha WHERE id_personas=:id");

            $sentencia->bindParam(':id',$id);
            $sentencia->bindParam(':dni',$dni);
            $sentencia->bindParam(':nombre',$nombre);
            $sentencia->bindParam(':apellido',$apellido);
            $sentencia->bindParam(':direccion',$direccion);
            $sentencia->bindParam(':celular',$celular);
            $sentencia->bindParam(':f_nacimiento',$f_nacimiento);
            $sentencia->bindParam(':profesion',$profesion);
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "La persona se actualizo correctamente.";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/personas/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo actualizar a la persona, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/personas/edit.php?id=$id");
            }
        }
    }