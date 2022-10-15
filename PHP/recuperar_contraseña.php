<!-- CONEXION BASE DE DATOS -->
<?php
require "conexion_bd.php";

// VARIABLES PARA GUARDAR DATOS RECUPERACION
$usuario = ($_POST['usuario']);
$palabra = ($_POST['palabra']);
$registro = 0;

// CONSULTA PARA BUSCAR DATOS SOLICITADOS BD
$buscarusu = "SELECT * FROM  usuarios WHERE nombre_usuario='$usuario' AND palabra_recuperacion='$palabra'";

// CONEXION A LA BASE DE DATOS Y CONSULTA SQL
$buscarusuario = mysqli_query($conexion, $buscarusu);

// CONDICION SI LOS DATOS EXISTEN 
if ($buscarusuario) {
?>

    <!-- DATOS CONSULTADOS -->
    <table hidden>
        <tr>
            <th> Id Usuario </th>
            <th> Nombre usuario </th>
            <th> Palabra Clave</th>
            <th> Contraseña</th>
        </tr>

        <!-- VARIABLE PARA TRAER LOS DATOS DEL ARREGLO -->
        <?php
        while ($consulta = mysqli_fetch_array($buscarusuario)) {

            //   VARIABLES PARA GUARDAR LOS DATOS DEL ARREGLO
            $id = $consulta['id_usuario'];
            $nombre = $consulta['nombre_usuario'];
            $palabra = $consulta['palabra_recuperacion'];
            $contrasenia = $consulta['contraseña_usuario'];
            $registro = 1;
        ?>

            <!-- SE ALMACENAN LOS DATOS CONSULTADOS -->
            <tr>
                <td><?php echo $id ?></th>
                <td><?php echo $nombre ?></th>
                <td><?php echo $palabra ?></th>
                <td><?php echo $contrasenia ?></th>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}

// CONDICION PARA VALIDAR SI LOS DATOS INTRODUCIDOS NO EXISTEN
if ($registro == 0) {
    echo "<script> alert('¡EL NOMBRE DE USUARIO O PALABRA CLAVE NO EXISTE! ¡VERIFIQUE!');
				location.href='olvido_contraseña.php';
	 		</script>";
}

// SI EXISTEN DATOS CONTINUA
if ($registro == 1) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- TITULO DE LA PESTAÑA -->
        <title>NUEVA CONTRASEÑA</title>

        <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
        <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

        <!-- LINK OLVIDO CONTRASEÑA CSS -->
        <link rel="stylesheet" href="../CSS/recuperar_contraseña.css">
    </head>

    <body>

        <!-- FLECHA ATRAS -->
        <div><a href="../PHP/olvido_contraseña.php" class="flecha">Atras</a></div>

        <!-- CREACION FORMULARIO -->
        <div>
            <form class="formulario" action="actualizar_usu.php" method="post" autocomplete="off">

                <!-- TEXTO RECUPERAR CONTRASEÑA -->
                <strong>
                    <h2>Nueva Contraseña</h2>
                </strong>
                <br>
                <div>
                    <label hidden name="idregistro"> Id Usuario: </label>
                    <input hidden required type="text" name="id" value="<?php echo $id ?>"> <br> <br>
                    <strong><label class="contraseñalab" name="contrasenia"> Nueva Contraseña: </label></strong>
                    <input type="password" class="contraseñainp" required maxlength="100" name="contrasenia" value="">
                    <br><br><br>
                    <input type="submit" class="boton" name="actualizar" value="Actualizar">
            </form>

        <?php
    }
        ?>
        </div>
        </form>
        </div>

        <!-- LOGO SOFTWARE -->
        <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
    </body>

    </html>