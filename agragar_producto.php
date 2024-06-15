<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = $_POST['descripcion'];
    $precio_compra = $_POST['precio_compra'];
    $imagen = $_POST['imagen'];
    $usuario = $_SESSION['nombre'];

    $sql = "INSERT INTO productos (descripcion, imagen, precio_compra) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ssd", $descripcion, $imagen, $precio_compra);
    $stmt->execute();

    $producto_id = $conexion->insert_id;

    $sql = "INSERT INTO carrito (usuario, producto_id) VALUES (?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("si", $usuario, $producto_id);
    $stmt->execute();

    header("Location: Carrito.php");
} else {
    header("Location: comienzo.php");
}
?>