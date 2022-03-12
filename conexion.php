<?php 

$password = 'admin';
$user = 'root';
$db = 'crud_php';

try {
    $base_de_datos = new PDO('mysql:host=localhost; dbname='.$db, $user, $password);
    // echo "Todo Correcto";
} catch (Exception $e) {
    echo "Ocurrio un error al conectarse " .$e->getMessage();
}