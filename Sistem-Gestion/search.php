<?php
$q = $_GET['q'];

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sis_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_categoria, codigo, descripcion, precio_compra, imagen, stock FROM productos WHERE descripcion LIKE '%$q%' AND id_categoria BETWEEN 15 AND 22";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product-box">';
        echo '<img src="' . $row['imagen'] . '" alt="" class="product-img">';
        echo '<h2 class="product-title">' . $row['descripcion'] . '</h2>';
        echo '<p class="product-stock">Stock: ' . $row['stock'] . '</p>';
        echo '<span class="product-price">$' . $row['precio_compra'] . '</span>';
        echo '<i class="bx bx-shopping-bag add-cart"></i>';
        echo '</div>';
    }
} else {
    echo "No se encontraron productos que coincidan con la búsqueda.";
}

$conn->close();
?>