<?php
require_once('extensiones/tcpdf/tcpdf.php');

// Crear nuevo documento PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Establecer los datos del encabezado
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'nombre_de_la_empresa', PDF_HEADER_STRING);

// Establecer los márgenes
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

// Establecer el modo de fuente automático
$pdf->setFontSubsetting(true);

// Establecer la fuente
$pdf->SetFont('dejavusans', '', 14, '', true);

// Añadir una página
$pdf->AddPage();

// Conectar a la base de datos
$conn = new mysqli('nombre_del_servidor', 'nombre_de_usuario', 'contraseña', 'sis_inventario');

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos de la venta
$codigoVenta = $_GET['codigoVenta'];
$sql = "SELECT v.codigo, v.productos, v.impuesto, v.neto, v.total, v.fecha, c.nombre FROM venta v INNER JOIN cliente c ON v.id_cliente = c.id WHERE v.codigo = '$codigoVenta'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de cada fila
    while($row = $result->fetch_assoc()) {
        $html = '
        <table>
            <tr>
                <td>Código: '.$row["codigo"].'</td>
                <td>Nombre del cliente: '.$row["nombre"].'</td>
                <td>Productos: '.$row["productos"].'</td>
                <td>Impuesto: '.$row["impuesto"].'</td>
                <td>Neto: '.$row["neto"].'</td>
                <td>Total: '.$row["total"].'</td>
                <td>Fecha de compra: '.$row["fecha"].'</td>
            </tr>
        </table>';
        
        // Escribir el HTML en el PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    }
} else {
    echo "No se encontraron resultados";
}
$conn->close();

// Cerrar y descargar el documento PDF
$pdf->Output('factura.pdf', 'D');
?>