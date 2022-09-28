<?php

/**
 * @author Jessica Maribel Roncal
 *
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);
if (isset($_POST['dni']) && isset($_POST['nombre']) &&
isset($_POST['apellido']) && isset($_POST['correo']) &&
isset($_POST['movil']) && isset($_POST['usuario']) &&  isset($_POST['password'])) {


    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $apellido  = $_POST['apellido'];
    $correo = $_POST['correo'];
    $movil = $_POST['movil'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    $user = $db->registrarUsuario($dni, $nombre, $apellido, $correo, $movil, $usuario, $password, $rol);
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
