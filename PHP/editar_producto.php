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
    <title>EDITAR PRODUCTO</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK EDITAR PRODUCTO CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/editar_productos.css">
</head>

<body>

    <!-- GUARDAR DATOS AL DAR CLIN EN ENVIAR -->
    <?php
    if (isset($_POST['guardar'])) {
        $id = $_POST['id'];
        $referencia = trim($_POST['referencia']);
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $proveedor = $_POST['proveedor'];

        // SENTENCIA SQL PARA ACTUALIZAR DATOS
        $actualizar = "UPDATE productos SET referencia_producto='$referencia ', marca_producto= '     $marca ' , precio_producto='$precio'  , proveedor_producto= '$proveedor' WHERE id_producto='$id'";
        $resultado = mysqli_query($conexion, $actualizar);

        // CONDICIONAL PARA VALIDAR DATOS CORRECTOS
        if ($resultado) {
            echo "<script> alert('¡DATOS ACTUALIZADOS!');location.href='menu_productos.php';</script>";
        } else {
            echo "<script> alert('¡ERROR AL ACTUALIZAR!, ¡VERIFIQUE!');location.href='menu_productos.php';</script>";
        }

        // SENTENCIA SQL PARA CONSULTAR DATOS DEL CAMPO SELECCIONADO
    } else {
        $id = $_GET['id_producto'];
        $buscar = "SELECT * FROM productos INNER JOIN proveedores ON proveedores.id_proveedor=productos.proveedor_producto WHERE id_producto='$id'";
        $resultado = mysqli_query($conexion, $buscar);
        $fila = mysqli_fetch_assoc($resultado);

        // DATOS A MOSTRAR
        $id = $fila["id_producto"];
        $referencia = $fila["referencia_producto"];
        $marca = $fila["marca_producto"];
        $precio = $fila["precio_producto"];
        $proveedor = $fila["nombre_proveedor"];
    ?>

        <!-- FLECHA ATRAS -->
        <div><a href="../PHP/menu_productos.php" class="flecha">Atras</a></div>

        <!-- TEXTO EDITAR PROVEEDOR -->
        <h2>Editar Producto</h2>
        <br><br>

        <!-- FORMULARIO EDITAR PROVEEDOR -->
        <div class="formulario" style="height: 350px ;">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">

                <div><strong><label class="t_id"></label></strong><input type="text" name="id" class="id" required hidden value="<?php echo $id; ?>"></div>
                <div><strong><label class="t_referencia">Referencia</label></strong><input type="text" name="referencia" class="referencia" required value="<?php echo $referencia; ?>"></div>
                <br><br>
                <div><strong><label class="t_marca">Marca</label></strong><input type="text" name="marca" class="marca" required value="<?php echo $marca; ?>"></div>
                <br><br>
                <div><strong><label class="t_precio">Precio</label></strong><input type="text" name="precio" class="precio" required value="<?php echo $precio; ?>"></div>
                <br><br>

                <!-- CREACION LISTA CARGOS -->
                <strong><label for="" class="t_proveedor">Seleccione Proveedor</label></strong><br><br>
                <select class="proveedor" name="proveedor" required>
                    <option value="" selected disabled><?php echo $proveedor; ?>

                        <!-- CONEXION A LA BD Y CONSULTA SQL PARA PEDIR INFORMACION DE LA TABLA PROVEEDORES -->
                        <?php $prove = mysqli_query($conexion, "SELECT * FROM proveedores");
                        while ($fila = $prove->fetch_array()) {
                            echo "<option value= '" . $fila['id_proveedor'] . "'>" . $fila['nombre_proveedor'] . "</option>";
                        }
                        ?>
                </select><br><br>

                <!-- BOTON GUARDAR PROVEEDOR -->
                <div><input type="submit" class="btn_guardar" name="guardar" value="Guardar"></div>
            </form>
        <?php
    }
        ?>
        <br><br>

        <!-- LOGO SOFTWARE -->
        <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo" style="margin:0px 80px ;">
</body>

</html>