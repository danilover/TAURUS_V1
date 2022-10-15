 <?php
    //CONEXION BASE DE DATOS PARA MOSTRAR LISTA DE CARGOS 
    require "conexion_bd.php";
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- TITULO DE LA PESTAÑA -->
     <title>REGISTRARSE</title>

     <!-- LINK REGISTRAR USUARIO CSS -->
     <link rel="stylesheet" type="text/css" href="../CSS/registrar_usuario.css">

     <!-- CREACION LOGO PESTAÑA NAVEGADOR -->
     <link rel="shortcut icon" href="../CSS/Logo_Software.jpg">
 </head>

 <body>
     <!-- FLECHA ATRAS -->
     <a href="index.php" class="flecha">Atras</a>

     <!-- TEXTO REGISTRARSE SISTEMA -->
     <h2>Registrarse en el Sistema</h2>
     <br>

     <!-- CREACION FORMULARIO INICIO SESION -->
     <div class="formulario">
         <form action="guardar_usuario.php" method="post" autocomplete="off">

             <!-- CREACION TEXTO NOMBRE USUARIO -->
             <div><strong><label class="nomusuario">Nombre de usuario</label></strong>

                 <!-- CREACION INPUT USUARIO -->
                 <input type="text" name="nombre_usuario" class="username" required maxlength="20">
             </div>
             <br><br>

             <!-- CREACION TEXTO NUEVA CONTRASEÑA -->
             <div><strong><label class="crecontraseña">Crear nueva contraseña</label></strong>

                 <!-- CREACION INPUT NUEVA CONTRASEÑA -->
                 <input type="password" name="contraseña_usuario" class="contraseña" required maxlength="25">
             </div>
             <br><br>

             <!-- CREACION TEXTO PALABRA RECUPERACION CONTRASEÑA -->
             <div><strong><label class="palabra">Palabra Recuperacion</label></strong>

                 <!-- CREACION INPUT PALABRA RECUPERACION CONTRASEÑA -->
                 <input type="text" name="palabra_recuperacion" class="inputpalabra" required maxlength="100">
             </div>
             <br><br>

             <!-- CREACION TEXTO CARGOS -->
             <strong><label class="texcargos">Seleccione Cargo</label></strong>

             <!-- CREACION LISTA CARGOS -->
             <select class="cargos" name="cargo_usuario" required>
                 <option value="" selected disabled>Seleccionar cargo</option>

                 <!-- CONEXION A LA BD Y CONSULTA SQL PARA PEDIR INFORMACION DE LA TABLA CARGOS -->
                 <?php
                    $cargos = mysqli_query($conexion, "SELECT * FROM cargos");

                    // PARA EJECUTAR LA CONSULTA SQL "while", PARA TRAER TODOS lOS DATOS DE LA FILA "fetch_array"
                    while ($fila = $cargos->fetch_array()) {
                        echo "<option value= '" . $fila['id_cargo'] . "'>" . $fila['nombre_cargo'] . "</option>";
                    }
                    ?>
             </select>
             <br><br><br>

             <!-- BOTON REGISTRAR USUARIO -->
             <div><input type="submit" name="registrar" class="boton" value="Registrarse">
             </div>
         </form>
     </div>

     <!-- LOGO SOFTWARE -->
     <img class="logo" src="../CSS/Logo_Software.jpg" alt="Logo TAURUS_V1">
 </body>

 </html>