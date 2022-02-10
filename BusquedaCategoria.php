<?php include("db.php");

$tema = $_GET["tema"];
$valor = $_GET["valor"];
?>
<div hidden>
  <?php
  $_SESSION["datos"] = $_GET["nombre"];
  $_SESSION["id_usuario"] = $_GET["id_usuario"];
  ?>
</div>

<!DOCTYPE html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Busqueda por Categoria</title>
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
  <div id="main">
    <h2>Autores que hayan escrito sobre: <?php echo $valor ?></h2>
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
                <th>Autor</th>
                <th>Tema</th>
                <th>Total de artículos Publicados</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>


              <?php
              if ($tema == "estado") {
                $query = "SELECT DISTINCT COUNT(articulos.id_articulo) as 'Articulos Totales', articulos.id_usuario, articulos.estado_candidato, usuarios.nombre_usuario
              FROM articulos
              INNER JOIN usuarios
              ON articulos.id_usuario=usuarios.id_usuario
              WHERE estado_candidato = '$valor'
              GROUP BY articulos.id_usuario";
              } else if ($tema == "candidato") {
                $query = "SELECT DISTINCT COUNT(articulos.id_articulo) as 'Articulos Totales', articulos.nombre_candidato, articulos.id_usuario, articulos.estado_candidato, usuarios.nombre_usuario
              FROM articulos
              INNER JOIN usuarios
              ON articulos.id_usuario=usuarios.id_usuario
              WHERE nombre_candidato = '$valor'
              GROUP BY articulos.id_usuario";
              } else if ($tema == "partido") {
                $query = "SELECT DISTINCT COUNT(articulos.id_articulo) as 'Articulos Totales', articulos.id_usuario, articulos.estado_candidato, usuarios.nombre_usuario, articulos.partido_candidato
              FROM articulos
              INNER JOIN usuarios
              ON articulos.id_usuario=usuarios.id_usuario
              WHERE partido_candidato = '$valor'
              GROUP BY articulos.id_usuario";
              }

              $result_tasks = mysqli_query($conn, $query);

              echo $valor;
              while ($row = mysqli_fetch_assoc($result_tasks)) {

              ?>
                <tr>
                  <td><?php echo $row['nombre_usuario']; ?></td>
                  <td>
                    <?php if ($tema == "estado") {
                      echo $row['estado_candidato'];
                    } else if ($tema == "candidato") {
                      echo $row['nombre_candidato'];
                    } else if ($tema == "partido") {
                      echo $row['partido_candidato'];
                    } ?>
                  </td>
                  <td><?php echo $row['Articulos Totales']; ?> artículo(s)</td>
                  <td>
                    <a href="BusquedaTemaAutor.php?id_usuarioE=<?php echo $row['id_usuario'] ?>&tema=<?php echo $tema ?>&valor=<?php echo $valor ?>&id_usuario=<?php echo $_SESSION['id_usuario'] ?>&nombre=<?php echo $_SESSION['datos'] ?>" class="btn btn-primary">
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
  <div id="footer" style="position: absolute;bottom: 0;width: 100%;">

  </div>


  <script src="js/lib/jquery-3.6.0.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/0af9583a5b.js" crossorigin="anonymous"></script>

  <script src="js/generados/headerFooter.js"></script>

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