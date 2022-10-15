<?php
// CONEXION BASE DE DATOS 
require "conexion_bd.php";

// CREACION VARIABLES PARA GUARDAR DATOS DEL FORMULARIO USUARIOS
$nombre_usuario = $_POST['nombre_usuario'];
$contraseña_usuario = ($_POST['contraseña_usuario']);
$cargo_usuario = $_POST['cargo_usuario'];
$palabra_recuperacion = $_POST['palabra_recuperacion'];

// VARIABLES ZONA HORARIA Y FECHA
date_default_timezone_set("America/Bogota");
$fecha_registro = date("y-m-d H:i:s");

// ENCRIPTAR CONTRASEÑA
$encriptar = password_hash($contraseña_usuario, PASSWORD_DEFAULT);

// INSERTAR DATOS Y ENVIAR SENTENCIA SQL
$registro_perfil = "INSERT INTO usuarios (nombre_usuario, contraseña_usuario, cargo_usuario, fecha_hora_registro, palabra_recuperacion) VALUES ('$nombre_usuario','$encriptar','$cargo_usuario', '$fecha_registro', '$palabra_recuperacion')";


// VERIFICAR QUE LA PALABRA DEL USUARIO NO SE REPITA EN LA BASE DE DATOS
$v_palabra = mysqli_query($conexion, "SELECT * FROM usuarios WHERE palabra_recuperacion='$palabra_recuperacion'");

// SI ENCUENTRA UNA FILA MAYOR A 0, O DATO EXISTENTE EN UNA FILA, EL CORREO YA EXISTE
if (mysqli_num_rows($v_palabra) > 0) {

    echo "<script> alert ('¡PALABRA INVALIDA!, ¡INTRODUZCA OTRA!');
     location.href='registrar_usuario.php';
     </script>";

    //  SI SE CUMPLE LA CONDICION FINALIZA LA EJECUCION DEL SCRIPT
    exit();
}

// VERIFICAR QUE EL NOMBRE DEL USUARIO NO SE REPITA EN LA BASE DE DATOS
$v_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombre_usuario='$nombre_usuario'");

// SI ENCUENTRA UNA FILA MAYOR A 0, O DATO EXISTENTE EN UNA FILA, EL USUARIO YA EXISTE
if (mysqli_num_rows($v_usuario) > 0) {

    echo "<script> alert ('¡EL USUARIO INTRODUCIDO YA EXISTE!, ¡INTENTALO DE NUEVO!');
     location.href='registrar_usuario.php';
     </script>";

    //  SI SE CUMPLE LA CONDICION FINALIZA LA EJECUCION DEL SCRIPT
    exit();
}

// REALIZAR CONEXION BD Y REGISTRO DE NUEVOS DATOS
$insertar = mysqli_query($conexion, $registro_perfil);

// VALIDACION Y NOTIFICACION REGISTRO EXITOSO 
if ($insertar) {

    echo "<script> alert ('¡REGISTRADO CON EXITO!');
    location.href='index.php';
    </script>";
}
