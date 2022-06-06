<?php if (!isset($_SESSION)) {
  session_start();
} ?>
<!DOCTYPE html>
<html lang="es">

<head>

  <title>Controlla@</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Librerias Boostrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> <!-- Latest compiled and minified CSS -->
  <!-- Css -->
  <link rel="stylesheet" media="screen" href="assets/css/nuevo.css">
</head>

<body>
  <div class="count-particles">
    <span class=" js-count-particles"></span>
  </div>
  <header style="background-color:black;">
    <div id="particles-js" style="height: 200px;">
      <!-- Probar a meterlo en un div y fondo trnasparente -->
      <div id="demotext">
        <h1>Controll@</h1>
      </div>
    </div>
    <?php
    require_once('cabecera.php');
    ?>
  </header>
  <section>
    <?php
    require_once('routing.php');
    //var_dump($_SESSION['rol']);
    ?>
  </section>

  <footer>
    <?php
    //include_once('footer.php');
    ?>
  </footer>
  <script src="assets/js/lib/stats.js"></script>
  <script src="assets/js/particles.js"></script>
  <script src="assets/js/app.js"></script>

</body>

</html>