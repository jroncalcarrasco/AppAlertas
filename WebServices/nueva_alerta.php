<?php

/**
 * @author Jessica Maribel Roncal
 *
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();
// json response array
$response = array("error" => FALSE);
if (isset($_POST['id']) && isset($_POST['tipo']) && isset($_POST['titulo']) &&
isset($_POST['descripcion'])) {

    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $titulo = $_POST['titulo'];
    $descripcion  = $_POST['descripcion'];
    $latitud  = $_POST['latitud'];
    $longitud  = $_POST['longitud'];
    $ubicacion  = $_POST['ubicacion'];
    $image  = $_POST['imagen'];

    $filename="IMG".rand().".jpg";
    file_put_contents("images/".$filename,base64_decode($image));

    $user = $db->registrarAlerta($id ,$tipo, $titulo, $descripcion, $latitud, $longitud, $ubicacion, $filename);
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
