<?php
    require('../tfpdf/tfpdf.php');
    include("../connect/conectar.php");

    session_start();
    if (!isset($_SESSION['rol'])) {
        header('location: ../login.php');
    } else {
        if ($_SESSION['rol'] != 1) {
            header('location: ../login.php');
        }
    }

    if (isset($_GET['folio'])){   
        $folio = $_GET['folio'];
    }
    
date_default_timezone_set('America/Mexico_City');

$pago = mysqli_query($conexion, "SELECT * FROM pago WHERE folio = '$folio'");
if (!$pago) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
} else{
    $fila = mysqli_fetch_assoc($pago);
    $curp = $fila['alumno_curp'];
    $fecha= $fila['fecha'];
    $hora = $fila['hora'];
    $concepto = $fila['concepto'];
    $efectivo = $fila['efectivo'];
    $clave = $fila['folio_inscripcion'];
    $cambio =  $efectivo - $concepto;
}

$alumno = mysqli_query($conexion, "SELECT * FROM alumno WHERE curp = '$curp'");
if (!$alumno) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
} else{
    $fila = mysqli_fetch_assoc($alumno);
    $nombre = $fila['nombre'];
    $apellido_p = $fila['apellido_p'];
    $apellido_m = $fila['apellido_m'];
}

$curso = mysqli_query($conexion, "SELECT * FROM curso WHERE clave = '$clave'");
if (!$curso) {
    echo 'No se pudo ejecutar la consulta: ';
    exit;
} else{
    $fila = mysqli_fetch_assoc($curso);
    $nombre_curso = $fila['nombre'];
}
    
class PDF extends tFPDF{
    // Cabecera de página
    function Header(){
        // Logo
        $this->Image('../img/a.jpg',12,8,30);
        // Arial bold 15
        $this->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
        $this->SetFont('DejaVu','',20);
        // Título
        $this->Cell(170,10,'Instituto APIS-T',0,0,'C');
        $this->Ln(12);
        $this->SetFont('DejaVu','',10);
        $this->Cell(175,5,'Linderos 509, Col. El Arenal',0,0,'C');
        $this->Ln(5);
        $this->Cell(170,5,'C.P. 68125 Oaxaca de Juárez, Oax.',0,0,'C');
        $this->Ln(5);
        $this->SetFont('DejaVu','',16);
        $this->Cell(172,10,'Comprobante de Pago',0,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

// Pie de página
    function Footer(){
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->AddFont('DejaVu-Italic','','DejaVuSerif-Italic.ttf',true);
        $this->SetFont('DejaVu-Italic','',8);
        $this->SetTextColor(80);
        // Número de página
        $this->Cell(0,10,'Este documento solo tiene validez para el curso '.$nombre_curso.' del Instituto APIS-T',0,0,'C');
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();

// Add a Unicode font (uses UTF-8)
$pdf->AddFont('Arial','','DejaVuSansCondensed.ttf',true);
$pdf->AddFont('Bold','','DejaVuSans-Bold.ttf',true);


// Load a UTF-8 string from a file and print it
$pdf->SetFont('Arial','',10);
$pdf->Cell(190,0,'Fecha: '. date('d\/m\/y'),0,0,'R');
$pdf->Ln(5);
$pdf->Cell(190,0,'Hora: '.date('h\:i'),0,0,'R');
$pdf->Ln(10);

$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,'Folio de Pago: ',0,0);
$pdf->SetFont('Bold','',14);
$pdf->Cell(35,10,$folio,0,0);

$pdf->Ln(15);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,'Nombre del Alumno: ',0,0);
$pdf->SetFont('Bold','',14);
$pdf->Cell(100,10,$nombre.' '.$apellido_p.' '.$apellido_m,0,0);

$pdf->Ln(15);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,'CURP del Alumno: ',0,0);
$pdf->SetFont('Bold','',14);
$pdf->Cell(100,10,$curp,0,0);

$pdf->Ln(15);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,'Concepto: ',0,0);
$pdf->SetFont('Bold','',14);
$pdf->Cell(100,10,'$'.$concepto,0,0);

$pdf->Ln(15);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,'Efectivo: ',0,0);
$pdf->SetFont('Bold','',14);
$pdf->Cell(100,10,'$'.$efectivo,0,0);

$pdf->Ln(15);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,'Cambio: ',0,0);
$pdf->SetFont('Bold','',14);
$pdf->Cell(100,10,'$'.$cambio,0,0);

$pdf->Ln(15);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,'Fecha del pago: ',0,0);
$pdf->SetFont('Bold','',14);
$pdf->Cell(100,10,$fecha,0,0);

$pdf->Ln(15);
$pdf->SetFont('Arial','',14);
$pdf->Cell(50,10,'Hora del Pago: ',0,0);
$pdf->SetFont('Bold','',14);
$pdf->Cell(100,10,$hora,0,0);

$pdf->Output();
