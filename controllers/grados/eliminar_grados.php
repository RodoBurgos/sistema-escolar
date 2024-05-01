<?php
    include('../../app/config.php');

    $id_grados = $_POST['id_grados'];
    $inactivo = 0;

    $sentencia = $pdo->prepare("UPDATE grados SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_grados=:id_grados");

    $sentencia->bindParam(':id_grados',$id_grados);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);

    if($sentencia->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "El grado se elimino de la manera correcta.";
        $_SESSION['icono'] = "success";

        header("location:".APP_URL."/vistas/grados/");
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el grado, comuníquese con el Administrador.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/grados/");
    }