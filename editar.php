<?php

include_once('conexion.php');

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$sexo = $_POST["sexo"];
$dni = $_POST["dni"];

$sentencia = $base_de_datos->prepare("UPDATE personas SET nombre= :nombre, apellidos= :apellidos, sexo= :sexo, dni= :dni WHERE id= :id;");

$sentencia->bindParam(':id', $id);
$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':apellidos', $apellidos);
$sentencia->bindParam(':sexo', $sexo);
$sentencia->bindParam(':dni', $dni);

if($sentencia->execute()) {
    return header("Location: index.php");
} else {
    return "Error";
}

?>