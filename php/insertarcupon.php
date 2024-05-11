<?php
include "conexion.php";
if(isset($_POST['codigo']) && isset($_POST['tipo']) && isset($_POST['valor']) ){
    $conexion->query ("INSERT INTO cupones (codigo,tipo,valor,status, fecha_vencimiento)
    VALUES (
        '".$_POST['codigo']."',
        '".$_POST['tipo']."',
        '".$_POST['valor']."',
        'activo',
        '".$_POST['fecha']."'
        ) 
    ")or die($conexion->error);
    header("Location: ../admin/cupones.php?success");
}else{
    header("Location: ../admin/cupones.php?error=Favor llenar todos los campos");
}
?>