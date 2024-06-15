<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sis_inventario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Obtener el valor del impuesto del formulario
$impuesto = $_POST['nuevoImpuestoVenta'];

// Verificar si el usuario es un administrador o un vendedor
if ($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Vendedor") {
    // Actualizar el valor del impuesto en la base de datos
    $sql = "UPDATE usuarios SET impuesto = $impuesto WHERE perfil = 'Administrador' OR perfil = 'Vendedor'";

    if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>