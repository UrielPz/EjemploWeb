<?php
    $id_usuario=$_GET['id_usuario'];    
    $id_articulo=$_GET['id_articulo'];
    $nombre=$_GET['nombre'];

    $servidor = "localhost";
    $usuarioBD = "root";
    $pwdBD = "";
    $nomBD = "eu5_bd";
    $conn = new mysqli($servidor, $usuarioBD, $pwdBD, $nomBD);

    $sql="UPDATE articulos SET  status_articulo='publicado'
    WHERE id_articulo='$id_articulo'";

$query=mysqli_query($conn,$sql);

if($query){
    Header("Location: /EX5/crear.php?id_usuario=".$id_usuario."&nombre=".$nombre);
}

    ?>