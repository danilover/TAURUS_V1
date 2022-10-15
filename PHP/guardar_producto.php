<?php
// CONEXION BASE DE DATOS
require "conexion_bd.php";

// VARIABLES PARA GUARDAR DATOS PRODUCTO
$referencia = ($_POST['referencia']);
$marca = ($_POST['marca']);
$precio = ($_POST['precio']);
$proveedor = ($_POST['proveedor']);

// FECHA, HORA Y ZONA HORARIA PARA CONTROL DEL REGISTRO
date_default_timezone_set("America/Bogota");
$fecha = date("y-m-d H:i:s");

// CONSULTA SQL PARA GUARDAR DATOS
$reg_producto = "INSERT INTO productos(referencia_producto, marca_producto, precio_producto, fecha_hora_registro, proveedor_producto) VALUES ('$referencia', '$marca', '$precio', '$fecha', '$proveedor')";


// REALIZAR CONEXION BD Y REGISTRO DE NUEVOS DATOS
$insertar = mysqli_query($conexion, $reg_producto);

// VALIDACION Y NOTIFICACION REGISTRO EXITOSO 
if ($insertar) {

    echo "<script> alert ('¡PRODUCTO REGISTRADO CON EXITO!');
    location.href='menu_productos.php';
    </script>";
}
