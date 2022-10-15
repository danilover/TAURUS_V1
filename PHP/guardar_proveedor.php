<?php
// CONEXION BASE DE DATOS
require "conexion_bd.php";

// VARIABLES PARA GUARDAR DATOS PROVEEDOR
$nit = $_POST['nit'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

// FECHA, HORA Y ZONA HORARIA PARA CONTROL DEL REGISTRO
date_default_timezone_set("America/Bogota");
$fecha = date("y-m-d H:i:s");

// CONSULTA SQL PARA GUARDAR DATOS
$reg_proveedor = "INSERT INTO proveedores(nit_proveedor, nombre_proveedor, direccion_proveedor, telefono_proveedor, fecha_hora_registro) VALUES ('$nit', '$nombre', '$direccion', '$telefono', '$fecha')";

// REALIZAR CONEXION BD Y REGISTRO DE NUEVOS DATOS
$guardar = mysqli_query($conexion, $reg_proveedor);

// VALIDADCION DE DATOS
if ($guardar) {
    echo "<script> alert('¡REGISTRADO CON EXITO!');location.href='menu_proveedores.php';</script>";
}
