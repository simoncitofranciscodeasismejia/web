<?php
require '../../Assets/fpdf/fpdf.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sistema_escolar";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

date_default_timezone_set('America/Caracas');

$estudiante_id = $_POST['estudiante_id']; // Obtener el ID del estudiante del formulario

// Consulta SQL para obtener los datos del estudiante
$sql = "SELECT * FROM students WHERE dnist = $estudiante_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Utilizar los datos del estudiante en la constancia de estudios
    $nombre_estudiante = ucfirst($row['nomstu']);
    $apellido_estudiante = ucfirst($row['apestu']);
    $cedula_estudiante = $row['dnist'];
    $lugar_nacimiento = ucfirst($row['lugaNacEst']);
    $edad_estudiante = $row['edast'];
    $id_grado = $row['gradp'];

    $sql1 = "SELECT nomgra FROM degree WHERE iddeg = $id_grado";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();
    $grado_estudiante = $row1['nomgra'];

    // Resto de los datos del estudiante

    
    class PDF extends FPDF{
        // Cabecera de página
    

        function Header(){
            $this->Image('../../Assets/img/IMG-20240929-WA0007.jpg',-1,-1,85);

$this->SetY(40);
$this->SetX(120); // Ajustar la posición X hacia la derecha
$this->SetFont('Arial','B',12);
$this->SetTextColor(0, 0, 0);
$this->Cell(0, 8, utf8_decode('C.E.I.N Simoncito Francisco de Asis Mejia'), 0, 0, 'C');

            $this->SetY(45);
            $this->SetX(247);
            $this->SetFont('Arial','',8);
            $this->Cell(40, 8, utf8_decode('Constancia de estudios'));
            $this->SetTextColor(30,10,32);

            $this->Ln(30);
        }

        function Footer(){
            $this->SetFont('helvetica', 'B', 8);
                $this->SetY(-15);
                $this->Cell(95,5,utf8_decode('Página ').$this->PageNo().' / {nb}',0,0,'L');
                $this->Cell(180,5,date('d/m/Y | G:i:a') ,00,1,'R');
                $this->Line(10,287,200,287);
                $this->Cell(0,5,utf8_decode("C.E.I.N Simoncito Francisco de Asis Mejia © Todos los derechos reservados."),0,0,"C");
                
        }
    }

    $pdf = new PDF("P", "mm", "A4"); 
    $pdf->AliasNbPages(); 
    $pdf->AddPage(); 
    $pdf->SetAutoPageBreak(true, 20); 
    $pdf->SetTopMargin(20); 
    $pdf->SetLeftMargin(20); 
    $pdf->SetRightMargin(20); 
    $pdf->SetFillColor(57, 147, 250); 
    $pdf->SetDrawColor(255, 255, 255); 
    //Título 
    $pdf->SetFont('Arial', 'B', 14); 
    $pdf->Cell(0, 10, utf8_decode('CONSTANCIA DE ESTUDIOS'), 0, 1, 'C'); 
    $pdf->Ln(10); 
    //Texto de la constancia 
    $pdf->SetFont('Arial', '', 10); 
    $pdf->MultiCell(0, 10, utf8_decode('Quien suscribe, ___________________________ titular de la cédula de identidad Nº: V.- __________, subdirector(a) Académico del Centro de Educacion Inicial "Simoncito Francisco de Asis Mejia" ubicada en La Av. San Martin, urbanización Quebradita I, detrás del bloque 5, Caracas, Venezuela. Hace constar por medio de la presente que el (la) estudiante: ' . $nombre_estudiante . ' ' . $apellido_estudiante .  '. Cédula Escolar: ' . $cedula_estudiante . ' Nacido(a) en: ' . $lugar_nacimiento . ' de: ' . $edad_estudiante . ' años de edad. Cursa en esta institución el ' . $grado_estudiante . ' Grado de Educación Primaria.'), 0, 'L');
    $pdf->Ln(10); 
    // Espacio para la firma 
    $pdf->Cell(0, 10, utf8_decode('_______________________________'), 0, 1, 'C'); 
    $pdf->Cell(0, 10, utf8_decode('Firma del Director'), 0, 1, 'C'); 
    $pdf->Cell(0, 10, utf8_decode('(SELLO)'), 0, 1, 'C'); 
    $pdf->Output('Constancia_Estudio.pdf', 'D'); 

}
else {
    echo "No se encontró el estudiante con el ID proporcionado.";
}

$conn->close();
?>