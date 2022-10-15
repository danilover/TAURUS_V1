<?php
// crear variables para recibir datos del formulario
// trim = función para quitar espacio en blanco del inicio o final del dato capturado
require "conexion_bd.php";

if (isset($_POST['actualizar'])) {
    $id = ($_POST['id']);
    $contrasenia = ($_POST['contrasenia']);
    $actualiza = 0;
    // ENCRIPTAR CONTRASEÑA
    $encriptar = password_hash($contrasenia, PASSWORD_DEFAULT);

    $actualizar = "UPDATE usuarios SET contraseña_usuario='" . $encriptar . "'WHERE id_usuario= '" . $id . "'";
    $resultado = mysqli_query($conexion, $actualizar);

    // CONDICIONAL PARA VALIDAR DATOS CORRECTOS
    if ($resultado) {
        echo "<script> alert('¡DATOS ACTUALIZADOS!');location.href='index.php';</script>";
    } else {
        echo "<script> alert('¡ERROR AL ACTUALIZAR!, ¡VERIFIQUE!');location.href='recuperar_contraseña.php';</script>";
    }
}
