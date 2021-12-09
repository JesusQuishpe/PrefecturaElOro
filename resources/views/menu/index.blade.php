<!DOCTYPE html>
<html lang=lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>GAD EL ORO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
      height: 1500px
    }

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }

      .row.content {
        height: auto;
      }
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav">
        <h4>MENU GADPEO</h4>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="caja">CM-CAJA</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="cambios.php">DEVOLUCIONES</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="Actualizar.php">ACTUALIZA PACIENTE</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="enfermeria">ENFERMERIA</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="odontologia">ODONTOLOGÍA</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="reportediario.php">REPORTE DIARIO</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="reporte.php">REPORTE FECHA Y AREA</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="reporteenfermeria.php">REPORTE ENFERMERIA</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="reporteresumenarea.php">REPORTE RESUMEN X AREA</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="reporteetario.php">REPORTE ETARIO</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="medicina">MEDICINA</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="enfermeros/index.php">TRATANTES</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="reporteetarioxtratante.php">REPORTE ETARIO X TRATANTES</a></li>
        </ul><br>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="reporteetarioxenfermera.php">REPORTE ETARIO X ENFERMERA-O</a></li>
        </ul><br>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>Cerrar Sesion</a></li>
      </ul>
      <div class="col-sm-9">
        <center>
          <h4><small>GOBIERNO AUTONOMO DESCENTRALIZADO DE EL ORO</small></h4>
        </center>
        <hr>
        <center>
          <h2>BIENVENIDOS GAD EL ORO</h2>
        </center>
        <center><img src="../../assets/img/imagen_prefecto.jpg" class="img-circle" width="30%" height="30%" border="2"></img></center>
        <p></p>
        <br><br>
        </hr>
      </div>
    </div>
  </div>

  <footer class="container-fluid">
    <p>
      <center>CENTRO DE COMPUTO 2016</center>
    </p>
    <p>
      <center>Lic. Christian Matamoros e Tnglo. Jose Morales</center>
    </p>
    <p>
      <center>ing. Hernan Sanchez</center>
    </p>
    <p>
      <center>Secretaria Computo : Diana Rojas</center>
    </p>
    <p>
      <center>Ext. 319 - 330 </center>
    </p>
    <p>
      <center>© 2016-2017 Php y MYSQL</center>
    </p>
  </footer>

</body>

</html>