<?php 
include "./conexion.php";

$fila = $conexion->query('SELECT imagen FROM productos WHERE id='.$_POST['id']);
$id = mysqli_fetch_row($fila);
if(file_exists('../images/'.$id[0])){
    unlink('../images/'.$id[0]);
}
$conexion->query("DELETE FROM productos WHERE id=".$_POST['id']);
echo 'Listo';
?>