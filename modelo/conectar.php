<?php
class Conectar{
    public static function conexion(){
        try {
            $conexion = new mysqli("bbdd.rescuefilms.com","ddb203896","Rescuefilms2023","ddb203896");
        } catch (Exception $e) {
                die("Error: ".$e ->getmessage());
        }
        return $conexion;
    }
}
?>