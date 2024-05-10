<?php
    include('../../app/config.php');

    $id_parentesco = $_POST['id_parentescos'];
    $inactivo = 0;

    $sentencia = $pdo->prepare("UPDATE parentescos SET estado=:inactivo, fyh_actualizacion=:fecha WHERE id_parentescos=:id_parentesco");

    $sentencia->bindParam(':id_parentesco',$id_parentesco);
    $sentencia->bindParam(':inactivo',$inactivo);
    $sentencia->bindParam(':fecha',$fecha);

    if($sentencia->execute())
    {
        session_start();
        $_SESSION['mensaje'] = "El parentesco familiar se elimino de la manera correcta.";
        $_SESSION['icono'] = "success";

        header("location:".APP_URL."/vistas/parentescos/");
    }
    else
    {
        session_start();
        $_SESSION['mensaje'] = "No se pudo eliminar el parentesco familiar, comuníquese con el Administrador.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/parentescos/");
    }