<div class="container">
  <div class="bg_color">
    <div class="waves w1"></div>
    <div class="waves w2"></div>
  </div>
</div>
<div class="container shadow-lg rounded col-md-3 mt-5 login" style=" background-color:#FFFFFF; border-radius: 7px; ">
  <div class="mx-auto md-5 col-md-5 pb-mb-5 ">
    <form action="?controller=profesor&action=update&id=<?php echo $_GET['id'] ?>" method="POST">
      <div class="mb-3">
        <label for="nombre" class="form-label mt-5 mb-4" style="font-weight: bold;">Actualizar alumno :</label>
        <input type="text" class="form-control mb-4" id="nombre" aria-describedby="Nombre" placeholder="Introduzca usuario" name="usuario">
      </div>
      <div class="mb-3">
        <label for="contraseña" class="form-label mb-4" style="font-weight: bold;">Actualizar dni :</label>
        <input type="text" class="form-control" id="dni" placeholder="ej. 111111119" name="dni">
      </div>
      <button type="submit" class="btn btn-primary mb-5" style="width:100%;">Actualizar</button>
    </form>
  </div>
</div>