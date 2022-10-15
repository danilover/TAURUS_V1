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
    <title>EDITAR COMPRAS</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK EDITAR PRODUCTO CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/editar_compra.css">
</head>

<body>

    <!-- GUARDAR DATOS AL DAR CLIN EN ENVIAR -->
    <?php
    if (isset($_POST['guardar'])) {
        $id = $_POST['id'];
        $factura = $_POST['factura'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $referencia = $_POST['referencia'];
        $proveedor = $_POST['proveedor'];

        // SENTENCIA SQL PARA ACTUALIZAR DATOS
        $actualizar = "UPDATE compras SET numero_factura='$factura ', cantidad= '     $cantidad ' , precio_unidad='$precio'  , referencia_producto= '$referencia', proveedor='$proveedor' WHERE id_compras='$id'";
        $resultado = mysqli_query($conexion, $actualizar);

        // CONDICIONAL PARA VALIDAR DATOS CORRECTOS
        if ($resultado) {
            echo "<script> alert('¡DATOS ACTUALIZADOS!');location.href='menu_compras.php';</script>";
        } else {
            echo "<script> alert('¡ERROR AL ACTUALIZAR!, ¡VERIFIQUE!');location.href='menu_compras.php';</script>";
        }

        // SENTENCIA SQL PARA CONSULTAR DATOS DEL CAMPO SELECCIONADO
    } else {
        $id = $_GET['id_compras'];
        $buscar = "SELECT * FROM compras INNER JOIN proveedores ON proveedores.id_proveedor=compras.proveedor INNER JOIN productos ON productos.id_producto=compras.referencia_producto WHERE id_compras='$id'";
        $resultado = mysqli_query($conexion, $buscar);
        $fila = mysqli_fetch_assoc($resultado);

        // DATOS A MOSTRAR
        $id = $fila["id_compras"];
        $factura = $fila["numero_factura"];
        $cantidad = $fila["cantidad"];
        $precio = $fila["precio_unidad"];
        $referencia = $fila["referencia_producto"];
        $proveedor = $fila["nombre_proveedor"];
    ?>

        <!-- FLECHA ATRAS -->
        <div><a href="../PHP/menu_compras.php" class="flecha">Atras</a></div>

        <!-- TEXTO EDITAR COMPRA -->
        <h2>Editar Compra</h2>
        <br><br>

        <!-- FORMULARIO REGISTRO  COMPRAS -->
        <div class="formulario">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">
                <div><strong><label class="t_id"></label></strong><input type="text" name="id" class="id" required hidden value="<?php echo $id; ?>"></div>
                <div><strong><label class="t_factura">Numero Factura</label></strong><input type="text" name="factura" class="factura" required value="<?php echo $factura; ?>"></div>
                <br><br>
                <div><strong><label class="t_cantidad">Cantidad</label></strong><input type="text" name="cantidad" class="cantidad" required value="<?php echo $cantidad; ?>"></div>
                <br><br>
                <div><strong><label class="t_precio">Precio Unidad</label></strong><input type="text" name="precio" class="precio" required value="<?php echo $precio; ?>" </div>
                    <br><br><br><br>

                    <!-- CREACION LISTA REFERENCIAS PRODUCTOS -->
                    <div><strong><label class="tex_referencia">Referencia Producto</label></strong><br><br>

                        <select class="referencia" name="referencia" required>
                            <option value="" selected disabled><?php echo $referencia; ?></option>

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
                            <option value="" selected disabled><?php echo $proveedor; ?></option>

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

                            <!-- BOTON GUARDAR PROVEEDOR -->
                            <div><input type="submit" class="guardar" name="guardar" value="Guardar"></div>
            </form>
        <?php
    }
        ?>
        <br><br><br><br><br>

        <!-- LOGO SOFTWARE -->
        <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo" style="margin:0px 80px ;">
</body>

</html>