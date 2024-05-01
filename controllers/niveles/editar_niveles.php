<?php
    include('../../app/config.php');

    $id = $_POST["id_niveles"];
    $gestion_id = $_POST["gestion_id"];
    $nivel = $_POST["nivel"];
    $turno = $_POST["turno"];

    //Verifica que la variable nombre no este vació
    if($gestion_id == "")
    {
        session_start();
        $_SESSION['mensaje'] = "Por favor ingrese una gestión escolar.";
        $_SESSION['icono'] = "error";

        header("location:".APP_URL."/vistas/niveles/edit.php?id=$id");
    }
    else
    {
        //Consulta si el nivel ya existe en la BD
        $consulta = $pdo->prepare("SELECT nivel, turno FROM niveles WHERE nivel=:nivel AND turno=:turno");
        $consulta->bindParam(':nivel', $nivel);
        $consulta->bindParam(':turno', $turno);
        $consulta->execute();

        $niveles = $consulta->fetch(PDO::FETCH_ASSOC);

        if($niveles)
        {
            session_start();
            $_SESSION['mensaje'] = "Este nivel ya existe en la base de datos.";
            $_SESSION['icono'] = "error";

            header("location:".APP_URL."/vistas/niveles/create.php");
        }
        else
        {
            $sentencia = $pdo->prepare("UPDATE niveles SET gestion_id=:gestion_id, nivel=:nivel, turno=:turno,
            fyh_actualizacion=:fecha WHERE id_niveles=:id");

            $sentencia->bindParam(':id',$id);
            $sentencia->bindParam(':gestion_id',$gestion_id);
            $sentencia->bindParam(':nivel',$nivel);
            $sentencia->bindParam(':turno',$turno);         
            $sentencia->bindParam(':fecha',$fecha);

            if($sentencia->execute())
            {
                session_start();
                $_SESSION['mensaje'] = "El nivel se actualizo correctamente.";
                $_SESSION['icono'] = "success";

                header("location:".APP_URL."/vistas/niveles/");
            }
            else
            {
                session_start();
                $_SESSION['mensaje'] = "No se pudo registrar este nivel, comuníquese con el Administrador.";
                $_SESSION['icono'] = "error";

                header("location:".APP_URL."/vistas/niveles/edit.php?id=$id");
            }
        }
    }