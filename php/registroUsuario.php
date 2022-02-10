<?php
    $nombreUsuario=$_GET['uname'];
    $correo=$_GET['correo'];
    $contrasena=$_GET['psw'];
    $servidor = "localhost";
    $usuarioBD = "root";
    $pwdBD = "";
    $nomBD = "eu5_bd";
    $conn = new mysqli($servidor, $usuarioBD, $pwdBD, $nomBD);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
      $sql = "INSERT INTO usuarios (nombre_usuario, correo_usuario, contrasena_usuario,rol_usuario)
      VALUES ('$nombreUsuario', '$correo','$contrasena','lector' )";
      
      if ($conn->query($sql) === TRUE) {  
      
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();


?>