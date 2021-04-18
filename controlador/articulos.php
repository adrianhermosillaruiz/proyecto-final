<?php
    session_start();
    require_once("../modelo/Usuario.php");
?>
<!DOCTYPE html>
    <html lang="es">
        <head> 
           <?php include_once("dependenciasHeader.html"); ?>
            <title>Articulos</title>
        </head>
        <body>
            <?php include_once("../vista/navbar.php"); ?>

            <?php
                if(!Usuario::usuarioLogeado()) {
                    echo "No estás logeado.";
                } else {
            ?>
                    <div class="escaparate">
                        <img src="https://s1.gaming-cdn.com/images/products/1497/271x377/the-witcher-3-wild-hunt-goty-cover.jpg" width="150" height="250">
                        <img src="https://s1.gaming-cdn.com/images/products/1497/271x377/the-witcher-3-wild-hunt-goty-cover.jpg" width="150" height="250">
                        <img src="https://s1.gaming-cdn.com/images/products/1497/271x377/the-witcher-3-wild-hunt-goty-cover.jpg" width="150" height="250">
                        <img src="https://s1.gaming-cdn.com/images/products/1497/271x377/the-witcher-3-wild-hunt-goty-cover.jpg" width="150" height="250">
                        <img src="https://s1.gaming-cdn.com/images/products/1497/271x377/the-witcher-3-wild-hunt-goty-cover.jpg" width="150" height="250">
                        <img src="https://s1.gaming-cdn.com/images/products/1497/271x377/the-witcher-3-wild-hunt-goty-cover.jpg" width="150" height="250">
                    </div>
            <?php
                }
            ?>
            <?php include_once("dependenciasBody.html"); ?>
        </body>
    </html>