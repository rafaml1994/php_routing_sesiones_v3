<div class="container shadow rounded" style=" background-color:#FFFFFF; border-radius: 7px; ">
  <div class="mx-auto mt-md-5 col-md-3 pb-mb-5 ">
    <form action="?controller=profesor&action=update&id=<?php echo $_GET['id'] ?>" method="POST">
      <div class="mb-3">
        <label for="nombre" class="form-label mt-5 mb-4" style="font-weight: bold;">Actualizar alumno :</label>
        <input type="text" class="form-control mb-4" id="nombre" aria-describedby="Nombre" placeholder="Introduzca usuario" name="usuario">
      </div>
      <div class="mb-3">
        <label for="contraseña" class="form-label mb-4" style="font-weight: bold;">Actualizar contraseña :</label>
        <input type="password" class="form-control" id="contraseña" placeholder="Introduzca contraseña" name="contraseña">
      </div>
      <button type="submit" class="btn btn-primary mb-5" style="width:100%;">Actualizar</button>
    </form>
  </div>
</div>