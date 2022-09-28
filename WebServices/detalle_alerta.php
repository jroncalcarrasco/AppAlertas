<?php

/**
 * @author Jessica Maribel Roncal
 *
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $user = $db->detailsAlerta($id);
    if (true) {
        $response["error"] = FALSE;
        $response["user"]["id"] = $user["id"];
        $response["user"]["titulo"] = $user["titulo"];
        $response["user"]["descripcion"] = $user["descripcion"];
        $response["user"]["latitud"] = $user["latitud"];
        $response["user"]["longitud"] = $user["longitud"];
        $response["user"]["fecha"] = $user["fecha"];
        $response["user"]["estado"] = $user["estado"];
        $response["user"]["foto"] = $user["foto"];
        $response["user"]["alerta"] = $user["alerta"];
        $response["user"]["registrada_por"] = $user["registrada_por"];
        $response["user"]["atendida_por"] = $user["atendida_por"];
     
  $response["user"]["respuesta"] = $user["respuesta"];
  $response["user"]["fecha_respuesta"] = $user["fecha_respuesta"];
       

       echo json_encode($response);
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Error al registrar nueva alerta!";
        echo json_encode($response);
   }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Parametros requeridos";
  echo json_encode($response);
}
?>
