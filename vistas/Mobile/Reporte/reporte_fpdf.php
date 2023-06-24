<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];
$id = $_SESSION['id'];


if ($validar == null || $validar = '') {

    header("Location: http://localhost/r_user/includes/login.php");
    die();

}
?>
<?php

require('./fpdf/fpdf.php');
require('./conexion/Conexion.php');
class PDF extends FPDF {


// Cabecera de página

	function Header() {
		$this->SetFont('Times', 'B', 20);
		$this->Image('img/esquina.jpg', 0, 0, 70); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->setXY(60, 15);
		$this->Cell(100, 8, 'Reporte del paciente', 0, 1, 'C', 0);
		$this->Image('img/logo.png', 150, 10, 35); //imagen(archivo, png/jpg || x,y,tamaño)
		$this->Ln(30);

	}

// Pie de página

	function Footer() {
		// Posición: a 1,5 cm del final
		$this->SetY(-15);

		$this->SetFont('Arial', 'B', 10);
		// Número de página
		$this->Cell(170, -50, 'FIRMA DEL DOCTOR', 0, 0, 'C', 0);
		$this->Cell(25, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}

// --------------------METODO PARA ADAPTAR LAS CELDAS------------------------------
	var $widths;
	var $aligns;

	function SetWidths($w) {
		//Set the array of column widths
		$this->widths = $w;
	}

	function SetAligns($a) {
		//Set the array of column alignments
		$this->aligns = $a;
	}

	function Row($data, $setX) 
	{
		//Calculate the height of the row
		$nb = 0;
		for ($i = 0; $i < count($data); $i++) {
			$nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
		}

		$h = 8 * $nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h, $setX);
		//Draw the cells of the row
		for ($i = 0; $i < count($data); $i++) {
			$w = $this->widths[$i];
			$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
			//Save the current position
			$x = $this->GetX();
			$y = $this->GetY();
			//Draw the border
			$this->Rect($x, $y, $w, $h, 'DF');
			//Print the text
			$this->MultiCell($w, 8, $data[$i], 0, $a);
			//Put the position to the right of the cell
			$this->SetXY($x + $w, $y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h, $setX) {
		//If the height h would cause an overflow, add a new page immediately
		if ($this->GetY() + $h > $this->PageBreakTrigger) {
			$this->AddPage($this->CurOrientation);
			$this->SetX($setX);

			//volvemos a definir el  encabezado cuando se crea una nueva pagina
			$this->SetFont('Helvetica', 'B', 15);
			$this->Cell(10, 8, 'N', 1, 0, 'C', 0);
			$this->Cell(60, 8, 'Doctor', 1, 0, 'C', 0);
			$this->Cell(80, 8, 'Paciente', 1, 0, 'C', 0);
			$this->Cell(35, 8, 'Fecha', 1, 1, 'C', 0);
			$this->SetFont('Arial', '', 12);

		}

		if ($setX == 100) {
			$this->SetX(100);
		} else {
			$this->SetX($setX);
		}

	}

	function NbLines($w, $txt) {
		//Computes the number of lines a MultiCell of width w will take
		$cw = &$this->CurrentFont['cw'];
		if ($w == 0) {
			$w = $this->w - $this->rMargin - $this->x;
		}

		$wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
		$s = str_replace("\r", '', $txt);
		$nb = strlen($s);
		if ($nb > 0 and $s[$nb - 1] == "\n") {
			$nb--;
		}

		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;
		while ($i < $nb) {
			$c = $s[$i];
			if ($c == "\n") {
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}
			if ($c == ' ') {
				$sep = $i;
			}

			$l += $cw[$c];
			if ($l > $wmax) {
				if ($sep == -1) {
					if ($i == $j) {
						$i++;
					}

				} else {
					$i = $sep + 1;
				}

				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			} else {
				$i++;
			}

		}
		return $nl;
	}
// -----------------------------------TERMINA---------------------------------
}

$id_documento = $_GET['id'];
//------------------OBTENCION DE LOS DATOS DE LA BASE DE DATOS-------------------------
$data = new Conexion();
$conexion = $data->getConexion();
$strquery = "SELECT * FROM reportes WHERE id_paciente = $id AND id = $id_documento";
$result = $conexion->prepare($strquery);
$result->execute();
$data = $result->fetchall(PDO::FETCH_ASSOC);

//--------------TERMINA BASE DE DATOS-----------------------------------------------

// Creación del objeto de la clase heredada
$pdf = new PDF(); //hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage(); //añade la pagina / en blanco
$pdf->SetMargins(10, 10, 10); //MARGENES
$pdf->SetAutoPageBreak(true, 20); //salto de pagina automatico

// -----------ENCABEZADO------------------
$pdf->SetX(15);
$pdf->SetFont('Helvetica', 'B', 15);
$pdf->Cell(10, 8, 'N', 1, 0, 'C', 0);
$pdf->Cell(60, 8, 'Doctor', 1, 0, 'C', 0);
$pdf->Cell(80, 8, 'Paciente', 1, 0, 'C', 0);
$pdf->Cell(35, 8, 'Fecha', 1, 1, 'C', 0);
// -------TERMINA----ENCABEZADO------------------

$pdf->SetFillColor(233, 229, 235); //color de fondo rgb
$pdf->SetDrawColor(61, 61, 61); //color de linea  rgb

$pdf->SetFont('Arial', '', 12);

//El ancho de las celdas
$pdf->SetWidths(array(10, 60, 80, 35)); //???

$pdf->SetAligns(array('C','C','C','L'));

for ($i = 0; $i < count($data); $i++) {

	$pdf->Row(array($i + 1, $data[$i]['doctor'], ucwords(strtolower(utf8_decode($data[$i]['paciente']))),$data[$i]['fecha']), 15);
}

// cell(ancho, largo, contenido,borde?, salto de linea?)



// Definir los nombres de las columnas
$columnas = array('glicemia', 'hbglicosilada', 'nus', 'urea', 'creatinina', 'acido_urico','calcio', 'fosforo', 'colesterol', 'trigliceridos', 'hdl', 'ldl', 'proteinas_totales', 'albumina', 'magnesio', 'nota');
$nombresPersonalizados = array('GLICEMIA (70-110) mg/dl', 'Hb GLICOSILADA %', 'NUS (3-20) mg/dl', 'UREA (13-43) mg/dl', 'CREATININA (0.6-1.3) mg/dl', 'ACIDO URICO (M: 2.5-6.0, V: 1.5-7.2) mg/dl','CALCIO (8.8-11) mg/dl', 'FOSFORO (2.5-5.0) mg/dl', 'COLESTEROL (menor a 200) mg/dl', 'TRIGLICERIDOS (menor a 150) mg/dl', 'HDL (35-65) mg/dl', 'LDL (menor a 150) mg/dl', 'PROTEINAS TOTALES (6.4-8.3) g/dl', 'ALBUMINA (3.4-4.8) g/dl', 'MAGNESIO (1.6-2.6) mg/dl', 'nota');

// Consultar la base de datos para obtener los valores de cada columna
$valores = array();
foreach ($columnas as $index => $columna) {
    $strquery = "SELECT $columna FROM reportes WHERE id_paciente = $id AND id = $id_documento ";
    $result = $conexion->prepare($strquery);
    $result->execute();
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    // Obtener el valor de la primera fila (asumiendo que solo hay una fila)
    $valor = $data[0][$columna];

    // Obtener el nombre personalizado correspondiente
    $nombrePersonalizado = $nombresPersonalizados[$index];

    // Agregar el nombre personalizado de la columna y su valor al arreglo de valores
    $valores[] = array($nombrePersonalizado, $valor);
}

// Definir la nueva tabla con los nombres de las columnas y los valores obtenidos
$nuevaTabla = $valores;

// Definir el ancho de las columnas de la nueva tabla
$columnWidths = array(100, 50); // Ancho de cada columna

$pdf->Ln(10); // Espacio entre las dos tablas

// Centrar horizontalmente la nueva tabla
$totalWidth = array_sum($columnWidths);
$centerX = ($pdf->GetPageWidth() - $pdf->GetX() - $totalWidth) / 2;
$pdf->SetX($centerX);

// Establecer el formato y el contenido de la nueva tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetWidths($columnWidths); // Establecer el ancho de las columnas

foreach ($nuevaTabla as $fila) {
    $pdf->Row($fila, $centerX); // Agregar una fila a la tabla
}

$pdf->Output();



?>