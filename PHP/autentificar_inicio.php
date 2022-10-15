<?php
// CONEXION BASE DE DATOS 
require "conexion_bd.php";

// INICIAR SESION
session_start();

// CREACION VARIABLES PARA DATOS DE INICIO
$usuario = trim($_POST['usuario']);
$contraseña = ($_POST['contraseña']);
$cargo = ($_POST['cargo']);

// SENTENCIA SQL PARA BUSCAR DATOS USUARIO NOMBRE Y CARGO
$ingreso_usu = "SELECT * FROM usuarios WHERE nombre_usuario='$usuario' AND cargo_usuario='$cargo'";

// REQUIERE CONEXION Y DATOS BUSCADOS DE LA CONSULTA SQL
$buscar_usu = mysqli_query($conexion, $ingreso_usu);

// DELVUELVE NUMERO DE FILAS COINCIDENTES AL DATO SOLICITADO
$fila = mysqli_num_rows($buscar_usu);

// MUESTRA LOS DATOS ENCONTRADOS DE LAS COLUMNAS
$perfil = mysqli_fetch_array($buscar_usu);

// VALIDACION DE FILA Y CONTRASEÑA DEL USUARIO, INGRESO INICIO
if (($fila == 1) && (password_verify($contraseña, $perfil['contraseña_usuario']))) {
    $_SESSION['usuario'] = $usuario;
    echo "<script> alert('¡BIENVENIDO $usuario!');
    location.href = 'inicio.php';</script>";

    // ALERTA DE ERROR DE VERIFICACION
} else {
    echo "<script> alert('¡ERROR!, DATOS INCORRECTOS, ¡VERIFIQUE!');
    location.href='index.php';
    </script>";
}
