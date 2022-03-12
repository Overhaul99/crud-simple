<?php 

include_once('conexion.php');

$sentencia = $base_de_datos->query("SELECT * FROM personas;");
$personas = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($persona);

?>