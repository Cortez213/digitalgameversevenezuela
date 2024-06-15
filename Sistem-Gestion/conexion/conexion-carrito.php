<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sis_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_categoria, codigo, descripcion, precio_compra, imagen,  stock FROM productos WHERE id_categoria BETWEEN 15 AND 22";
$result = $conn->query($sql);

?>