<?php
 ob_start();
session_start();
if(isset($_SESSION['username']))
    {
        echo "Por favor Usted ya inicio session <a href='aula.php'>Click aqui</a>
        Para acceder";
    }
else {
    echo "
        <center>
        <h1>Iniciar Sesion</h1>
        <html>
        
            <head>
                <title>Iniciar Sesion</title>
            </head>
            <body>
                <form method='post' action='Conexionu.php' autocomplete='on'><pre>
    Nombre del usuario <input type='text' name='nombre'><br>
            Contraseña <input type='password' name='contraseña' autocomplete='off'><br><br>
                    <button name='button'>Iniciar Sesion</button><br><br>
    ¿Aun no cuentas con una cuenta? <a href='Registrarse.php'>Registrarme</a>
        </center>
                </form>
            </body>
        </html>
   ";
}
 
?>