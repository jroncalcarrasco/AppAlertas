<?php


/**
 * @author Jessica Maribel Roncal
 *
 */

class DB_Connect {
    private $conn;
    public function connect() {
        require_once 'include/Config.php';
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        $this->conn->query("SET lc_time_names = 'es_ES'");
        return $this->conn;
    }
}
?>
