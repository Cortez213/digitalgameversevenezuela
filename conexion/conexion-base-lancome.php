<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sis_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$id_categoria = 24;
$sql = "SELECT id_categoria, descripcion, precio_compra, imagen, stock FROM productos WHERE id_categoria = $id_categoria"; // línea modificada
$result = $conn->query($sql);

?>