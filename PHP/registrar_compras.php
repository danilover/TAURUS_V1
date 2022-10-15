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
    <title>REGISTRAR COMPRAS</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK REGISTRAR COMPRAS CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/registrar_compra.css">
</head>

<body>

    <!-- FLECHA ATRAS -->
    <div><a href="../PHP/menu_compras.php" class="flecha">Atras</a></div>

    <!-- TEXTO REGISTRAR COMPRAS -->
    <h2>Registrar Compras</h2>
    <br><br>

    <!-- FORMULARIO REGISTRO  COMPRAS -->
    <div class="formulario">
        <form action="guardar_compra.php" method="post" autocomplete="off">
            <div><strong><label class="t_factura">Numero Factura</label></strong><input type="text" name="factura" class="factura" required></div>
            <br><br>
            <div><strong><label class="t_cantidad">Cantidad</label></strong><input type="text" name="cantidad" class="cantidad" required></div>
            <br><br>
            <div><strong><label class="t_precio">Precio Unidad</label></strong><input type="text" name="precio" class="precio" required></div>
            <br><br><br>

            <!-- CREACION LISTA REFERENCIAS PRODUCTOS -->
            <div><strong><label class="tex_referencia">Referencia Producto</label></strong><br><br>

                <select class="referencia" name="referencia" required>
                    <option value="" selected disabled>Seleccionar Referencia</option>

                    <!-- CONEXION A LA BD Y CONSULTA SQL PARA PEDIR INFORMACION DE LA TABLA PRODUCTOS -->
                    <?php
                    $referencia = mysqli_query($conexion, "SELECT * FROM productos");

                    // PARA EJECUTAR LA CONSULTA SQL "while", PARA TRAER TODOS lOS DATOS DE LA FILA "fetch_array"
                    while ($fila = $referencia->fetch_array()) {
                        echo "<option value= '" . $fila['id_producto'] . "'>" . $fila['referencia_producto'] . "</option>";
                    }
                    ?>
                </select>
                <br><br><br>

                <!-- CREACION LISTA PROVEEDORES -->
                <div><strong><label class="tex_proveedor">Proveedor</label></strong><br><br>

                    <strong><select class="referencia" name="proveedor" required></strong>
                    <option value="" selected disabled>Seleccionar Proveedor</option>

                    <!-- CONEXION A LA BD Y CONSULTA SQL PARA PEDIR INFORMACION DE LA TABLA PROVEEDORES -->
                    <?php
                    $proveedor = mysqli_query($conexion, "SELECT * FROM proveedores");

                    // PARA EJECUTAR LA CONSULTA SQL "while", PARA TRAER TODOS lOS DATOS DE LA FILA "fetch_array"
                    while ($fila = $proveedor->fetch_array()) {
                        echo "<option value= '" . $fila['id_proveedor'] . "'>" . $fila['nombre_proveedor'] . "</option>";
                    }
                    ?>
                    </select>
                    <br><br><br><br>

                    <!-- BOTON REGISTRAR COMPRA -->
                    <div><input type="submit" class="guardar" value="Registrarse"></div>
        </form>
    </div>
    <br><br>

    <!-- LOGO SOFTWARE -->
    <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>