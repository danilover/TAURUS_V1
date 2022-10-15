<!-- INICIO DE SESION, MOSTRAR NOMBRE DE USUARIO LOGIADO -->
<?php
require "conexion_bd.php";

session_start();
$usuario = $_SESSION['usuario'];
// DEVOLVER AL INDEX CUANDO EL USUARIO CIERRA SESION, O NO HAY NINGUN USUARIO LOGIADO
if (!isset($usuario)) {
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITULO DE LA PESTAÑA  -->
    <title>INICIO</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK INICIO CSS -->
    <link rel="stylesheet" href="../CSS/inicio.css">
</head>

<body>

    <!-- BOTON CERRAR SESION -->
    <nav>
        <a href="../PHP/logear_cerrar_sesion.php" class="cerrar_sesion">Cerrar Sesión</a>

        <?php
        $sql = "SELECT * FROM usuarios";
        $validar = mysqli_query($conexion, $sql);
        $fila = mysqli_fetch_assoc($validar);

        // PERFIL DEL USUARIO 
        echo "<a class='perfil_usu' href='perfil_usuario.php?id_usuario=" . $_SESSION['usuario'] . "'>";


        // MOSTRAR NOMBRE DE PERFIL LOGEADO
        echo $_SESSION['usuario']

        ?>
        </a>
    </nav>

    <!-- FORMULARIO MENU -->
    <nav class="menu_navegacion">

        <!-- BOTON PROVEEDORES -->
        <div><a href="../PHP/menu_proveedores.php" class="proveedores">Proveedores</a></div>
        <br>

        <!-- BOTON PRODUCTOS -->
        <div><a href="../PHP/menu_productos.php" class="productos">Productos</a></div>
        <br>

        <!-- BOTON COMPRAS -->
        <div><a href="../PHP/menu_compras.php" class="compras">Compras</a></div>
        <br>

        <!-- BOTON VENTAS -->
        <div><a href="../HTML/menu_ventas.html" class="ventas">Ventas</a></div>
        <br>

        <!-- BOTON INVENTARIO -->
        <div><a href="../HTML/menu_inventario.html" class="inventario">Inventario</a></div>
        <br>
    </nav>

    <!-- LOGO SOFTWARE -->
    <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>