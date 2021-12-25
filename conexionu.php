<?php 
    include 'conexion.php';
    ob_start();
    session_start();

    if($conexion->connect_error) die("Error fatal");

    if(isset($_SESSION['nombre']))
    {
      header("Location: continue.php" );
    }

    if (isset($_POST['nombre'])&&
        isset($_POST['contraseña']))
    {
        $un_temp = mysql_entities_fix_string($conexion, $_POST['nombre']);
        $pw_temp = mysql_entities_fix_string($conexion, $_POST['contraseña']);
        $query   = "SELECT * FROM usuario WHERE usuario='$un_temp'";
        $result  = $conexion->query($query);
        
        if (!$result) die ("Usuario no encontrado");
        elseif ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_NUM);
            $result->close();

            if (password_verify($pw_temp, $row[2])) 
            {
                session_start();
                $_SESSION['id']=$row[0];
                $_SESSION['username']=$row[1];
                
            
                    header("Location: Aula.php" );
            }
            else {
                echo "Usuario/password incorrecto <p><a href='signup.php'>
            Registrarse</a></p><p><a href='index.php'>
            Iniciar Session de nuevo</a></p>";
            }
        }
        else {
          echo "Usuario/password incorrecto <p><a href='signup.php'>
            Registrarse</a></p><p><a href='index.php'>
            Iniciar Session de nuevo</a></p>";
      }   
    }

    
    $conexion->close();

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