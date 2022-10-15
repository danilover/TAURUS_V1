<?php
// CONEXION BASE DE DATOS
require "conexion_bd.php";

// VARIABLES PARA GUARDAR DATOS PRODUCTO
$factura = ($_POST['factura']);
$cantidad = ($_POST['cantidad']);
$precio = ($_POST['precio']);
$referencia = ($_POST['referencia']);
$proveedor = ($_POST['proveedor']);

// FECHA, HORA Y ZONA HORARIA PARA CONTROL DEL REGISTRO
date_default_timezone_set("America/Bogota");
$fecha = date("y-m-d H:i:s");

// CONSULTA SQL PARA GUARDAR DATOS
$reg_compra = "INSERT INTO compras(numero_factura, cantidad, precio_unidad, fecha_compra, referencia_producto, proveedor) VALUES ('$factura', '$cantidad', '$precio', '$fecha', '$referencia', '$proveedor')";


// REALIZAR CONEXION BD Y REGISTRO DE NUEVOS DATOS
$insertar = mysqli_query($conexion, $reg_compra);

// VALIDACION Y NOTIFICACION REGISTRO EXITOSO 
if ($insertar) {

    echo "<script> alert ('¡COMPRA REGISTRADA CON EXITO!');
    location.href='menu_compras.php';
    </script>";
}
