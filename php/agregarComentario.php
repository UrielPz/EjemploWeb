<?php

    $id_usuario=$_GET['id_usuario'];
    $id_articulo=$_GET['id_articulo'];
    $comentario=$_GET['comentario'];

$servidor = "localhost";
$usuarioBD = "root";
$pwdBD = "";
$nomBD = "eu5_bd";
$conn = new mysqli($servidor, $usuarioBD, $pwdBD, $nomBD);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO comentarios (id_usuario, id_articulo, contenido_comentario)
  VALUES ($id_usuario, $id_articulo, '$comentario')";
  
  if ($conn->query($sql) === TRUE) {  
  
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();


?>