<?php

/**
 * @author Ravi Tamada
 * @link http://www.androidhive.info/2012/01/android-login-and-registration-with-php-mysql-and-sqlite/ Complete tutorial
 */

require_once 'include/DB_Functions.php';
$db = new DB_Functions();

$response = array("error" => FALSE);

if (isset($_POST['id'])) {

    $id = $_POST['id'];

    $user = $db->deleteAlerta($id);
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
