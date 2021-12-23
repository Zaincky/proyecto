<?php   

    session_start();

    if(!isset($_SESSION['nombre'])){

        echo "Hola $usuario BIENVENIDO ";
        include_once 'Aula.php';
        session_destroy();
        die();

    }


    echo <<<_END
    
    <center>
        <h1>TAREAS ONLINE<h1>
        <h5>Nueva Actidad<h5>
        <title>Aula</title>
    <pre>
        <form action="sesion_u.php" method="post">
            Titulo <input type="text" name="titulo" placeholder='materia' autocomplete='off'>
         Contenido <input type="text" name="contenido" placeholder='tema' autocomplete='off'>
          Registro <input type="date" name="registro">
       Vencimiento <input type="date" name="vencimiento">
         Prioridad <select name="prioridad" size="1">
         <option value="a"> Alta</option>
         <option value="m"> Media</option>
         <option value="b"> Baja</option>
         </select><br>
         <button name="button">Agregar</button><br><br>
        </form>
    </pre>
    </center>
    
    <h3>Tareas pendientes<h3><pre>
    <button name="button">Pendientes</button><br>
    <button name="button">Vencidas</button><br>
    <button name="button">Archivados</button><br>
    <button name="button">todos </button><br>




    _END;
?>