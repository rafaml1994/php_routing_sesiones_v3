<div class="container shadow rounded" style=" background-color:#FFFFFF; border-radius: 7px; ">
  <div class="mx-auto mt-md-5 col-md-3 pb-mb-5 ">
    <form action="?controller=profesor&action=save" method="POST">
      <div class="mb-3">
        <label for="nombre" class="form-label mt-5 mb-4" style="font-weight: bold;">Usuario del alumno :</label>
        <input type="text" class="form-control mb-4" id="nombre" aria-describedby="Nombre" placeholder="Introduzca usuario" name="usuario">

      </div>
      <div class="mb-3">
        <label for="contraseña" class="form-label mb-4" style="font-weight: bold;">Contraseña del alumno :</label>
        <input type="password" class="form-control" id="contraseña" placeholder="Introduzca contraseña" name="contraseña">
      </div>
      <div class="input-group mb-3">

        <input type="password" class="form-control mb-4" id="repetir" placeholder="Repita la contraseña" name="repetir">
      </div>

      <button type="submit" class="btn btn-primary mb-5" style="width:100%;">Registrar alumno</button>
    </form>

  </div>
  <div class="container pb-5">
    <?php
    if (isset($_SESSION['mensajeW'])) {
      echo "<div class='alert alert-danger'>";
      echo "<strong>" . $_SESSION['mensajeW'] . "</strong>";
      echo "</div>";
    }
    unset($_SESSION['mensajeW']);
    ?>
  </div>
</div>