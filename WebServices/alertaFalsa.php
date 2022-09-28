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
   echo "adriancho";

    $id = $_POST['id'];
    $user = $db->ActualizarAlertaFalsa($id);
    if (true) {
        $response["error"] = FALSE;
        $response["error_msg"] = "Alerta actualizada con exito";
        echo json_encode($response);
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Error al actualizar la alerta";
        echo json_encode($response);
   }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Requiere enviar campos como parametros!";
  echo json_encode($response);
}
?>
