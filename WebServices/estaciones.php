<?php
    $server = "HOST DE SU SERVIDOR";
    $user = "USUARIO DE SU BASE DATOS";
    $pass = "CONTRASEÑA DE SU BASE DATOS";
    $bd = "NOMBRE DE SU BASE DE DATOS";

   $conexion = mysqli_connect($server, $user, $pass,$bd)
   or die("Ha sucedido un error inexperado en la conexion de la base de datos");

   $sql = "SELECT * FROM estacion";
   mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
   if(!$result = mysqli_query($conexion, $sql)) die();
   $estacion = array(); //creamos un array
   while($row = mysqli_fetch_array($result))
   {
          $id=$row['id'];
          $nombre=$row['nombre'];
          $latitud=$row['latitud'];
          $longitud=$row['longitud'];
          $icono=$row['icono'];

          $estacion[] = array('id'=> $id,'nombre'=> $nombre,'latitud'=> $latitud, 'longitud'=> $longitud, 'icono' => $icono);
   }

   $close = mysqli_close($conexion)
   or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
   $json_string = json_encode($estacion);
   echo $json_string;


?>
