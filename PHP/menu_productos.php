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
    <title>PRODUCTOS</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK PRODUCTOS CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/menu_productos.css">
</head>

<body>

    <!-- FLECHA ATRAS -->
    <div><a href="../PHP/inicio.php" class="flecha">Atras</a></div>

    <!-- TEXTO PRODUCTOS -->
    <h2>Productos</h2>
    <br><br><br>

    <!-- BUSCADOR -->
    <div class="buscador">
        <form action="buscar_producto.php" method="post" autocomplete="off">
            <label for="" class="texto">Referencia</label>
            <input type="search" placeholder="Buscar" class="input" name="buscar_pro" required>
        </form>
    </div>
    <br><br><br><br>

    <!-- BOTON REGISTRAR PRODUCTOS -->
    <div><a href="../PHP/registrar_producto.php" class="registrar">Registrar Producto</a></div>
    <br><br><br><br><br>

    <!-- CREACION TABLA PRODUCTOS -->
    <div>
        <table>
            <tr>
                <th>Id</th>
                <th>Referencia producto</th>
                <th>Marca producto</th>
                <th>Precio producto</th>
                <th>Proveedor producto</th>
                <th>Editar</th>
            </tr>

            <!-- MOSTRAR DATOS PRODUCTOS BD EN LA TABLA -->
            <?php
            $consulta = "SELECT * FROM productos INNER JOIN proveedores ON proveedores.id_proveedor=productos.proveedor_producto ORDER BY id_producto ASC";

            $validar = mysqli_query($conexion, $consulta);
            while ($mostrar = mysqli_fetch_array($validar)) {
                echo "<tr>";
                echo "<td>" . $mostrar['id_producto'] . "</td>";
                echo "<td>" . $mostrar['referencia_producto'] . "</td>";
                echo "<td>" . $mostrar['marca_producto'] . "</td>";
                echo "<td>" . $mostrar['precio_producto'] . "</td>";
                echo "<td>" . $mostrar['nombre_proveedor'] . "</td>";
                echo "<td>";
                echo "<a class='editar' href='editar_producto.php?id_producto=" . $mostrar['id_producto'] . "'>Editar</a>&#160  &#160  &#160 ";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>

    <!-- LOGO SOFTWARE -->
    <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>

<?php


?>