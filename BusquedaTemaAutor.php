<?php include("db.php");
$id_usuarioE = $_GET["id_usuarioE"];
$valor = $_GET["valor"];
$tema=$_GET["tema"];
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/2b0aad9cbf.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilo1.css">
</head>

<body>
  <header>
    <div id="header">

    </div>
  </header>

  <div class="cuerpo">
    <div class="contenido"></div>

    <h2>Artículos escritos por: <?php echo "Esteban Ramirez" ?></h2>
    <hr>


    <div class="container p-4" style="padding-top:5%">
      <div class="row">
        <div>


          <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
              <?= $_SESSION['message'] ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php session_unset();
          } ?>



        </div>
        <div class="col-md-8">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Candidato</th>
                <th>Partido</th>
                <th>Estado</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <! --aquí va la conexión del bloc de notas -->

                <?php

                if ($tema == "estado") {
                  $query = "SELECT * FROM articulos WHERE id_usuario = $id_usuarioE and estado_candidato='$valor'";
                } else if ($tema == "candidato") {
                  $query = "SELECT * FROM articulos WHERE nombre_candidato = '$valor'";
                } else if ($tema == "partido") {
                  $query = "SELECT * FROM articulos WHERE id_usuario = $id_usuarioE and partido_candidato = '$valor'";
                }





                $result_tasks = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result_tasks)) { ?>

                  <tr>
                    <td><?php echo $row['nombre_candidato']; ?></td>
                    <td><?php echo $row['partido_candidato']; ?></td>
                    <td><?php echo $row['estado_candidato']; ?></td>
                    <td>
                      <a href="visualizacion.php?id_articulo=<?php echo $row['id_articulo'] ?>&id_usuario= <?php echo $_SESSION['id_usuario'] ?>&nombre= <?php echo $_SESSION['datos'] ?>" class="btn btn-primary">
                        <i class="glyphicon glyphicon-eye-open">Ver Artículos</i>
                      </a>
                    </td>
                  </tr>

                <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>


  <footer>
    <div id="footer" style="position: absolute; bottom: 0; width: 100%;">

    </div>
  </footer>

  <script src="js/lib/jquery-3.6.0.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/0af9583a5b.js" crossorigin="anonymous"></script>

  <script src="js/generados/headerFooter.js"></script>
</body>

</html>