<?php
class Usuarios_modelo{
    private $db;
    private $datos;

    public function __construct() {
        require_once("conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }

    public function get_usuarios(){
        $sql = "SELECT * from usuarios";
        $consulta = $this ->db->query($sql);
        while($registro = $consulta ->fetch_assoc()){
                $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function login($user, $pass){
        $sql = "SELECT * FROM usuarios WHERE nombre ='$user' AND passwd = '$pass'";
        if($consulta = $this->db->query($sql)) {
            if($consulta->num_rows > 0) {
                $row = $consulta->fetch_assoc();
                $_SESSION['usuario'] = $user;
                $_SESSION['rol'] = $row['rol'];
                $_SESSION['id'] = $row['id'];
                return true;
            } else {
                return false;
            }
        } else {
        die("Error al realizar la consulta: " . $this->db->error);
        }
    }
        

    public function eliminar_usuario($id) {
        $sql = "DELETE FROM usuarios WHERE id = $id";
        if ($this->db->query($sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
            return false;
        }
    }

    public function modificar_usuario($id, $nombre, $passwd, $correo, $rol) {
        $sql = "UPDATE usuarios SET nombre = ?, passwd = ?, correo = ?, rol = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssssi", $nombre, $passwd, $correo, $rol, $id);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function registrar_usuario($nombre, $passwd, $correo, $rol) {
        $sql = "INSERT INTO usuarios (nombre, passwd, correo, rol) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $nombre, $passwd, $correo, $rol);
    
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }


        // otros métodos...
    
        public function usuario_existe($nombre) {
            $query = "SELECT * FROM usuarios WHERE nombre = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $nombre);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->num_rows > 0;
        }
    
        public function correo_existe($correo) {
            $query = "SELECT * FROM usuarios WHERE correo = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->num_rows > 0;
        }
 
}
?>