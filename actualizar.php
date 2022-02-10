<?php
include("conexion.php");
$con = conectar();

$id_articulo = $_GET['id_articulo'];
$nombre = $_GET['nombre'];

$sql = "SELECT * FROM articulos WHERE id_articulo='$id_articulo'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>
<div hidden>
    <?php
    $_SESSION["datos"] = $_GET["nombre"];
    $_SESSION["id_usuario"] = $_GET["id_usuario"];
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
    <link rel="stylesheet" href="css/estilo1.css">
</head>

<body>
    <div id="wrap">
        <header>
            <div id="header">

            </div>
        </header>

        <div id="main" style="padding-bottom: 120px;">
            <div class="container mt-5">
                <h1 class="text-center">Edicion de Articulo</h1>
            </div>

            <div class="container mt-5">
                <form action="update.php?id_usuario=<?php echo $_SESSION["id_usuario"] ?>&nombre=<?php echo $_SESSION["datos"] ?>" method="POST">

                    <input type="hidden" name="id_articulo" value="<?php echo $row['id_articulo']  ?>">

                    <input type="text" class="form-control mb-3" name="nombre_candidato" placeholder="nombre_candidato" value="<?php echo $row['nombre_candidato']  ?>">
                    <input type="text" class="form-control mb-3" name="fechaNac_candidato" placeholder="fechaNac_candidato" value="<?php echo $row['fechaNac_candidato']  ?>">
                    <input type="text" class="form-control mb-3" name="estudios_candidato" placeholder="estudios_candidato" value="<?php echo $row['estudios_candidato']  ?>">
                    <input type="text" class="form-control mb-3" name="lugarNac_candidato" placeholder="lugarNac_candidato" value="<?php echo $row['lugarNac_candidato']  ?>">
                    <input type="text" class="form-control mb-3" name="estado_candidato" placeholder="estado_candidato" value="<?php echo $row['estado_candidato']  ?>">
                    <input type="text" class="form-control mb-3" name="relacionesPublic_candidato" placeholder="relacionesPublic_candidato" value="<?php echo $row['relacionesPublic_candidato']  ?>">
                    <textarea class="form-control mb-3" name="contenido_articulo" placeholder="contenido_articulo" style="min-height: 200px;"><?php echo $row['contenido_articulo']  ?></textarea>

                    <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                </form>

            </div>
        </div>
        <footer>
            <div id="footer">

            </div>
        </footer>
    </div>


    <script src="js/lib/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0af9583a5b.js" crossorigin="anonymous"></script>

    <script src="js/generados/headerFooter.js"></script>
</body>

</html>