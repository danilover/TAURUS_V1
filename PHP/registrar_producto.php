<!-- CONEXION BASE DE DATOS -->
<?php
require "conexion_bd.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITULO DE LA PESTAÑA  -->
    <title>REGISTRAR PRODUCTOS</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK REGISTRAR PRODUCTOS CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/registrar_producto.css">
</head>

<body>

    <!-- FLECHA ATRAS -->
    <div><a href="../PHP/menu_productos.php" class="flecha">Atras</a></div>

    <!-- TEXTO REGISTRAR PRODUCTOS -->
    <h2>Registrar Productos</h2>
    <br><br>

    <!-- FORMULARIO REGISTRO PRODUCTOS -->
    <div class="formulario">
        <form action="guardar_producto.php" method="post" autocomplete="off">
            <div><strong><label class="t_referencia">Referencia</label></strong><input type="text" name="referencia" class="referencia" required></div>
            <br><br>
            <div><strong><label class="t_marca">Marca</label></strong><input type="text" name="marca" class="marca" required></div>
            <br><br>
            <div><strong><label class="t_precio">Precio</label></strong><input type="text" name="precio" class="precio" required></div>
            <br><br>

            <!-- CREACION TEXTO PRODUCTOS -->
            <strong><label class="tex_proveedor">Seleccionar Proveedor</label></strong>
            <br><br>

            <!-- CREACION LISTA PRODUCTOS -->
            <select class="proveedor" name="proveedor" required>
                <option value="" selected disabled>Seleccione Proveedor

                    <!-- CONEXION A LA BD Y CONSULTA SQL PARA PEDIR INFORMACION ID DE LA TABLA PROVEEDORES -->
                    <?php
                    $prove = mysqli_query($conexion, "SELECT * FROM proveedores");
                    while ($fila = $prove->fetch_array()) {
                        echo "<option value= '" . $fila['id_proveedor'] . "'>" . $fila['nombre_proveedor'] . "</option>";
                    }
                    ?>
            </select>
            <br><br><br>

            <!-- BOTON REGISTRAR PRODUCTO -->
            <div><input type="submit" class="boton" value="Registrar"></div>
        </form>
    </div>
    <br><br>

    <!-- LOGO SOFTWARE -->
    <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>