<?php
require '../../Assets/fpdf/fpdf.php';
date_default_timezone_set('America/Caracas');

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        $this->Image('../../Assets/img/IMG-20240929-WA0007.jpg',-1,-1,85);
        $this->SetY(40);
        $this->SetX(120);
        $this->SetFont('Arial','B',12);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(20, 8, utf8_decode('C.E.I.N Simoncito Francisco de Asis Mejia'),0,1);
        $this->SetY(45);
        $this->SetX(147);
        $this->SetFont('Arial','',8);
        $this->Cell(40, 8, utf8_decode('Listado de Usuario'));
        $this->SetTextColor(30,10,32);
        $this->Ln(30);
    }

    function Footer()
    {
        $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
        $this->Cell(95,5,date('d/m/Y | G:i:a'),0,1,'R');
        $this->Line(10,287,200,287);
        $this->Cell(0,5,utf8_decode("C.E.I.N Simoncito Francisco de Asis Mejia © Todos los derechos reservados."),0,0,"C");
    }
}

if (isset($_GET['idstu'])) {
    $student_id = $_GET['idstu'];
} else {
    die("No se proporcionó ningún ID de estudiante");
}

require('../../Config/config.php');

$stmt = $connect->prepare("SELECT * FROM students WHERE idstu = ?");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute([$student_id]);

if($stmt->rowCount() == 0) {
    die("No se encontraron datos para el ID de estudiante proporcionado");
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true, 20);
$pdf->SetTopMargin(500);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);
$pdf->SetX(10);
$pdf->SetFillColor(57,147,250);
$pdf->SetDrawColor(255, 255, 255);
$pdf->SetFont('Arial','B',10);
// $pdf->Cell(15, 12, utf8_decode('N°'),1,0,'C',1);
$pdf->Cell(25, 12, utf8_decode('Cdla. Escolar'),1,0,'C',1);
$pdf->Cell(35, 12, utf8_decode('Nombre'),1,0,'C',1);
$pdf->Cell(35, 12, utf8_decode('apellido'),1,0,'C',1);
$pdf->Cell(35, 12, utf8_decode('Sexo'),1,0,'C',1);
$pdf->Cell(25, 12, utf8_decode('Edad'),1,0,'C',1);
$pdf->Cell(25, 12, utf8_decode('Nacimiento'),1,1,'C',1);

while($row = $stmt->fetch()){
    $pdf->SetFont('Arial','',10);
    $pdf->SetX(10);
    $pdf->SetFillColor(255,255,255);
    $pdf->SetDrawColor(65, 61, 61); 
    // $pdf->Cell(15, 8, utf8_decode($row['idstu']),'B',0,'C',1);
    $pdf->Cell(25, 8, utf8_decode($row['dnist']),'B',0,'C',1);
    $pdf->Cell(35, 8, utf8_decode($row['nomstu']),'B',0,'C',1);
    $pdf->Cell(35, 8, utf8_decode($row['apestu']),'B',0,'C',1);
    $pdf->Cell(35, 8, utf8_decode($row['sexes']),'B',0,'C',1);
    $pdf->Cell(25, 8, utf8_decode($row['edast']),'B',0,'C',1);
    $pdf->Cell(25, 8, utf8_decode($row['fenac']),'B',1,'C',1);
}

$pdf->Ln(0.5);
$pdf->Output('alumnos.pdf', 'D');
?>
