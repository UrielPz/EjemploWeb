<?php
include("conexion.php");
$con = conectar();

$sql = "SELECT * FROM articulos";
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

        <div id="main" class="container mt-5" style="padding-bottom: 120px;">
            <div class="container">

                <div>
                    <h1>Creacion del articulo</h1>
                    <br>
                    <br>
                    <form action="insertar.php?id_usuario=<?php echo $_SESSION["id_usuario"] ?>&nombre=<?php echo $_SESSION["datos"] ?>" method="POST">


                        <label for="nombre_candidato">Nombre del candidato</label>
                        <input type="text" class="form-control mb-3" name="nombre_candidato" >
                        <label for="fechaNac_candidato">Fecha de nacimiento</label>
                        <input type="text" class="form-control mb-3" name="fechaNac_candidato" placeholder="AAAA-MM-DD">
                        <label for="lugarNac_candidato">Entidad de nacimiento</label>
                        <input type="text" class="form-control mb-3" name="lugarNac_candidato" >
                        <label for="estado_candidato">Estado en el que es candidato</label>
                        <select class="form-control mb-3" name="estado_candidato">
                            <option>Baja California</option>
                            <option>Baja California Sur</option>
                            <option>Campeche</option>
                            <option>Chihuahua</option>
                            <option>Colima</option>
                            <option>Guerrero</option>
                            <option>Michoacan</option>
                            <option>Nayarit</option>
                            <option>Nuevo Leon</option>
                            <option>Queretaro</option>
                        </select>
                        <label for="partido_candidato">Partido que representa</label>
                        <select class="form-control mb-3" name="partido_candidato">
                            <option>pri</option>
                            <option>pan</option>
                            <option>prd</option>
                            <option>morena</option>
                            <option>pt</option>
                            <option>pv</option>
                            <option>fm</option>
                            <option>rsp</option>
                            <option>pes</option>
                        </select>
                        <label for="estudios_candidato">Estudios</label>
                        <input type="text" class="form-control mb-3" name="estudios_candidato" >
                        <label for="reslacionesPublic_candidato">Relaciones públicas</label>
                        <input type="text" class="form-control mb-3" name="reslacionesPublic_candidato" >
                        <label for="contenido_articulo">Contenido para el artículo</label>                        
                        <textarea class="form-control" name="contenido_articulo" style="min-height: 200px;"></textarea>
                        <br>
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>

        <div id="footer"></div>
    </div>



    <script src="js/lib/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0af9583a5b.js" crossorigin="anonymous"></script>

    <script src="js/generados/headerFooter.js"></script>
</body>

</html>