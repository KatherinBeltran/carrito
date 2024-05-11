<?php

require "../php/conexion.php";
require "../php/plantilla.php";

$sql = "SELECT v.id, v.total, v.fecha, v.status, u.nombre, p.metodo, c.codigo FROM ventas
AS v INNER JOIN usuario AS u ON v.id_usuario=u.id 
INNER JOIN pagos AS p ON v.id_pago=p.id
INNER JOIN cupones AS c ON v.id_cupon=c.id";
$resultado = $conexion->query($sql);

$pdf = new PDF("P", "mm", "letter");
$pdf->AliasNbPages();
$pdf->SetMargins(10, 10, 10);
$pdf->Addpage();

$pdf->SetFont("Arial", "B", 12);

$pdf->Cell(10, 5, "Id", 1, 0, "C");
$pdf->Cell(50, 5, "Nombre de Usuario", 1, 0, "C");
$pdf->Cell(20, 5, "Total", 1, 0, "C");
$pdf->Cell(40, 5, "Fecha", 1, 0, "C");
$pdf->Cell(20, 5, "Status", 1, 0, "C");
$pdf->Cell(35, 5, "Metodo de Pago", 1, 0, "C");
$pdf->Cell(20, 5, "Cupon", 1, 1, "C");

$pdf->SetFont("Arial", "", 9);

while($fila = $resultado->fetch_assoc()){
    $pdf->Cell(10, 5, $fila['id'], 1, 0, "C");
    $pdf->Cell(50, 5, $fila['nombre'], 1, 0, "C");
    $pdf->Cell(20, 5, $fila['total'], 1, 0, "C");
    $pdf->Cell(40, 5, $fila['fecha'], 1, 0, "C");
    $pdf->Cell(20, 5, $fila['status'], 1, 0, "C");
    $pdf->Cell(35, 5, $fila['metodo'], 1, 0, "C");
    $pdf->Cell(20, 5, $fila['codigo'], 1, 1, "C");

}

$pdf->Output();
?>