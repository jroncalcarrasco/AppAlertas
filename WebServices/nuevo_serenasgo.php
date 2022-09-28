<?php

/**
 * @author Jessica Maribel Roncal
 *
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);
if (isset($_POST['estacion']) && isset($_POST['nombre']) && isset($_POST['apellido']) &&
isset($_POST['placa'])) {

    $estacion = $_POST['estacion'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $placa  = $_POST['placa'];

    $user = $db->registrarSerenasgo($estacion ,$nombre, $apellido, $placa);
    if (true) {
        $response["error"] = FALSE;
        $response["error_msg"] = "Registrado con exito";
        echo json_encode($response);
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Error al registrar nueva alerta!";
        echo json_encode($response);
   }
}
?>
