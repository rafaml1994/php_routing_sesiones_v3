<div class="containerP">
  <div class="container pt-5" style=" background-color:#FFFFFF ">
    <?php
    if (isset($_SESSION['mensaje'])) {
      echo "<div class='alert alert-success'>";
      echo "<strong>" . $_SESSION['mensaje'] . "</strong>";
      echo "</div>";
    }
    if (isset($_SESSION['mensajeW'])) {
      echo "<div class='alert alert-danger'>";
      echo "<strong>" . $_SESSION['mensajeW'] . "</strong>";
      echo "</div>";
    }
    unset($_SESSION['mensaje']);
    unset($_SESSION['mensajeW']);
    ?>
    <div class="container shadow-lg p-4 mb-5">
      <table class="table">
        <thead style="color:white; background-color: #060606">
          <tr style="text-align:center">
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">DNI</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $conexion = Connect::getConnection();
          $resultado = $conexion->query("select*from alumnos order by idalumno asc;");
          foreach ($resultado->fetchAll() as $fila) {
            echo "<tr style='text-align: center'><th scope='row'>" . $fila[1] . "</th>";
            echo "<td>" . $fila[2] . "</td>";
            echo "<td>" . $fila[4] . "</td>";
            echo "<td style='text-align: right;'><a class='btn btn-primary' href='?controller=profesor&action=updateshow&id=" . $fila[1] . "'>Actualizar</a></td>";
            echo "<td><a class='btn btn-danger' style='background-color:red; border-color:red;' href='?controller=profesor&action=delete&id=" . $fila[1] . "'>Eliminar</a></td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
    <h4 class="text-center mb-4">Por defecto, la aplicacion crea los grupos de 3 personas. En caso de que quieras otra opción, elimina el grupo y crealo a tu gusto.</h4>
    <h5 class="text-center mb-5 ">*La aplicación reajustará a los alumnos para que ningún alumno se quede sin grupo de trabajo.</h5>
    <div class="container col-2 select">
      <form action="?controller=profesor&action=aleatorio" method="post">
        <select class="form-select mb-5 " name="select" aria-label="Default select example">
          <option selected value="1" class="text-center">1 - Persona</option>
          <option value="2" class="text-center">2 - Personas</option>
          <option value="3" class="text-center">3 - Personas</option>
          <option value="4" class="text-center">4 - Personas</option>
          <option value="5" class="text-center">5 - Personas</option>
        </select>
    </div>
    <div class="container col text-center mb-5" role="group" aria-label="Basic example">
      <a class='btn btn-danger' href='?controller=profesor&action=borrarAlea'>Eliminar grupos</a>
      <button class='btn btn-primary' type="submit">Crear grupos</a>
    </div>
    </form>
    <div class="mt-5 pt-1 pb-1 mb-5 rounded shadow p-3 mb-5 bg-body rounded" style="background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,1) 25%, rgba(26,255,0,1) 100%, rgba(0,47,255,1) 100%);">
      <h1 class="text-center" style="color:#FFFFFF">Tus grupos creados:</h1>
      <h6 class="text-center text-white">Gestiona los grupos de trabajo de manera rápida y sencilla</h6>

    </div>
    <div class="container shadow-lg p-3 mb-5">
      <table class="table table-dark table-striped">
        <thead style="color:white; background-color: #060606">
          <tr>
            <th class="text-center" scope="col">Grupos</th>
            <th class="text-center" scope="col">Usuario</th>
          </tr>
        </thead>
        <tbody>
    </div>
    <?php
    $conexion = Connect::getConnection();
    $resultado = $conexion->query("select alumnos.usuario, grupo.grupo from alumnos inner join grupo on alumnos.idalumno = grupo.idalumno order by grupo.idgrupo asc; ");
    if ($resultado) {
      foreach ($resultado->fetchAll() as $fila) {
        echo "<tr><td class='text-center'scope='row'>" . $fila[1] . "</td>";
        echo "<td class='text-center'>" . strtoupper($fila[0]) . "</td>";
      }
    }
    ?>
    </tbody>
    </table>
  </div>
  <div class="container">
    <h3 class="text-center">Aquí podrás establecer un tiempo para la votación de los alumnos</h3>
    <h4 class="text-center">Recuerda que el tiempo debe estar en minutos</h4>
    <div class="container col-3">
      <form action="?controller=profesor&action=show" method="POST">
        <div class="mb-3">
          <label for="cookie" class="form-label mb-2 pt-3" style="font-weight: bold;">Establecer tiempo :</label>
          <input type="number" class="form-control" id="cookie" max="3600" min="0" placeholder="*Tiempo en minutos" name="cookie">
        </div>
        <div class="container col-5">
          <button type="submit" class="btn btn-primary mb-5" style="width:100%;">Establecer</button>
        </div>
      </form>
      <?php
      $profesor = $_SESSION['usuario'];
      $c = $_POST['cookie'];
      $conexion = Connect::getConnection();
      $insert = $conexion->prepare('UPDATE profesores SET cookies=:c WHERE usuario=:p');
      $insert->bindValue(':c', $c);
      $insert->bindValue(':p', $profesor);
      $insert->execute();
      ?>
    </div>
  </div>
</div>