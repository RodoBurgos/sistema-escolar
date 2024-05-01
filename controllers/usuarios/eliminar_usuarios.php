<?php
    include('../../app/config.php');

    $id_usuario = $_POST['id_usuario'];
    $inactivo = 0;

    $sentencia = $pdo->prepare("UPDATE usuarios SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_usuarios=:id_usuario");

    $sentencia->bindParam(':id_usuario',$id_usuario);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);

    if($sentencia->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "El usuario se elimino de la manera correcta.";
        $_SESSION['icono'] = "success";

        header("location:".APP_URL."/vistas/usuarios/");
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el usuario, comuníquese con el Administrador.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/usuarios/");
    }