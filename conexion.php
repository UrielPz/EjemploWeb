<?php
function conectar(){
    $host="localhost";
    $user="root";
    $pass="";

    $bd="eu5_bd";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;

}
?>
