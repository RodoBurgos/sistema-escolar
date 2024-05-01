<?php
    include('../../app/config.php');

    $id_materias = $_POST['id_materias'];
    $inactivo = 0;

    $sentencia = $pdo->prepare("UPDATE materias SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_materias=:id_materias");

    $sentencia->bindParam(':id_materias',$id_materias);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);

    if($sentencia->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "La materia se elimino de la manera correcta.";
        $_SESSION['icono'] = "success";

        header("location:".APP_URL."/vistas/materias/");
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar la materia, comuníquese con el Administrador.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/materias/");
    }