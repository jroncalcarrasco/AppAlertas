<?php


/**
 * @author Jessica Maribel Roncal
 *
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);
if (isset($_POST['correo']) && isset($_POST['password']) &&
isset($_POST['repassword'])) {

    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $repassword  = $_POST['repassword'];

    $user = $db->recuperarUsuario($correo, $password, $repassword);
    if (true) {
        $response["error"] = FALSE;
        $response["user"]["id"] = $user["id"];
        $response["user"]["usuario"] = $user["usuario"];
        $response["user"]["fecha_registro"] = $user["fecha_registro"];
        $response["user"]["estado"] = $user["estado"];
        $response["user"]["fkrol"] = $user["fkrol"];

        echo json_encode($response);
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Error al recuperar acceso Intentelo nuevamente";
        echo json_encode($response);
   }
}
?>
