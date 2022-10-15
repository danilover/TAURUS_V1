<?php
// CONEXION BASE DE DATOS
require "conexion_bd.php";

// VARIABLE PARA GUARDAR LOS DATOS DEL BUSCADOR
$buscar_p = $_POST['buscar_p'];

// VERIFICAR QUE EL NIT PROVEEDOR EXISTA EN LA BASE DE DATOS
$v_proveedor = mysqli_query($conexion, "SELECT * FROM proveedores WHERE nit_proveedor='$buscar_p' OR nombre_proveedor='$buscar_p'");

// SI ENCUENTRA UNA FILA MENOR A 1, O FILA VACIA, EL DATO BUSCADO NO EXISTE
if (mysqli_num_rows($v_proveedor) < 1) {
    echo "<script> alert ('¡EL NIT O NOMBRE BUSCADO NO EXISTE!, ¡INTENTALO DE NUEVO!');
location.href='menu_proveedores.php';
</script>";

    //  SI SE CUMPLE LA CONDICION FINALIZA LA EJECUCION DEL SCRIPT
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- TITULO DE LA PESTAÑA  -->
    <title>PROVEEDORES</title>

    <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
    <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">

    <!-- LINK PROVEEDORES CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/menu_proveedores.css">
</head>

<body>

    <!-- FLECHA ATRAS -->
    <div><a href="../PHP/menu_proveedores.php" class="flecha">Atras</a></div>

    <!-- TEXTO PROVEEDORES -->
    <h2>Proveedores</h2>
    <br><br><br><br><br>

    <!-- BUSCADOR -->
    <div class="buscador">
        <form action="buscar_proveedores.php" method="post" autocomplete="off">
            <label for="" class="texto">Nombre / Nit</label>
            <input type="search" placeholder="Buscar" class="input" name="buscar_p" required>
        </form>
    </div>
    <br><br><br><br><br><br>

    <!-- CREACION TABLA PROVEEDORES -->
    <div>
        <table>
            <tr>
                <th>Id</th>
                <th>Nit</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Editar</th>
            </tr>

            <!-- MOSTRAR DATOS PROVEEDORES BD -->
            <?php
            $consulta = "SELECT * FROM proveedores WHERE nit_proveedor='$buscar_p' OR nombre_proveedor='$buscar_p'";

            // VALIDAR CONSULTA EN LA DB Y MOSTRAR DATOS BUSCADOS
            $validar = mysqli_query($conexion, $consulta);
            while ($mostrar = mysqli_fetch_array($validar)) {
                echo "<tr>";
                echo "<td>" . $mostrar['id_proveedor'] . "</td>";
                echo "<td>" . $mostrar['nit_proveedor'] . "</td>";
                echo "<td>" . $mostrar['nombre_proveedor'] . "</td>";
                echo "<td>" . $mostrar['direccion_proveedor'] . "</td>";
                echo "<td>" . $mostrar['telefono_proveedor'] . "</td>";
                echo "<td>";
                echo "<a class='editar' href='editar_proveedor.php?id_proveedor=" . $mostrar['id_proveedor'] . "'>Editar</a>&#160  &#160  &#160 ";
                echo "</td>";
                echo "</tr>";
            }
            ?>

        </table>
    </div>
    <br><br>

    <!-- LOGO SOFTWARE -->
    <img src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1" class="logo">
</body>

</html>