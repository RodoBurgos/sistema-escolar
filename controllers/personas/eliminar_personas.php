<?php
    include('../../app/config.php');

    $id = $_POST['id_personas'];
    $inactivo = 0;

    $sentencia = $pdo->prepare("UPDATE personas SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_personas=:id");

    $sentencia->bindParam(':id',$id);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);

    if($sentencia->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "La persona se elimino de la manera correcta.";
        $_SESSION['icono'] = "success";

        header("location:".APP_URL."/vistas/personas/");
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar a la persona, comuníquese con el Administrador.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/personas/");
    }