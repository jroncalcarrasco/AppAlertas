<?php

/**
 * @author Jessica Maribel Roncal
 *
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

$response = array("error" => FALSE);

if (isset($_POST['correo']) && isset($_POST['password'])) {

    $recomendacion = $_POST['correo'];
    $password = $_POST['password'];

    $user = $db->CrearUsuario($recomendacion, $password);
    if ($user != false) {
        $response["error"] = FALSE;
        echo json_encode($response);
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Login credentials are wrong. Please try again!";
     echo json_encode($response);
   }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters email or password is missing!";
  echo json_encode($response);
}
?>
