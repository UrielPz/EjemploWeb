<?php

include("conexion.php");
$con=conectar();

$id_articulo=$_GET['id_articulo'];
$id_usuario=$_GET['id_usuario'];
$nombre=$_GET['nombre'];

$sql="DELETE FROM articulos  WHERE id_articulo='$id_articulo'";
$query=mysqli_query($con,$sql);

    if($query){
        $sql="ALTER TABLE articulos AUTO_INCREMENT=1";
        $query=mysqli_query($con,$sql);
        Header("Location: crear.php?id_usuario=".$id_usuario."&nombre=".$nombre);
    }
?>