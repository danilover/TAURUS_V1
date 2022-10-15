<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITULO DE LA PESTAÑA -->
    <title>RECUPERAR CONTRASEÑA</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK OLVIDO CONTRASEÑA CSS -->
    <link rel="stylesheet" href="../CSS/olvido_contraseña.css">
</head>

<body>

    <!-- FLECHA ATRAS -->
    <div><a href="../PHP/index.php" class="flecha">Atras</a></div>

    <!-- TEXTO RECUPERAR CONTRASEÑA -->
    <h2>Recuperar Contraseña</h2>
    <br><br><br><br>

    <!-- CREACION FORMULARIO -->
    <div>
        <form class="formulario" method="post" action="recuperar_contraseña.php" autocomplete="off">

            <!-- CREACION TEXTO NOMBRE USUARIO -->
            <div>
                <strong><label class="usuario">Nombre de usuario</label></strong>

                <!-- CREACION INPUT USUARIO -->
                <input type="text" class="usuarioinp" name="usuario" required maxlength="12">

            </div>
            <br><br><br>

            <!-- CREACION TEXTO PALABRA CLAVE RECUPERACION -->
            <div>
                <strong><label class="palabra">Palabra Recuperacion</label></strong>

                <!-- CREACION INPUT PALABRA RECUPERACION -->
                <input type="text" class="palabrainp" name="palabra" required maxlength="100">
            </div>
            <br><br><br>

            <!-- CREACION BOTON BUSCAR -->
            <input type="submit" class="boton" name="buscar" value="Buscar">
    </div>
    </form>
    </div>
    <!-- LOGO SOFTWARE -->
    <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>