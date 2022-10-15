<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITULO DE LA PESTAÑA  -->
    <title>REGISTRAR PROVEEDORES</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK REGISTRAR PROVEEDORES CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/registrar_proveedor.css">
</head>

<body>

    <!-- FLECHA ATRAS -->
    <div><a href="../PHP/menu_proveedores.php" class="flecha">Atras</a></div>

    <!-- TEXTO REGISTRAR PROVEEDORES -->
    <h2>Registrar Proveedores</h2>

    <!-- FORMULARIO REGISTRO PROVEEDORES -->
    <div class="formulario">
        <form action="guardar_proveedor.php" method="post" autocomplete="off">
            <div><strong><label class="t_nit">Nit</label></strong><input type="text" name="nit" class="nit" required></div>
            <br><br>
            <div><strong><label class="t_nombre">Nombre</label></strong><input type="text" name="nombre" class="nombre" required></div>
            <br><br>
            <div><strong><label class="t_direccion">Dirección</label></strong><input type="text" name="direccion" class="direccion" required></div>
            <br><br>
            <div><strong><label class="t_telefono">Teléfono</label></strong><input type="text" name="telefono" class="telefono" required></div>
            <br><br><br>

            <!-- BOTON REGISTRAR PROVEEDOR -->
            <div><input type="submit" class="guardar" value="Registrarse"></div>
        </form>
    </div>
    <br><br>

    <!-- LOGO SOFTWARE -->
    <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>