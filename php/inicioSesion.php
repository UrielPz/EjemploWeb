<?php
    $nombreUsuario=$_GET['uname'];
    $contrasena=$_GET['psw'];
    
    $servidor = "localhost";
    $usuarioBD = "root";
    $pwdBD = "";
    $nomBD = "eu5_bd";
    $conn = new mysqli($servidor, $usuarioBD, $pwdBD, $nomBD);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      
    $sql = "SELECT id_usuario, nombre_usuario, contrasena_usuario,rol_usuario FROM usuarios where nombre_usuario='$nombreUsuario' and contrasena_usuario='$contrasena'";
    $result = $conn->query($sql);
      
    if ($result->num_rows > 0) {
        $row=mysqli_fetch_array($result);
        $id_usuario=$row['id_usuario'];
        $usuario= $row['nombre_usuario'];
        $contrasena=$row['contrasena_usuario'];
        $rol=$row['rol_usuario'];
        
        
    }
    $conn->close();

    
    echo $usuario.",";
    echo $contrasena.",";
    echo $rol.",";
    echo $id_usuario;
    
    
    ?>
    
