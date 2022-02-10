<div hidden>
    <?php
    $_SESSION["datos"] = $_GET["nombre"];
    $_SESSION["id_usuario"] = $_GET["id_usuario"];
    ?>
</div>
<?php
include("conexion.php");
$con = conectar();

$sql = "SELECT *  FROM articulos WHERE id_usuario=" . "'" . $_SESSION['id_usuario'] . "'" . " ORDER BY status_articulo";

$query = mysqli_query($con, $sql);

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen unidad 5</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo1.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</head>

<body>
    <header>
        <div id="header">

        </div>
    </header>

    <div class="container mt-5">
        <h1 class="text-center">Artículos de <?php echo $_SESSION['datos'] ?></h1>
    </div>
    <div class="container mt-5">
        <table class="table">
            <thead class="table-success table-striped">
                <tr>
                    <th>Id Autor</th>
                    <th>Id Articulo</th>
                    <th>Tema</th>
                    <th>Subtema</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Estado</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <th><?php echo $row['id_usuario'] ?></th>
                        <th><?php echo $row['id_articulo'] ?></th>
                        <th><?php echo $row['nombre_candidato'] ?></th>
                        <th><?php echo $row['estudios_candidato'] ?></th>
                        <?php if (!($row['status_articulo'] == 'publicado')) {
                            echo "<th><a href='actualizar.php?id_articulo=" . $row['id_articulo'] ."&id_usuario=" . $_SESSION['id_usuario'] ."&nombre=" . $_SESSION['datos'] . "'" . "class='btn btn-info'>Editar</a></th>";
                            echo "<th><a href='delete.php?id_articulo=" . $row['id_articulo'] . "&id_usuario=" . $_SESSION['id_usuario'] ."&nombre=" . $_SESSION['datos'] . "'" . " class='btn btn-danger'>Eliminar</a></th>";
                            echo "<th><a href='php/escritor/publicar.php?id_articulo=" . $row['id_articulo'] ."&id_usuario=" . $_SESSION['id_usuario'] . "&nombre=" . $_SESSION['datos'] ."'" . "class='btn btn-success'>Publicar</a></th>";
                        } else {
                            echo "<th><button href='actualizar.php?id_articulo=" . $row['id_articulo'] . "'" . "class='btn btn-info' disabled>Editar</button></th>";
                            echo "<th><button href='delete.php?id_articulo=" . $row['id_articulo'] . "'" . " class='btn btn-danger' disabled>Eliminar</button></th>";
                            echo "<th><button href='delete.php?id_articulo=" . $row['id_articulo'] . "'" . "class='btn btn-success' disabled>Publicar</button></th>";
                        } ?>

                        <th><?php echo $row['status_articulo'] ?></th>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="jumbotron">


            <button id="agregarArticulo" href="nuevo.php" name="crear" class="btn btn-primary" type="button">Crear</button>
            <button name="salir" class="btn btn-danger">Salir</button>
        </div>

    </div>
    <br>
    <br>
    <br>
    <footer>
        <div id="footer">

        </div>
    </footer>

    <script src="js/lib/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0af9583a5b.js" crossorigin="anonymous"></script>

    <script src="js/generados/headerFooter.js"></script>
    <script src="js/generados/funciones.js"></script>
    <script src="js/generados/constantes.js"></script>

    <script>
        $(document).ready(function() {
            var my_var = "<?php echo ($_SESSION['datos']); ?>";
            var id_usuario = "<?php echo ($_SESSION['id_usuario']); ?>";
            localStorage.setItem("sesion", my_var);
            localStorage.setItem("id_usuario", id_usuario);
        });
    </script>
</body>

</html>