<?php
include("conexion.php");
$con=conectar();


$nombre_candidato=$_POST['nombre_candidato'];
$fechaNac_candidato=$_POST['fechaNac_candidato'];
$lugarNac_candidato=$_POST['lugarNac_candidato'];
$estado_candidato=$_POST['estado_candidato'];
$partido_candidato=$_POST['partido_candidato'];
$estudios_candidato=$_POST['estudios_candidato'];
$reslacionesPublic_candidato=$_POST['reslacionesPublic_candidato'];
$contenido_articulo=$_POST['contenido_articulo'];
$id_usuario=$_GET['id_usuario'];
$nombre=$_GET['nombre'];

$sql = "INSERT INTO articulos (nombre_candidato, fechaNac_candidato, lugarNac_candidato, estado_candidato, 
                    partido_candidato, estudios_candidato, relacionesPublic_candidato, contenido_articulo,
                    status_articulo,id_usuario)
        VALUES ('$nombre_candidato','$fechaNac_candidato','$lugarNac_candidato',
                '$estado_candidato', '$partido_candidato', '$estudios_candidato', 
                '$reslacionesPublic_candidato', '$contenido_articulo','no publicado',$id_usuario)";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: crear.php?id_usuario=".$id_usuario."&nombre=".$nombre);
    
}else {
    echo 'no jalo';
}
