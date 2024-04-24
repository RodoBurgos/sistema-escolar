<?php
    include("../../app/config.php");

    /*---------- Iniciar sesión ----------*/
    $usuario_form = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario_form' AND estado = 'Activo'";
    $query = $pdo->prepare($sql);
    $query->execute();

    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);
    //print_r($usuarios);

    $contador = 0;

    foreach($usuarios as $usuario)
    {
        $contrasena_tabla = $usuario["contrasena"];

        $contador++;
    }

    if (($contador > 0) && (password_verify($contrasena, $contrasena_tabla)))
    {
        //q bien amorecho "Datos correctos";
        session_start();
        $_SESSION['mensaje'] = "Bienvenido al Sistema.";
        $_SESSION['icono'] = "success";
        $_SESSION['usuario'] = $usuario_form;
        header('location:'.APP_URL.'/vistas');
    }
    else
    {
        //echo "datos incorrectos";
        session_start();
        $_SESSION['mensaje'] = "Los datos introducidos son incorrectos, vuelva a intentarlo.";
        header('location:'.APP_URL);
    }
    
?>