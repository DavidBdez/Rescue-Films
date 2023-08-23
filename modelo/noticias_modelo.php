<?php

class Noticias_modelo {

    private $db;
    private $noticias;

    public function __construct() {
        require_once("conectar.php");
        $this->db = Conectar::conexion();
        $this->noticias = array();
    }

    public function get_noticias() {

        $sql = "SELECT * from noticias ";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->noticias[] = $registro;
        }
        return $this->noticias;


    }

    public function crear_noticia($encabezado, $cuerpo, $img, $subidaPor) {

        $sql = "INSERT INTO noticias (encabezado, cuerpo, img, subidaPor) VALUES ('$encabezado', '$cuerpo', '$img', '$subidaPor')";
        $this->db->query($sql);
    }

    public function borrar_noticia($id) {

        $sql = "DELETE FROM noticias WHERE id = '$id'";
        if($this->db->query($sql)) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->db->error;
            return false;
        }

}

public function get_noticia_por_id($id) {
    $sql = "SELECT noticias.*, usuarios.nombre as nombreUsuario FROM noticias 
            LEFT JOIN usuarios ON noticias.subidaPor = usuarios.id 
            WHERE noticias.id = ?";
    if ($stmt = $this->db->prepare($sql)) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        }
    }
    return false;
}


}


?>