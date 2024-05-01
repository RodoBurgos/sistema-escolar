<?php
    include('../../app/config.php');

    $id_rol = $_POST['id_rol'];
    $inactivo = 0;

    $sentencia = $pdo->prepare("UPDATE roles SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_roles=:id_rol");

    $sentencia->bindParam(':id_rol',$id_rol);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);

    if($sentencia->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "El rol se elimino de la manera correcta.";
        $_SESSION['icono'] = "success";

        header("location:".APP_URL."/vistas/roles/");
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el rol, comuníquese con el Administrador.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/roles/");
    }