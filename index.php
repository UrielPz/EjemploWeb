<?php
// Start the session
session_start();
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
    <link rel="stylesheet" href="css/carrusel.css">
</head>

<body>
    <div class="wrap">
        <div id="header">
        </div>

        <div id="main">
            <div class="container" style="display: flex; width: 100%; justify-content:space-around;">
                <div class="slide" style="display: inline-block;">
                    <div class="slide-inner">
                        <input class="slide-open" type="radio" id="slide-1" name="slide" aria-hidden="true" hidden="" checked="checked">
                        <div class="slide-item">
                            <img src="img/gobernadores/bajaCalifornia/Marina_del_Pilar_Avila_Olmeda.jfif">
                            <div class="carousel-caption">
                                <a href="BusquedaCategoria.php?tema=candidato&valor=Marina del Pilar Avila Olmeda&id_usuario= <?php echo $_SESSION['id_usuario'] ?>&nombre= <?php echo $_SESSION['datos'] ?>"><u style="color: white;">
                                        <h3 style="color: white;background-color: black; padding-bottom: 5px;">Marina del Pilar Ávila Olmeda </h3>
                                    </u></a>
                            </div>
                        </div>
                        <br>
                        <input class="slide-open" type="radio" id="slide-2" name="slide" aria-hidden="true" hidden="">
                        <div class="slide-item">
                            <img src="img/gobernadores/bajaCalifornia/Lupita_Jones.jfif">
                            <div class="carousel-caption">
                                <a href="BusquedaCategoria.php?tema=candidato&valor=Lupita Jones&id_usuario= <?php echo $_SESSION['id_usuario'] ?>&nombre= <?php echo $_SESSION['datos'] ?>"><u style="color: white;">
                                        <h3 style="color: white;background-color: black; padding-bottom: 5px;">Lupita Jones</h3>
                                    </u></a>
                            </div>
                        </div>
                        <input class="slide-open" type="radio" id="slide-3" name="slide" aria-hidden="true" hidden="">
                        <div onclick="hola()" id="g3" class="slide-item">
                            <img src="img/gobernadores/bajaCalifornia/Victoria_Bentley_Duarte.jfif">
                            <div class="carousel-caption">
                                <a href="BusquedaCategoria.php?tema=candidato&valor=Samuel Garcia&id_usuario= <?php echo $_SESSION['id_usuario'] ?>&nombre= <?php echo $_SESSION['datos'] ?>"><u style="color: white;">
                                        <h3 style="color: white;background-color: black; padding-bottom: 5px;">Samuel García</h3>
                                    </u></a>
                            </div>
                        </div>

                        <label for="slide-3" class="slide-control prev control-1">‹</label>
                        <label for="slide-3" class="slide-control next control-2">›</label>
                        <label for="slide-2" class="slide-control prev control-3">‹</label>
                        <label for="slide-2" class="slide-control next control-1">›</label>
                        <label for="slide-1" class="slide-control prev control-2">‹</label>
                        <label for="slide-1" class="slide-control next control-3">›</label>



                    </div>
                </div>
                <div style="display: inline-block;margin-left: 25px;margin-top: 40px; width: 40%;text-align: center;">
                    <h3 style="display: inline-block;"> Partidos</h3>
                    <br>
                    <img src="img/partidos/pri.png" class="partidos" value="pri">
                    <img src="img/partidos/pan.png" class="partidos" value="pan">
                    <img src="img/partidos/prd.png" class="partidos" value="prd">
                    <br>
                    <br>
                    <img src="img/partidos/morena.png" class="partidos" value="morena">
                    <img src="img/partidos/partidoVerder.png" class="partidos" value="partidoVerde">
                    <img src="img/partidos/pt.png" class="partidos" value="pt">
                    <br>
                    <br>
                    <img src="img/partidos/pes.png" class="partidos" value="pes">
                    <img src="img/partidos/fm.png" class="partidos" value="fm">
                    <img src="img/partidos/rsp.png" class="partidos" value="rsp">
                </div>
            </div>
            <br>
            <br>
            <div class="container">
                <h3>Estados</h3>
                <br>
                <table class='table table-striped table-bordered font-weight-bold' style='text-align:center;'>
                    <tr style="background-color: #b7360b;">
                        <th>Entidad Federativa</th>
                        <th>Detalles</th>
                    </tr>
                    <tr value="Baja California">
                        <td>Baja California</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>

                    <tr value="Baja California Sur">
                        <td>Baja California Sur</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>

                    <tr value="Campeche">
                        <td>Campeche</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>
                    <tr value="Chihuahua">
                        <td>Chihuahua</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>
                    <tr value="Colima">
                        <td>Colima</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>
                    <tr value="Guerrero">
                        <td>Guerrero</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>
                    <tr value="Michoacan">
                        <td>Michoacán</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>
                    <tr value="Nayarit">
                        <td>Nayarit</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>
                    <tr value="Nuevo Leon">
                        <td>Nuevo León</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>
                    <tr value="Queretaro">
                        <td>Querétaro</td>
                        <td><button class="btn btn-info">Ver</button></td>
                    </tr>
                </table>
            </div>

        </div>
        <div id="footer">
        </div>
    </div>

    <script src="js/lib/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0af9583a5b.js" crossorigin="anonymous"></script>

    <script src="js/generados/headerFooter.js"></script>
    <script src="js/generados/funciones.js"></script>
    <script src="js/generados/constantes.js"></script>







    <script>


    </script>

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