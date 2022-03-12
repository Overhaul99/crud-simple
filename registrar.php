<?php

include_once('conexion.php');

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$sexo = $_POST["sexo"];
$dni = $_POST["dni"];

$sentencia = $base_de_datos->prepare("INSERT INTO personas(nombre, apellidos, sexo, dni) VALUES (:nombre, :apellidos, :sexo, :dni);");

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