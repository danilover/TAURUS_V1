<?php
// CONEXION BASE DE DATOS  
require "conexion_bd.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITULO DE LA PESTAÑA -->
    <title>CONTRASEÑA</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK OLVIDO CONTRASEÑA CSS -->
    <link rel="stylesheet" href="../CSS/olvido_la_contraseña.css">
</head>

<body>

    <!-- FLECHA ATRAS -->
    <div><a href="../PHP/index.php" class="flecha">Atras</a></div>

    <!-- TEXTO CONTRASEÑA -->
    <h2>Contraseña</h2>
    <br><br>
    <?php

    echo "<label class='perfil_usu'> '".$usuario['usuario']."' '".$palabra['palabra']."</label>";


    ?>
    <!-- LOGO SOFTWARE -->
    <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>