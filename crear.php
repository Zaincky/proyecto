<?php //continue.php
     include 'conexion.php';
     ob_start();
     session_start();

    if (isset($_SESSION['username']))
    {   
        $id = htmlspecialchars($_SESSION['id']);
        $nombre = htmlspecialchars($_SESSION['username']);

        if(isset($_POST['titulo']) && isset($_POST['contenido']) && isset($_POST['registro']) && isset($_POST['vencimiento']) && isset($_POST['prioridad']))
    {
        $Titulo = mysql_entities_fix_string($conexion, $_POST['titulo']);
        $Contenido = mysql_entities_fix_string($conexion, $_POST['contenido']);
        $FechaRegistro = mysql_entities_fix_string($conexion, $_POST['registro']);
        $FechaVencimiento = mysql_entities_fix_string($conexion, $_POST['vencimiento']);
        $Prioridad = mysql_entities_fix_string($conexion, $_POST['prioridad']);
        

        $conexion->query("INSERT INTO tarea( id, idt, titulo, contenido, fc, fv, prioridad, estado) values ('$id',NULL,'$Titulo', '$Contenido', '$FechaRegistro','$FechaVencimiento', '$Prioridad', 'Pendiente' )");
        echo "<div ALIGN='center'>Tarea Creada <a href=Aula.php> Volver A La Pagina Principal </a> </div>";
      
    }
    
    }
    else echo "Por favor <a href=index.php>Click aqui</a>
                para ingresar";
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