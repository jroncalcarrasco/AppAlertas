<?php

/**
 * @author Jessica Maribel Roncal
 *
 */

class DB_Functions {
    private $conn;

    function __construct() {
        require_once 'DB_Connect.php';
        $db = new Db_Connect();
        $this->conn = $db->connect();
    }

    // destructor
    function __destruct() {}

   public function consultarAlertas($iduser, $tipoalerta) {
        $stmt = $this->conn->prepare("SELECT * FROM alerta AS a
          WHERE a.alerta = ? AND a.fkusuario = ? ");

       $stmt->bind_param("ss", $tipoalerta, $iduser);

        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        } else {
            return NULL;
        }
    }


    public function deleteAlerta($id) {
       $stmt = $this->conn->prepare("DELETE FROM alerta WHERE id = $id");
       if ($stmt->execute()) {
           $stmt->close();
       }
        return true;
    }

      public function ActualizarAlertaFalsa($id) {
          $stmt = $this->conn->prepare("UPDATE alerta SET  estado = 'alerta falsa'  WHERE id = ?");
          $stmt->bind_param("ssss", $descripcion, $now, $iduser,  $id);
          $result = $stmt->execute();
          $stmt->close();
          if ($result) {
              return true;
          } else {
              return false;
          }
      }

      public function ActualizarAlertaNoAtendida($id) {
          $stmt = $this->conn->prepare("UPDATE alerta SET  estado = 'no atendida'  WHERE id = ?");
          $stmt->bind_param("ssss", $descripcion, $now, $iduser,  $id);
          $result = $stmt->execute();
          $stmt->close();
          if ($result) {
              return true;
          } else {
              return false;
          }
      }



       public function registrarRespuesta($id ,$descripcion, $fecha, $iduser) {
           date_default_timezone_set('America/Mexico_City');
           $now = date('Y-m-d H:i:s');

           $stmt = $this->conn->prepare("UPDATE alerta SET respuesta = ?, fecha_respuesta = ?, atendida_por = ?, estado = 'ATENDIDO'  WHERE id = ?");
           $stmt->bind_param("ssss", $descripcion, $now, $iduser,  $id);
           $result = $stmt->execute();
           $stmt->close();
           if ($result) {
               return true;
           } else {
               return false;
           }
       }






   public function registrarAlerta($id ,$tipo, $titulo, $descripcion, $latitud, $longitud, $ubicacion , $image) {
       date_default_timezone_set('America/Mexico_City');
       $fecha = date('Y-m-d H:i:s');
      $mysqli = new mysqli("HOST DE SU SERVIDOR", "USUARIO DE SU BASE DATOS", "CONTRASEÑA DE SU BASE DATOS", "NOMBRE DE SU BASE DE DATOS");
       $consulta = "SELECT MAX(id) AS id FROM ciudadano WHERE fkusuario = '{$id}'";
       $resultado = $mysqli->query($consulta);
       $fila = $resultado->fetch_row();

       $stmt = $this->conn->prepare("INSERT INTO alerta(titulo, descripcion, fecha, alerta, registrada_por, latitud, longitud, foto) VALUES( ?, ?, ?, ?, ?, ?, ?, ?)");
       $stmt->bind_param("ssssssss", $titulo, $descripcion, $fecha ,$tipo ,$fila[0], $latitud, $longitud, $image);
       $result = $stmt->execute();
       $stmt->close();
       if ($result) {
           return true;
       } else {
           return false;
       }
   }


      public function registrarSerenasgo($estacion, $nombre, $apellido, $placa, $rol, $usuario, $password) {
          $hash = $this->hashSSHA($password);
          $encrypted_password = $hash["encrypted"]; // encrypted password
          $salt = $hash["salt"]; // salt
          $estado = 'activo';
          date_default_timezone_set('America/Mexico_City');
          $now = date('Y-m-d H:i:s');
          $stmt = $this->conn->prepare("INSERT INTO usuario(usuario, contrasena, fecha_registro, estado, hash, rol) VALUES( ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("ssssss", $usuario, $encrypted_password, $now ,$estado, $salt, $rol);
          $result = $stmt->execute();
          $stmt->close();
          if ($result) {
                   $mysqli = new mysqli("HOST DE SU SERVIDOR", "USUARIO DE SU BASE DATOS", "CONTRASEÑA DE SU BASE DATOS", "NOMBRE DE SU BASE DE DATOS");
              $consulta = "SELECT MAX(id) AS id FROM usuario WHERE usuario = '{$usuario}'";
              $resultado = $mysqli->query($consulta);
              $fila = $resultado->fetch_row();


              $consulta1 = "SELECT MAX(id) AS id FROM estacion WHERE nombre = '{$estacion}'";
              $resultado1 = $mysqli->query($consulta1);
              $fila1 = $resultado1->fetch_row();


              $stmt = $this->conn->prepare("INSERT INTO serenasgo(numero_serie, nombre, apellido, fkusuario, fkestacion) VALUES( ?, ?, ?, ?, ?)");
              $stmt->bind_param("sssss", $placa, $nombre, $apellido , $fila[0],  $fila[1]);
              $result = $stmt->execute();

              $stmt = $this->conn->prepare("SELECT * FROM usuario AS s WHERE usuario = '{$usuario}'");
              $stmt->execute();
              $user = $stmt->get_result()->fetch_assoc();
              $stmt->close();

              return $user;
          } else {
              return false;
          }
      }



     public function registrarUsuario($dni, $nombre, $apellido, $correo, $movil, $usuario, $password, $rol) {
         $hash = $this->hashSSHA($password);
         $encrypted_password = $hash["encrypted"]; // encrypted password
         $salt = $hash["salt"]; // salt
         $estado = 'activo';
         date_default_timezone_set('America/Mexico_City');
         $now = date('Y-m-d H:i:s');
         $stmt = $this->conn->prepare("INSERT INTO usuario(usuario, contrasena, fecha_registro, estado, hash, rol) VALUES( ?, ?, ?, ?, ?, ?)");
         $stmt->bind_param("ssssss", $usuario, $encrypted_password, $now ,$estado, $salt, $rol);
         $result = $stmt->execute();
         $stmt->close();
         if ($result) {
                  $mysqli = new mysqli("HOST DE SU SERVIDOR", "USUARIO DE SU BASE DATOS", "CONTRASEÑA DE SU BASE DATOS", "NOMBRE DE SU BASE DE DATOS");
             $consulta = "SELECT MAX(id) AS id FROM usuario WHERE usuario = '{$usuario}'";
             $resultado = $mysqli->query($consulta);
             $fila = $resultado->fetch_row();

             $stmt = $this->conn->prepare("INSERT INTO ciudadano(dni, nombre, apellido, correo, num_telefono, fkusuario) VALUES( ?, ?, ?, ?, ?, ?)");
             $stmt->bind_param("ssssss", $dni, $nombre, $apellido ,$correo, $movil, $fila[0]);
             $result = $stmt->execute();

             $stmt = $this->conn->prepare("SELECT * FROM usuario AS s WHERE usuario = '{$usuario}'");
             $stmt->execute();
             $user = $stmt->get_result()->fetch_assoc();
             $stmt->close();

             return $user;
         } else {
             return false;
         }
     }


      public function recuperarUsuario($correo, $password, $repassword) {
          $hash = $this->hashSSHA($password);
          $encrypted_password = $hash["encrypted"]; // encrypted password
          $salt = $hash["salt"]; // salt

          $stmt = $this->conn->prepare("UPDATE usuario SET hash = ?, contrasena = ? WHERE correo = ?");
          $stmt->bind_param("sss", $salt, $encrypted_password, $correo);
          $result = $stmt->execute();
          $stmt->close();
          if ($result) {
              $stmt = $this->conn->prepare("SELECT * FROM usuario AS s WHERE correo = '{$correo}'");
              $stmt->execute();
              $user = $stmt->get_result()->fetch_assoc();
              $stmt->close();

              return $user;
          } else {
              return false;
          }
      }




  public function detailsAlerta($id) {
       $stmt = $this->conn->prepare("SELECT * FROM alerta AS a WHERE a.id = ? ");
       $stmt->bind_param("s",$id);
       if ($stmt->execute()) {
           $user = $stmt->get_result()->fetch_assoc();
           $stmt->close();
            return $user;
       } else {
           return NULL;
       }
   }



   public function getUserByEmailAndPassword($usuario, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM usuario AS u WHERE u.usuario = ? ");
        $stmt->bind_param("s",$usuario);
        if ($stmt->execute()) {
            $user = $stmt->get_result()->fetch_assoc();
            $stmt->close();
            $salt = $user['hash'];
            $encrypted_password = $user['contrasena'];
            $hash = $this->checkhashSSHA($salt, $password);
            if ($encrypted_password == $hash) {
                return $user;
            }
        } else {
            return NULL;
        }
    }


    public function isUserExisted($email) {
        $stmt = $this->conn->prepare("SELECT correo from usuario WHERE correo = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->close();
            return true;
        } else {
            $stmt->close();
            return false;
        }
    }

    /**
     * Encrypting password
     * @param password
     * returns salt and encrypted password
     */
    public function hashSSHA($password) {
        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);
        return $hash;
    }

    /**
     * Decrypting password
     * @param salt, password
     * returns hash string
     */
    public function checkhashSSHA($salt, $password) {
        $hash = base64_encode(sha1($password . $salt, true) . $salt);
        return $hash;
    }
}

?>
