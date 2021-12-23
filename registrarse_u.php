<?php
    include 'conexion.php';

    $usuario = $_POST['usuario'];       //aqui se lamacena los valores
    $contraseña = $_POST['contraseña'];
    $contraseña = hash('sha512', $contraseña);

    $query = "INSERT INTO usuario(usuario, clave) VALUES('$usuario', '$contraseña')";

    //para los datos no se repiran
    $verificar = mysqli_query($conexion,"SELECT * FROM usuario WHERE usuario='$usuario'");

    if(mysqli_num_rows($verificar) >0){
        echo "Usuario ya existe";
        include_once 'Registrarse.php';
        exit();
    }
    else{
        echo "Registro exitoso";
        include_once 'sesion.php';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo "Exitoso";
        include_once 'Registrarse.php';
    }
    else{
        echo "fallido";
        include_once 'sesion.php';
    }

    mysqli_close($conexion);


?>