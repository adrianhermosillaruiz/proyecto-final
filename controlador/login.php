<?php
    session_start();
    require_once("../modelo/Usuario.php");

    if (isset($_POST['usuario']) && isset($_POST['password'])) {
        $_SESSION['usuario'] = $_POST['usuario'];
        echo "<script>window.location.href = './articulos.php';</script>";
    }
?>

<!DOCTYPE html>
    <html lang="es">
        <head> 
            <?php include_once("dependenciasHeader.html"); ?>
            <title>Login</title>
        </head>
        <body>
            <?php include_once("../vista/navbar.php"); ?>
            <h1>Login</h1>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Usuario:</label>
                    <input type="text"  name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu usuario.">
                    <small id="emailHelp" class="form-text text-muted">Estos datos son privados y no serán compartidos con terceros.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña:</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Introduce tu contraseña.">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div>
                ¿No tienes usuario? <a href="./registro.php">Registrate</a>
            </div>

            <?php include_once("dependenciasBody.html"); ?>
        </body>
    </html>