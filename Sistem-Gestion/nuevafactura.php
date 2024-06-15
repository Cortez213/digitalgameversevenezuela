<?php
session_start();
require_once('conexion/conexion-carrito.php'); 
require_once('extensiones-1/tcpdf/tcpdf.php');

// Comprueba si el usuario ha iniciado sesión
if(!isset($_SESSION['nombre'])) { 
    echo '
         <script>
            alert("Por favor debes iniciar sesión");
            window.location = "ingreso.php";
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sis_inventario";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtén los productos seleccionados desde el formulario
$productos_seleccionados = $_POST['productos_seleccionados'];

// Recorre cada producto seleccionado
foreach ($productos as $producto) {
    // Obtiene la descripción del producto
    $descripcion_producto = $producto['title'];

    // Consulta para obtener el stock actual del producto
    $sql = "SELECT stock FROM productos WHERE descripcion = '$descripcion_producto'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $stock_actual = $row['stock'];

    // Reduce el stock en 1
    $nuevo_stock = $stock_actual - 1;

    // Actualiza el stock en la base de datos
    $sql = "UPDATE productos SET stock = $nuevo_stock WHERE descripcion = '$descripcion_producto'";
    $conn->query($sql);
}

// Información de la empresa
$nombreEmpresa = "VariMarkt";
$direccionEmpresa = "Maracay";
$contactoEmpresa = "4128892422";

$pdf->SetFont('dejavusans', '', 12);
$pdf->Cell(0, 10, 'VariMarkt', 0, 1, 'C');
$pdf->SetFont('dejavusans', '', 10);
$pdf->Cell(0, 10, 'FACTURA', 0, 1, 'C');

// Información del usuario y de la empresa
$pdf->Cell(90, 10, 'Usuario: ' . $nombreUsuario, 0, 0, 'L');
$pdf->Cell(90, 10, 'Información de la empresa:', 0, 1, 'R');
$pdf->Cell(90, 10, '', 0, 0, 'L');
$pdf->Cell(90, 10,'Nombre: ' . $nombreEmpresa, 0, 1, 'R');
$pdf->Cell(90, 10, '', 0, 0, 'L');
$pdf->Cell(90, 10, 'Dirección: ' . $direccionEmpresa, 0, 1, 'R');
$pdf->Cell(90, 10, '', 0, 0, 'L');
$pdf->Cell(90, 10, 'Contacto: ' . $contactoEmpresa, 0, 1, 'R');

$pdf->SetFont('dejavusans', '', 12);
// Crear la cabecera de la tabla
$pdf->Cell(60, 10, 'Producto', 1, 0, 'C');
$pdf->Cell(60, 10,  'Descripcion', 1, 0, 'C');
$pdf->Cell(60, 10, 'Precio', 1, 0, 'C');
$pdf->Ln();

$total = 0;

foreach ($productos as $producto) {
    // Crear una fila para cada producto
    $pdf->Cell(60, 60, $pdf->Image($producto['imgSrc'], $pdf->GetX() + 10, $pdf->GetY() + 10, 40, 40), 1, 0, 'C');
    $pdf->Cell(60, 60, $producto['title'], 1, 0, 'C', 0, '', 1);
    $pdf->Cell(60, 60, 'Precio: $' . $producto['price'], 1, 0, 'C', 0, '', 1);
    $pdf->Ln();

    $total += $producto['price'];
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