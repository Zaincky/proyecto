<?php
 ob_start();
    session_start();
    require_once 'conexion.php';

    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $validar = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$nombre' and clave = '$contraseña'");
    if(mysqli_num_rows($validar)>0){
        $_SESSION['nombre'] = $usuario;
        echo "HOLA $nombre BIENBENIDO";
        include_once 'Aula.php';
        exit;
    }
    else{
        echo 'Datos incorectos';
        //require_once 'Sesion.php';
        exit;
    }


?>