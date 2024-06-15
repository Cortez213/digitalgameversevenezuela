<?php
  // ...

  // Comprueba si el formulario se ha enviado
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Comprueba si el banco se ha seleccionado
    if (!empty($_POST["banco"])) {
      $banco = $_POST['banco'];

      // Aquí debes agregar el código para conectar a tu base de datos
      // Por ejemplo, si estás usando MySQL con PDO, podría ser algo así:
      $pdo = new PDO('mysql:host=127.0.0.1;dbname=sis_inventario', 'root', '');

      // Y aquí debes agregar el código para insertar los valores en la base de datos
      // Por ejemplo, si tienes una tabla llamada 'ventas' con campos llamados 'metodoPago' y 'banco', podría ser algo así:
      $stmt = $pdo->prepare("INSERT INTO ventas (banco) VALUES (:banco)");
      $stmt->execute(['banco' => $banco]);
    }
  }

  // ...
?>