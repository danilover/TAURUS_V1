<!-- FUNCIONES PARA CERRAR SESION Y DELVOLVER A PAGINA ESPECIFICA -->
<?php
session_start();
session_destroy();
header("location: index.php");
?>