<?php
    include 'conexion.php';

    if(isset($_POST['username']) && isset($_POST['contraseña']))
    {

    $nombre = mysql_entities_fix_string($conexion, $_POST['username']);
    $pw_temp = mysql_entities_fix_string($conexion, $_POST['contraseña']);

    $password = password_hash($pw_temp, PASSWORD_DEFAULT);

    
    $query = "INSERT INTO usuario(id ,usuario, clave) VALUES(null,'$nombre', '$password')";
    
    $result = $conexion->query($query);
    if (!$result) die ("Falló registro");

        
    echo"
        <form action='signup.php' method='post' ALIGN='center'><pre>
        <input type='hidden' name='reg' value='yes'>

    ";
    header("Location: index.php");

    
}
else{ 
    
    header("Location: Registrarse.php" );

}

    function mysql_entities_fix_string($conexion, $string)
    {
        return htmlentities(mysql_fix_string($conexion, $string));
      }
    function mysql_fix_string($conexion, $string)
    {
        //if (get_magic_quotes_gpc()) $string = stripslashes($string);
        return $conexion->real_escape_string($string);
      }  

?>