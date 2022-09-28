<?php
/**
 * @author Jessica Maribel Roncal
 *
 */
  require_once 'include/DB_Connect.php';
  $db = new Db_Connect();
  $conexion = $db->connect();

  if (isset($_POST['id'])) {
       $iduser = $_POST['id'];
       $estado = $_POST['estado'];

       $sql = "SELECT * FROM alerta WHERE atendida_por = 0";

       mysqli_set_charset($conexion, "utf8"); //formato de datos utf8
       if(!$result = mysqli_query($conexion, $sql)) die();
       $clientes = array(); //creamos un array
       $response["error"] = FALSE;
       while($row = mysqli_fetch_array($result))
       {
             $id=$row['id'];
             $titulo=$row['titulo'];
             $descripcion=$row['descripcion'];
             $latitud=$row['latitud'];
             $longitud=$row['longitud'];
             $fecha=$row['fecha'];
             $estado=$row['estado'];
             $foto=$row['foto'];
             $alerta=$row['alerta'];
             $registrada_por=$row['registrada_por'];
             $atendida_por=$row['atendida_por'];


             $clientes[] = array("id" => $id, "titulo" => $titulo, "descripcion" => $descripcion, "latitud" => $latitud, "longitud" => $longitud, "fecha" => $fecha, "estado" => $estado, "foto" => $foto, "alerta" => $alerta, "registrada_por" => $registrada_por, "atendida_por" => $atendida_por);
       }

       $close = mysqli_close($conexion)
       or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
       $json_string = json_encode($clientes);
       echo $json_string;
 } else {
     $response["error"] = TRUE;
     $response["error_msg"] = "Required parameters email or password is missing!";
   echo json_encode($response);
 }
?>
