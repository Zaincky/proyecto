<?php

    echo <<<_END

        <center>
        <h1>Registrarme</h1>
        <html>
            <head>
                <title>Registrarme</title>
            </head>
            <body>
                <form method="post" action="registrarse_u.php"><pre>
    Nombre de usuario <input type="text" name="usuario" autocomplete='on' placeholder='Nombre'><br>
        Contraseña    <input type="password" name="contraseña"><br>

                     <button name="button">Registrarme</button><br><br>

    ¿Ya tienes una cuenta? <a href='Sesion.php'>Iniciar sesion</a>
        </center>
        
                </form>
            </body>
        </html>
    _END;

        
?>