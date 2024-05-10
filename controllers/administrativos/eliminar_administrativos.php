<?php
    include('../../app/config.php');

    $id_persona = $_POST['id_personas'];
    $id_usuario = $_POST['id_usuarios'];
    $id_administrativo = $_POST['id_administrativos'];
    $inactivo = 0;

    $pdo->beginTransaction();

    //********** TABLA PERSONAS **********//
    $sentencia = $pdo->prepare("UPDATE personas SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_personas=:id_persona");
    $sentencia->bindParam(':id_persona',$id_persona);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);
    $sentencia->execute();

    //********** TABLA USUARIOS **********//
    $sentencia = $pdo->prepare("UPDATE usuarios SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_usuarios=:id_usuario");
    $sentencia->bindParam(':id_usuario',$id_usuario);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);
    $sentencia->execute();

    //********** TABLA ADMINISTRATIVOS **********//
    $sentencia = $pdo->prepare("UPDATE administrativos SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_administrativos=:id_administrativo");
    $sentencia->bindParam(':id_administrativo',$id_administrativo);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);

    if($sentencia->execute())
    {
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "El personal administrativo se elimino de la manera correcta.";
        $_SESSION['icono'] = "success";

        header("location:".APP_URL."/vistas/administrativos/");
    }
    else
    {
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar al personal administrativo, comuníquese con el Administrador.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/administrativos/");
    }