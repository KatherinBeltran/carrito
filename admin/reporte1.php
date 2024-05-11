<?php
require '../php/conexion.php';
$sql = "SELECT v.id, v.total, v.fecha, v.status, u.nombre, p.metodo, c.codigo FROM ventas
AS v INNER JOIN usuario AS u ON v.id_usuario=u.id 
INNER JOIN pagos AS p ON v.id_pago=p.id
INNER JOIN cupones AS c ON v.id_cupon=c.id";
$resultado = $conexion->query($sql);
$docu="ventas.xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$docu);
header('Pragma: no-cache');
header('Expires: 0');
echo '<table border=1>';
echo '<tr>';
echo '<th colspan=7>Reporte de ventas</th>';
echo '</tr>';
echo '<tr><th>Id</th><th>Nombre de Usuario</th><th>Total</th><th>Fecha</th><th>Status</th><th>Metodo de Pago</th><th>Cupon</th></tr>';
while($row=mysqli_fetch_array($resultado)){
    echo '<tr>';
    echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['nombre'].'</td>';
    echo '<td>'.$row['total'].'</td>';
    echo '<td>'.$row['fecha'].'</td>';
    echo '<td>'.$row['status'].'</td>';
    echo '<td>'.$row['metodo'].'</td>';
    echo '<td>'.$row['codigo'].'</td>';
    echo '</tr>';
}
echo '</table>';
?>