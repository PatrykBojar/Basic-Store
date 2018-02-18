<?php
/**
 * Conecta la base de datos.
 */
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "user", "user", "store03");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>
