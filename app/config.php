<?php
    define('SERVIDOR', 'localhost');
    define('USUARIO', 'root');
    define('PASSWORD', '');
    define('BD', 'sistemaescolar');
    
    define('APP_NAME', 'Sistema Gestión Escolar');
    define('APP_URL', 'http://localhost/Trabajos/sistema_escolar');
    define('KEY_API_MAPS','');

    $servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

    try
    {
        $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
        //echo "Conexión exitosa a la BD.";
    }
    catch (PDOException $e)
    {
        echo "Error de conexión a la BD.";
    }
    
    date_default_timezone_set("America/Argentina/Salta");
    $fecha = date("Y-m-d H:i:s");

    $dia_actual = date("d");
    $mes_actual = date("m");
    $ano_actual = date("Y");
    $estado = "ACTIVO";

    //Conexión a la BD de otra forma
    /*$server="localhost";
    $user="root";
    $pass="";
    $dbname="sistemaescolar";

    $sistema = "Sistema Escolar";
    
    $dsn="mysql:host=$server;dbname=$dbname";

    try
    {
        $connect=new PDO($dsn,$user,$pass);
        $connect->exec("SET character_set_connection = 'utf8'");
        $connect->exec("SET NAMES 'UTF8'");

        //echo "La conexión a la base de datos fue exitosa.";
    }
    catch(PDOException $error)
    {
        echo "Error al conectarse a la base de datos.";
    }

    $url = "http://localhost/Trabajos/sistema_escolar";

    date_default_timezone_set("America/Argentina/Salta");
    $fecha = date("Y-m-d H:i:s");

    $dia_actual = date("d");
    $mes_actual = date("m");
    $ano_actual = date("Y");*/