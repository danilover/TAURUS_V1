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
    <title>EDITAR PROVEEDOR</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK EDITAR PROVEEDOR CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/editar_proveedor.css">
</head>

<body>

    <!-- GUARDAR DATOS AL DAR CLIN EN ENVIAR -->
    <?php
    if (isset($_POST['guardar'])) {
        $id = $_POST['id'];
        $nit = $_POST['nit'];
        $nombre = $_POST['nombre'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        // SENTENCIA SQL PARA ACTUALIZAR DATOS
        $actualizar = "UPDATE proveedores SET nit_proveedor='" . $nit . "', nombre_proveedor='" . $nombre . "', direccion_proveedor='" .      $direccion . "', telefono_proveedor='" . $telefono . "' WHERE id_proveedor= '" . $id . "'";
        $resultado = mysqli_query($conexion, $actualizar);

        // CONDICIONAL PARA VALIDAR DATOS CORRECTOS
        if ($resultado) {
            echo "<script> alert('¡DATOS ACTUALIZADOS!');location.href='menu_proveedores.php';</script>";
        } else {
            echo "<script> alert('¡ERROR AL ACTUALIZAR!, ¡VERIFIQUE!');location.href='menu_proveedores.php';</script>";
        }

        // SENTENCIA SQL PARA CONSULTAR DATOS DEL CAMPO SELECCIONADO
    } else {
        $id = $_GET['id_proveedor'];
        $buscar = "SELECT * FROM proveedores WHERE id_proveedor='" . $id . "'";
        $resultado = mysqli_query($conexion, $buscar);
        $fila = mysqli_fetch_assoc($resultado);

        // DATOS A MOSTRAR
        $id = $fila["id_proveedor"];
        $nit = $fila["nit_proveedor"];
        $nombre = $fila["nombre_proveedor"];
        $direccion = $fila["direccion_proveedor"];
        $telefono = $fila["telefono_proveedor"];
    ?>

        <!-- FLECHA ATRAS -->
        <div><a href="../PHP/menu_proveedores.php" class="flecha">Atras</a></div>

        <!-- TEXTO EDITAR PROVEEDOR -->
        <h2>Editar Proveedor</h2>
        <br>

        <!-- FORMULARIO EDITAR PROVEEDOR -->
        <div class="formulario" style="height: 350px ;">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">

                <div><strong><label></label></strong><input type="text" name="id" required hidden value="<?php echo $id; ?>"></div>
                <div><strong><label class="t_nit">Nit</label></strong><input type="text" name="nit" class="nit" required value="<?php echo $nit; ?>"></div>
                <br><br>
                <div><strong><label class="t_nombre">Nombre</label></strong><input type="text" name="nombre" class="nombre" required value="<?php echo $nombre; ?>"></div>
                <br><br>
                <div><strong><label class="t_direccion">Dirección</label></strong><input type="text" name="direccion" class="direccion" required value="<?php echo $direccion; ?>"></div>
                <br><br>
                <div><strong><label class="t_telefono">Teléfono</label></strong><input type="text" name="telefono" class="telefono" required value="<?php echo $telefono; ?>"></div>
                <br><br><br>

                <!-- BOTON GUARDAR PROVEEDOR -->
                <div><input type="submit" class="guardar" name="guardar" value="Guardar" style="background-position: center lefth;"></div>
            </form>
        <?php
    }
        ?>
        <br><br><br><br><br><br>

        <!-- LOGO SOFTWARE -->
        <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo" style="margin:0px 80px ;">
</body>

</html>