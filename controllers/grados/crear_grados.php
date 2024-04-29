<?php
    include('../../app/config.php');

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

        header("location:".APP_URL."/vistas/grados/create.php");
    }
    else
    {
        $sentencia = $pdo->prepare("INSERT INTO grados(nivel_id,curso,paralelo,estado,fyh_creacion) 
        VALUES(:nivel_id,:curso,:paralelo,:estado,:fecha)");

        $sentencia->bindParam(':nivel_id',$nivel_id);
        $sentencia->bindParam(':curso',$curso);
        $sentencia->bindParam(':paralelo',$paralelo);
        $sentencia->bindParam(':estado',$estado);
        $sentencia->bindParam(':fecha',$fecha);

        if($sentencia->execute())
        {
            session_start();
            $_SESSION['mensaje'] = "El grado se registro correctamente.";
            $_SESSION['icono'] = "success";

            header("location:".APP_URL."/vistas/grados/");
        }
        else
        {
            session_start();
            $_SESSION['mensaje'] = "No se pudo registrar el grado, comuníquese con el Administrador.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/grados/create.php");
        }
    }