<?php

/**
 * @author Jessica Maribel Roncal
 *
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);
if (isset($_GET['estacion']) && isset($_GET['nombre']) &&
isset($_GET['apellido']) &&
isset($_GET['rol'])) {


    $estacion = $_GET['estacion'];
    $nombre = $_GET['nombre'];
    $apellido  = $_GET['apellido'];
    $placa = $_GET['placa'];
    $rol = $_GET['rol'];
    $usuario = $_GET['usuario'];
    $password = $_GET['password'];

    $user = $db->registrarSerenasgo($estacion, $nombre, $apellido, $placa, $rol, $usuario, $password);
    if (true) {
        $response["error"] = FALSE;
        $response["user"]["id"] = $user["id"];
        $response["user"]["usuario"] = $user["usuario"];
        $response["user"]["fecha_registro"] = $user["fecha_registro"];
        $response["user"]["estado"] = $user["estado"];
        $response["user"]["rol"] = $user["rol"];
        echo json_encode($response);
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Error al regustrar usuario";
        echo json_encode($response);
   }
}
?>
