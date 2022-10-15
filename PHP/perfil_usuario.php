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
    <title>PERFIL</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK PERFIL USUARIO CSS -->
    <link rel="stylesheet" href="../CSS/perfil_usuario.css">
</head>

<body>

    <!-- GUARDAR DATOS AL DAR CLIN EN ENVIAR -->
    <?php
    if (isset($_POST['guardar'])) {
        $id = $_POST['id'];
        $nombre = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $cargo = $_POST['cargo'];

        // SENTENCIA SQL PARA ACTUALIZAR DATOS
        $actualizar = "UPDATE usuarios SET nombre_usuario='" . $nombre . "', contraseña_usuario='" . $contraseña . "' WHERE id_usuario= '" . $id . "'";
        $resultado = mysqli_query($conexion, $actualizar);

        // CONDICIONAL PARA VALIDAR DATOS CORRECTOS
        if ($resultado) {
            echo "<script> alert('¡DATOS ACTUALIZADOS!');location.href='perfil_usuario.php';</script>";
        } else {
            echo "<script> alert('¡ERROR AL ACTUALIZAR!, ¡VERIFIQUE!');location.href='perfil_usuario.php';</script>";
        }

        // SENTENCIA SQL PARA CONSULTAR DATOS DEL CAMPO SELECCIONADO
    } else {
        $id = $_GET['id_usuario'];
        $buscar = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conexion, $buscar);
        $fila = mysqli_fetch_assoc($resultado);

        // DATOS A MOSTRAR
        $id = $fila["id_usuario"];
        $nombre = $fila["nombre_usuario"];
        $contraseña = $fila["contraseña_usuario"];

    ?>

        <!-- FLECHA ATRAS -->
        <div><a href="../PHP/inicio.php" class="flecha">Atras</a></div>

        <!-- TEXTO PERFIL USUARIO -->
        <h2>Perfil Usuario</h2>
        <br>

        <!-- FORMULARIO PERFIL USUARIO -->
        <div class="formulario">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off">

                <!-- IMAGEN DEL USUARIO -->
                <img src="../CSS/icono_perfil_usuario.webp" alt="Imagen Perfil Usuario" class="perfil_img">
                <br><br><br>

                <!-- <div><strong><label class="nomusuario">Id</label></strong>
                    <input type="text" class="username" name="id" value="<?php echo $id; ?>">
                </div> -->

                <!-- CREACION TEXTO NOMBRE USUARIO -->
                <div><strong><label class="nomusuario">Nombre de usuario</label></strong>

                    <!-- CREACION INPUT USUARIO -->
                    <input type="text" class="username" name="usuario" required maxlength="12" readonly value="<?php echo $nombre; ?>">
                </div>
                <br><br>

                <!-- CREACION TEXTO CONTRASEÑA -->
                <div><strong><label class="crecontraseña">Contraseña</label></strong>

                    <!-- CREACION INPUT CONTRASEÑA -->
                    <input type="password" class="contraseña" name="contraseña" required maxlength="15" readonly value="<?php echo $contraseña; ?>">
                </div>
                <br><br>

                <!-- FUNCION VER CONTRASEÑA -->
                <script type="text/javascript">
                    function mostrar() {
                        var ver = document.getElementById("contraseña");
                        if (ver.type == "password") {
                            ver.type = "text";
                        } else {
                            ver.type = "password";
                        }
                    }
                </script>

                <!-- CREACION TEXTO CARGOS -->
                <label class="texcargos">Seleccionar Cargo</label>
                <br><br>

                <!-- CREACION LISTA CARGOS -->
                <select class="cargos" name="cargo" required>
                    <option value="" selected disabled>Seleccione cargo

                        <!-- CONEXION A LA BD Y CONSULTA SQL PARA PEDIR INFORMACION DE LA TABLA CARGOS -->
                        <?php
                        $cargos = mysqli_query($conexion, "SELECT * FROM cargos");
                        while ($fila = $cargos->fetch_array()) {
                            echo "<option value= '" . $fila['id_cargo'] . "'>" . $fila['nombre_cargo'] . "</option>";
                        }
                        ?>
                </select>
                <br><br><br><br>

                <!-- BOTON EDITAR DATOS USUARIO -->
                <div><input type="submit" name="guardar" class="boton" value="guardar">
                </div><br><br><br>
            </form>
        <?php
    }
        ?>
        <!-- LOGO SOFTWARE -->
        <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>