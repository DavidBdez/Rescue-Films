<?php

class Comentarios_modelo {

    private $db;
    private $comentarios;

    public function __construct() {
        require_once("conectar.php");
        $this->db = Conectar::conexion();
        $this->comentarios = array();
    }

    public function get_comentarios($idNoticia) {
        $comentarios = array();
        $sql = "SELECT comentarios.*, usuarios.nombre as nombreUsuario FROM comentarios 
                LEFT JOIN usuarios ON comentarios.idUsuario = usuarios.id 
                WHERE comentarios.idNoticia = ? 
                ORDER BY comentarios.fechaComentario DESC";
        if ($stmt = $this->db->prepare($sql)) {
            $stmt->bind_param('i', $idNoticia);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $comentarios[] = $row;
            }
        }
        return $comentarios;
    }
    
      

    public function crear_comentario($idNoticia, $idUsuario, $textoComentario) {
        $idNoticia = intval($idNoticia);
        $idUsuario = intval($idUsuario);
        $textoComentario = $this->db->real_escape_string($textoComentario);
        
        $sql = "INSERT INTO comentarios (idNoticia, idUsuario, textoComentario) VALUES ($idNoticia, $idUsuario, '$textoComentario')";
    
        if ($this->db->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
            return false;
        }
    }
    
    
    

    public function borrar_comentario($id) {

        $sql = "DELETE FROM comentarios WHERE id = '$id'";
        if($this->db->query($sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
            return false;
        }
    }
}

?>
