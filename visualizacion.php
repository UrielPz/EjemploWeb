<?php
// Start the session
session_start();
?>
<div hidden>
    <?php

    $_SESSION["datos"] = $_GET["nombre"];
    $_SESSION["id_usuario"] = $_GET["id_usuario"];
    $_SESSION["id_articulo"] = $_GET["id_articulo"];
    ?>
</div>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen unidad 5</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/david.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <header>
        <div id="header">

        </div>
    </header>

    <main>
        <div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12" id="todo">
            <div class="row" id="principal">
                <div class="col col-xs-9 col-sm-9 col-md-9 col-lg-9" id="art">
                    <h2 id="nombre_candidato">
                        <?php
                        $db = mysqli_connect("localhost", "root", "", "eu5_bd");
                        $id_articulo = $_GET["id_articulo"];
                        $sql = "SELECT nombre_candidato FROM articulos WHERE id_articulo = '" . $id_articulo . "'";
                        $query = mysqli_query($db, $sql);
                        if ($query) {
                            if ($valores = mysqli_fetch_array($query)) {
                                echo $valores["nombre_candidato"];
                            }
                        }
                        ?>
                    </h2>
                    <div class="container" id="articulo">
                        <?php
                        $db = mysqli_connect("localhost", "root", "", "eu5_bd");
                        $id_articulo = $_GET["id_articulo"];
                        $sql = "SELECT fechaNac_candidato, lugarNac_candidato, estado_candidato, estudios_candidato, relacionesPublic_candidato, 
                                       contenido_articulo, fechaPublic_articulo FROM articulos WHERE id_articulo = '" . $id_articulo . "'";
                        $query = mysqli_query($db, $sql);
                        if ($query) {
                            if ($valores = mysqli_fetch_array($query)) {
                                echo 'nacimiento: ' . $valores["lugarNac_candidato"] . ' ' . $valores["fechaNac_candidato"] . '<br>
                                  candidatura: ' . $valores["estado_candidato"] . '<br>
                                  estudios: ' . $valores["estudios_candidato"] . '<br>
                                  relaciones publicas: ' . $valores["relacionesPublic_candidato"] . '<br> <hr> 
                                  ' . $valores["contenido_articulo"] . '<br> <hr>'
                                    . $valores["fechaPublic_articulo"] . '<br>';
                            }
                        }
                        ?>
                    </div>
                    <div class="container" id="extra">
                        <h2>articulos relacionados</h2>
                        <hr>
                        <div id="extra2">
                            <?php
                            $db = mysqli_connect("localhost", "root", "", "eu5_bd");
                            $id_articulo = $_GET["id_articulo"];
                            $sql2 = "SELECT estado_candidato FROM articulos WHERE id_articulo = '" . $id_articulo . "'";
                            $query2 = mysqli_query($db, $sql2);
                            $valores2 = mysqli_fetch_array($query2);
                            $sql = "SELECT id_articulo, nombre_candidato, estado_candidato, fechaPublic_articulo, nombre_usuario FROM articulos INNER JOIN usuarios ON articulos.id_usuario=usuarios.id_usuario WHERE articulos.estado_candidato = '" . $valores2["estado_candidato"] . "' AND articulos.id_articulo != '" . $id_articulo . "'";
                            $query = mysqli_query($db, $sql);
                            if ($query) {
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo    '<div id="tarjeta">
                                    <h3> autor: ' . $valores["nombre_usuario"] . '</h2>
                                    <h3> candidato: ' . $valores["nombre_candidato"] . '</h2>
                                    <h3> estado: ' . $valores["estado_candidato"] . '</h2>
                                    <h3> fecha: ' . $valores["fechaPublic_articulo"] . '</h3>
                                    <a href="http://localhost/EX5/visualizacion.php?id_articulo=' . $valores["id_articulo"] . '&nombre=' . $_SESSION['datos'] . '&id_usuario=' . $_SESSION['id_usuario'] . '" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">ver</a>
                                </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-3" id="com">
                    <div class="container" id="comentarios">
                        <h1 id="titulo_comentarios">comentarios:</h1>
                        <?php
                        $db = mysqli_connect("localhost", "root", "", "eu5_bd");
                        $id_articulo = $_GET["id_articulo"];
                        $sql = "SELECT nombre_usuario, fecha_comentario, contenido_comentario FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario=usuarios.id_usuario WHERE comentarios.id_articulo = '" . $id_articulo . "'";
                        $query = mysqli_query($db, $sql);
                        if ($query) {
                            while ($valores = mysqli_fetch_array($query)) {
                                echo '<h2>' . $valores["nombre_usuario"] . ':</h2>
                                  <p>' . $valores["contenido_comentario"] . '</p>
                                  <h3>' . $valores["fecha_comentario"] . '<h3> <hr>';
                            }
                        }
                        ?>
                    </div>
                    <form id="formularioComentario">
                        <textarea name="comentar" id="comentar" rows="6" cols="45" placeholder="agrega aqui tu comentario"></textarea>
                        <input type="submit" id="boton_comentar" value="Comentar">
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        function comprobar() {

        }
    </script>

    <footer>
        <div id="footer">

        </div>
    </footer>

    <script src="js/lib/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/0af9583a5b.js" crossorigin="anonymous"></script>
    <script src="js/generados/headerFooter.js"></script>
    <script src="js/generados/usuarios.js"></script>
    <script src="js/generados/constantes.js"></script>




    <script>
        $(document).ready(function() {

            var my_var = "<?php echo ($_SESSION['datos']); ?>";
            var id_usuario = "<?php echo ($_SESSION['id_usuario']); ?>";
            var id_articulo = "<?php echo ($_SESSION['id_articulo']); ?>";
            localStorage.setItem("sesion", my_var);
            localStorage.setItem("id_usuario", id_usuario);
            localStorage.setItem("id_articulo", id_articulo);
        });
    </script>

</body>

</html>