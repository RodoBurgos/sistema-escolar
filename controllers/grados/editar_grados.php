<?php
    include('../../app/config.php');

    $id = $_POST["id_grados"];
    $nivel_id = $_POST["nivel_id"];
    $curso = $_POST["curso"];
    $paralelo = $_POST["paralelo"];

    $curso = mb_strtoupper($curso);//pone todo el nombre en mayúscula

    //Verifica que la variable están vacías o no
    if($nivel_id == "" || $curso == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese un nivel escolar y/o un curso.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/grados/edit.php?id=$id");
    }
    else
    {
        $sentencia = $pdo->prepare("UPDATE grados SET nivel_id=:nivel_id, curso=:curso, paralelo=:paralelo,
        fyh_actualizacion=:fecha WHERE id_grados=:id");

        $sentencia->bindParam(':id',$id);
        $sentencia->bindParam(':nivel_id',$nivel_id);
        $sentencia->bindParam(':curso',$curso);
        $sentencia->bindParam(':paralelo',$paralelo);
        $sentencia->bindParam(':fecha',$fecha);

        if($sentencia->execute())
        {
            session_start();
            $_SESSION['mensaje'] = "El grado se actualizo correctamente.";
            $_SESSION['icono'] = "success";

            header("location:".APP_URL."/vistas/grados/");
        }
        else
        {
            session_start();
            $_SESSION['mensaje'] = "No se pudo actualizar el grado, comuníquese con el Administrador.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/grados/edit.php?id=$id");
        }
    }