<?php

include("conexion.php");
$con=conectar();

$id_articulo=$_POST['id_articulo'];
$nombre_candidato=$_POST['nombre_candidato'];
$fechaNac_candidato=$_POST['fechaNac_candidato'];
$estudios_candidato=$_POST['estudios_candidato'];
$lugarNac_candidato=$_POST['lugarNac_candidato'];
$estado_candidato=$_POST['estado_candidato'];
$relacionesPublic_candidato=$_POST['relacionesPublic_candidato'];
$contenido_articulo=$_POST['contenido_articulo'];

$id_usuario=$_GET['id_usuario'];
$nombre=$_GET['nombre'];


$sql="UPDATE articulos SET  nombre_candidato='$nombre_candidato',fechaNac_candidato='$fechaNac_candidato',
estudios_candidato='$estudios_candidato', lugarNac_candidato='$lugarNac_candidato', estado_candidato='$estado_candidato',
relacionesPublic_candidato='$relacionesPublic_candidato',contenido_articulo='$contenido_articulo' 
WHERE id_articulo='$id_articulo'";
$query=mysqli_query($con,$sql);

    if($query){
        $sql="SELECT id_usuario FROM articulos WHERE id_articulo='$id_articulo'";
        $query=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($query);
        Header("Location: crear.php?id_usuario=".$id_usuario."&nombre=".$nombre);
    }
?>