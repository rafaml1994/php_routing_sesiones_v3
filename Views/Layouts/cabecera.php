<?php if (!isset($_SESSION)) {
  session_start();
} ?>
<nav class="navbar navbar-expand-md navbar-dark d-flex">
  <div class=" container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php if ($_SESSION['nombre']) { ?>
        <ul class="navbar-nav mb-2 mb-lg-0" style="width:100%">
          <li class="nav-item" style=" margin-left:40% ">
            <a class="nav-link active" aria-current="page" href="?controller=alumno&action=index">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active link" href="?controller=alumno&action=show">Consultar mi grupo</a>
          </li>
          <li class="nav-item" style=" margin-right:28% ">
            <a class="nav-link active link" href="?controller=alumno&action=calificaciones">Calificar compañero</a>
          </li>
          <li class="nav-item" style="border-bottom: 5px solid rgba(255, 0, 0, 0) !important;">
            <a class=" btn btn-outline-success" style="color:white !important;" href="?controller=alumno&&action=logout">Cerrar sesion</a>
          </li>
        </ul>
      <?php } elseif (isset($_SESSION) &&  $_SESSION['iniciada'] === true && $_SESSION['rol'] === true) { ?>
        <ul class="navbar-nav mb-2 mb-lg-0" style="width:100%;">
          <li class="nav-item" style=" margin-left:43% ;width:auto">
            <a class="nav-link active link" aria-current="page" href="?controller=profesor&action=index">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active link" href="?controller=profesor&action=register">Registrar alumno</a>
          </li>
          <li class="nav-item " style="margin-right:30%">
            <a class=" nav-link active link" href="?controller=profesor&&action=show">Ver alumnos</a>
          </li>
          <li class="nav-item" style="border-bottom: 5px solid rgba(255, 0, 0, 0) !important;">
            <a class="btn btn-outline-success " id="probar" type="submit" style=" color:white !important;" href="?controller=profesor&&action=logout">Cerrar sesion</a>
          </li>
        </ul>
      <?php } else { ?>
        <ul class="navbar-nav mb-2 mb-lg-0" style="width:100%">
          <li class="nav-item" style=" margin-left:47%">
            <a class="nav-link active" aria-current="page" href="?controller=home&action=index">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?controller=home&action=sesion">Log in</a>
          </li>
        </ul>
      <?php } ?>
    </div>
  </div>
</nav>