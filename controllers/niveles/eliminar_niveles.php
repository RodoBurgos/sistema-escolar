<?php
    include('../../app/config.php');

    $id_niveles = $_POST['id_niveles'];
    $inactivo = 0;

    $sentencia = $pdo->prepare("UPDATE niveles SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_niveles=:id_niveles");

    $sentencia->bindParam(':id_niveles',$id_niveles);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);

    if($sentencia->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "El nivel se elimino de la manera correcta.";
        $_SESSION['icono'] = "success";

        header("location:".APP_URL."/vistas/niveles/");
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el nivel, comuníquese con el Administrador.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/niveles/");
    }