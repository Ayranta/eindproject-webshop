<?php
require ('../fpdf185/fpdf.php');
include 'connect.php';
session_start();
print '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="afrekenen.css">
	<title></title>
</head>
<body>
	<div class="container">
		<nav>
		 	<a href= "afrekenen.php"><h1>Yamaha</h1></a>
		</nav>
    </div>
    <div class="pdf">';

$login = $_SESSION["login"];
$sql = "SELECT * from klanten where gebruikernummer = ".$login;
$resultaat = $mysqli->query($sql);
$row = $resultaat->fetch_assoc();
$naam = $row['naam'];
$voornaam = $row['voornaam'];
$email = $row['email'];


$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 16);
$pdf->Cell(40, 10, 'Bestelling:');
$pdf->Cell(40, 10, $naam);

$pdf_file = 'order_' . $login . '.pdf';
$pdf->Output('F', '../orders/' . $pdf_file);

$pdf_data = file_get_contents('../orders/order_' . $login . '.pdf');
$pdf_data = mysqli_real_escape_string($mysqli, $pdf_data);


define('EURO', chr(128));

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(190, 10, 'Bestelling', 0, 1, 'C');
$pdf->Ln(20);

$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(40, 10, 'Customer Name:', 0, 0);
$pdf->Cell(100, 10, $naam, 0, 1);

$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(90, 10, 'Item', 1, 0, 'C');
$pdf->Cell(30, 10, 'Price', 1, 0, 'C');
$pdf->Cell(30, 10, 'Quantity', 1, 0, 'C');
$pdf->Cell(40, 10, 'Total', 1, 1, 'C');

$subtotal = 0;
$resultaat = $mysqli->query("SELECT * FROM winkelkar WHERE gebruikernummer = '" . $login . "'");
$pdf->SetFont('Helvetica', '', 12);
while($row = $resultaat->fetch_assoc()){
    $pdf->Cell(90, 10, $row['artikelnaam'], 1, 0);
    $pdf->Cell(30, 10, EURO . ' ' . number_format($row['prijs'], 2, ',', '.'), 1, 0, 'R');
    $pdf->Cell(30, 10, $row['aantal'], 1, 0,'R');
    $pdf->Cell(40, 10, EURO . ' ' . number_format($row['prijs'] * $row['aantal'], 2, ',', '.'), 1, 1, 'R');
    $subtotal += $row["prijs"] *$row["aantal"];
}

$total = $subtotal;

$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(120, 10, '', 0, 0);
$pdf->Cell(30, 10, 'Total:', 0, 0);
$pdf->Cell(40, 10, EURO . ' ' . number_format($total, 2, ',', '.'), 0, 1, 'R');

// output PDF to browser
$pdf_file = 'order_'.$login . '.pdf';
$pdf->Output('F', '../orders/' . $pdf_file);

$pdf_data = file_get_contents('../orders/order_' . $login . '.pdf');
$pdf_data = mysqli_real_escape_string($mysqli, $pdf_data);

echo "PDF werd aangemaakt";

/*$resultaat = $mysqli->query("SELECT * FROM winkelkar WHERE gebruikernummer = '" . $login . "'");
while ($row = $resultaat->fetch_assoc()) {
    $gebruikersnummer = $_SESSION["login"];
    $artikelnaam = $row['artikelnaam'];
    $artikelnummer = $row['artikelnummer'];
    $prijs = $row['prijs'];
    $aantal = $row['aantal'];
    $sql = "INSERT INTO bestelling (gebruikernummer, artikelnaam, prijs,aantal, artikelnummer) VALUES ('" . $gebruikersnummer . "', '" . $artikelnaam . "', '" . $prijs . "', '" . $aantal . "', '" . $artikelnummer . "')";
    $mysqli->query($sql);
}

$sql = "DELETE FROM winkelkar WHERE gebruikernummer = ".$gebruikersnummer;
$mysqli->query($sql);
$mysqli->close();
*/
print'
</div>
</body>
</html>';
?>