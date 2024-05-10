<?php
    include('../../app/config.php');

    $id_persona = $_POST['id_personas'];
    $id_usuario = $_POST['id_usuarios'];
    $id_docente = $_POST['id_docentes'];
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

    //********** TABLA DOCENTES **********//
    $sentencia = $pdo->prepare("UPDATE docentes SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_docentes=:id_docente");
    $sentencia->bindParam(':id_docente',$id_docente);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);

    if($sentencia->execute())
    {
        $pdo->commit();
        session_start();
        $_SESSION['mensaje'] = "El personal docente se elimino de la manera correcta.";
        $_SESSION['icono'] = "success";

        header("location:".APP_URL."/vistas/docentes/");
    }
    else
    {
        $pdo->rollBack();
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar al personal docente, comuníquese con el Administrador.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/docentes/");
    }