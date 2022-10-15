<?php
// CONEXION BASE DE DATOS  
require "conexion_bd.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITULO PESTAÑA -->
    <title>INICIAR SESION</title>

    <!-- LINK INDEX CSS, ASOCIAR HOJA DE ESTILO CSS - PHP "type="text/css" -->
    <link rel="stylesheet" type="text/css" href="../CSS/stylo_index.css">

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">
</head>

<body>

    <!-- NOMBRE EMPRESA -->
    <h1>Electronica Universal GYM</h1>

    <!-- CREACION FORMULARIO INICIO SESION -->
    <div class="formulario">
        <h2>Ingresar al Sistema</h2>
        <br><br>
        <form action="autentificar_inicio.php" method="post" autocomplete="off">

            <!-- CREACION CONTENEDOR USUARIO -->
            <div><input type="text" name="usuario" class="username" placeholder="Usuario" required maxlength="12"></div>
            <br><br>

            <!-- CREACION CONTENEDOR CONTRASEÑA -->
            <div><input type="password" name="contraseña" class="contraseña" id="contraseña" placeholder="Contraseña" required maxlength="15">

                <!-- LOGO MIRAR CONTRASEÑA -->
                <img src="../CSS/icono_ver_contraseña.png" alt="Ver Contraseña" class="ver" id="eye" onclick="mostrar()">
                <br><br><br>

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

                <!-- BOTON INICIAR -->
                <div>
                    <input type="submit" class="boton" value="Inicio">
                </div>
                <br><br>

                <!-- LINK OLVIDAR CONTRASEÑA -->
                <a class="olvidocon" href="olvido_contraseña.php">Olvido la contraseña?</a>
                <br><br><br>
        </form>

        <!-- BOTON REGISTRARSE -->
        <a href="registrar_usuario.php" class="registrarse">Registrarse</a>
    </div>
    <br><br><br><br>

    <!-- LOGO SOFTWARE -->
    <img class="logo" src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1">

</body>

</html>