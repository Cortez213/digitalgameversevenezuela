<?php
session_start();
require_once('conexion/conexion-carrito.php'); 
require_once('extensiones-1/tcpdf/tcpdf.php');

// Comprueba si el usuario ha iniciado sesión
if(!isset($_SESSION['nombre'])) { 
    echo '
         <script>
            alert("Por favor debes iniciar sesión");
            window.location = "../index.php";
         </script>
    ';
    session_destroy();
    die();
}

// Obtén el nombre del usuario de la sesión
$nombreUsuario = $_SESSION['nombre'];

$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
$pdf->AddPage();

// Obtener los productos del carrito desde el formulario
$productos = json_decode($_POST['productos_seleccionados'], true);

// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "sis_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$total = 0;

foreach ($productos as $producto) {
    // Crear una fila para cada producto
    $pdf->Cell(60, 60, $pdf->Image($producto['imgSrc'], $pdf->GetX() + 10, $pdf->GetY() + 10, 40, 40), 1, 0, 'C');
    $pdf->Cell(60, 60, $producto['title'], 1, 0, 'C', 0, '', 1);
    
    // Obtén el precio del producto y multiplícalo por la cantidad
    $precio = $producto['price'];
    $cantidad = $producto['total']; // Asegúrate de que 'quantity' es el nombre correcto del campo
    $precio_total = $precio * $cantidad;
    
    $pdf->Cell(60, 60, 'Precio: $' . $precio_total, 1, 0, 'C', 0, '', 1);
    $pdf->Ln();

    $total += $precio_total;
}

// Mostrar el total
$pdf->Cell(120, 10, '', 0, 0, 'C');
$pdf->Cell(60, 10, 'Total: $' . $total, 1, 1, 'C', 0, '', 1);

$pdf->Ln();
$pdf->SetFont('dejavusans', '', 10);
$pdf->Cell(0, 5, 'POR VariMarkt', 0, 1, 'C');
$pdf->Cell(0, 5, 'Ventas De Tus Sueños', 0, 1, 'C');
$pdf->Cell(0, 5, 'Gracias por su compra, vuelva pronto!', 0, 1, 'C');

$pdf->Output('factura.pdf', 'D');
?>