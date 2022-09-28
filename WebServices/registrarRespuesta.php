<?php

/**
 * @author Jessica Maribel Roncal
 *
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);
if (isset($_POST['id']) && isset($_POST['descripcion']) &&
isset($_POST['fecha'])) {


    $id = $_POST['id'];
    $descripcion = $_POST['descripcion'];
    $fecha  = $_POST['fecha'];

    $iduser  = $_POST['iduser'];

    $user = $db->registrarRespuesta($id, $descripcion,  $fecha, $iduser);
    if (true) {
        $response["error"] = FALSE;
        $response["error_msg"] = "Alerta atendida con exito";
        echo json_encode($response);
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Error al regustrar respuesta";
        echo json_encode($response);
   }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Requiere enviar campos como parametros!";
  echo json_encode($response);
}
?>
