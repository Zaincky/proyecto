<?php   
    include 'conexion.php';
    ob_start();
    session_start();

    if(isset($_SESSION['username'])){
        $nombre = htmlspecialchars($_SESSION['username']);
        $id = htmlspecialchars($_SESSION['id']);
        echo "para cerrar session <a href=logout.php>Click aqui</a>";

    }
    else{
        echo "iniciar sesion porfavor";
        include_once 'Sesion.php';
        session_destroy();
        die();

    }

    echo "
    
    <center>
        <h1>TAREAS ONLINE<h1>
        <h5>Nueva Actividad<h5>
        <title>Aula</title>
    <pre>
        <form action='crear.php' method='post'>
            Titulo <input type='text' name='titulo' placeholder='materia' autocomplete='off'>
         Contenido <input type='text' name='contenido' placeholder='tema' autocomplete='off'>
          Registro <input type='datetime-local' name='registro'>
       Vencimiento <input type='datetime-local' name='vencimiento'>
         Prioridad <select name='prioridad' size='1'>
         <option value='1'> Alta</option>
         <option value='2'> Media</option>
         <option value='3'> Baja</option>
         </select><br>
         <button name='button'>Agregar</button>
        </form>
    </pre>
    </center>
    
    <h3>Tareas:<h3><pre>
    <form action='Aula.php' method='post'>
    <button name='button'>Pendientes</button>
    <input type='hidden' name='Pendientes'>
    </form>
    <form action='Aula.php' method='post'>
    <button name='button'>Vencidas</button>
    <input type='hidden' name='Vencidas' >
    </form>
    <form action='Aula.php' method='post'>
    <button name='button'>Archivados</button>
    <input type='hidden' name='Archivados'>
    </form>
    <form action='Aula.php' method='post'>
    <input type='hidden' name='todos'>
    <button name='button'>todos </button>
    </form>
    ";


    if (isset($_POST["Pendientes"])){
        
           
           $query = "SELECT * FROM tarea where  id=$id order by fv asc";
           $result = $conexion->query($query);   
          
               $rows = $result->num_rows;
               for ($j = 0; $j < $rows; ++$j)
               {
                $row = $result->fetch_array(MYSQLI_NUM); 

                        $r0 = htmlspecialchars($row[0]);
                         $r1 = htmlspecialchars($row[1]);
                         $r2 = htmlspecialchars($row[2]);
                         $r3 = htmlspecialchars($row[3]);
                         $r4 = htmlspecialchars($row[4]);
                         $r5 = htmlspecialchars($row[5]);                        
                         $r7 = htmlspecialchars($row[7]); 
                            
            echo "
            titulo=  $r1
            contenido=  $r2
            fecharegistro=  $r3
            fechavencimiento=  $r4
            prioridad=  $r5
                                        
           


            
           ";
        }
    
    }




    ?>