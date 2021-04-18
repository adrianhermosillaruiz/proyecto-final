<?php
    session_start();
    require_once("../modelo/Usuario.php");
    Usuario::cerrarSesion();
?>

<script>
    window.location.href = './articulos.php';
</script>