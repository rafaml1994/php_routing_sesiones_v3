<div class="container">
    <div class="bg_color">
        <div class="waves w1"></div>
        <div class="waves w2"></div>
    </div>
</div>
<div class="container shadow-lg rounded col-md-3 mt-5 login" style=" background-color:#FFFFFF; border-radius: 7px; ">
    <div class="mx-auto mt-md-5 col-md-5 pb-mb-5 ">
        <form action="?controller=alumno&action=calificar&id=<?php echo $_GET['id'] ?>" method="POST">
            <div class="mb-3">
                <label for="usabilidad" class="form-label mt-2" max="10" min="0" style="font-weight: bold;">Usabilidad:</label>
                <input type="number" class="form-control mb-4" id="usabilidad" value="0" name="usabilidad">
            </div>
            <div class="mb-3">
                <label for="codigo" class="form-label mt-2" max="10" min="0" style="font-weight: bold;">Codigo:</label>
                <input type="number" class="form-control mb-4" id="codigo" value="0" name="codigo">
            </div>
            <button type="submit" class="btn btn-primary mb-5" name="enviar" onclick="alerta()" style="width:100%;">Puntuar</button>
        </form>
    </div>
</div>
<?php

//iniciar calificaciones :

if (isset($_POST['enviar'])) {
    $conexion = Connect::getConnection();

    $usabilidad = $_POST['usabilidad'];
    $codigo = $_POST['codigo'];

    //marcarmos un límite:

    $usabilidad = ($usabilidad > 10) ? $usabilidad = 10 : $usabilidad;
    $usabilidad = ($usabilidad < 0) ? $usabilidad = 0 : $usabilidad;

    $codigo = ($codigo > 10) ? $codigo = 10 : $codigo;
    $codigo = ($codigo < 0) ? $codigo = 0 : $codigo;

    $id = $_GET['id'];
    $total = (($usabilidad + $codigo) / 2);

    $calificar = $conexion->query("select usabilidad,codigo,total from calificar where idalumno = '$id';");
    foreach ($calificar->fetchAll() as  $fila) {
        $u = $fila[0];
        $c = $fila[1];
        $t = $fila[2];
    }

    $resultado1 = $usabilidad + $u;
    $resultado2 = $codigo + $c;
    $resultado3 = $total + $t;


    $insert = $conexion->prepare('UPDATE calificar SET usabilidad=:u, codigo=:c, total=:t WHERE idalumno=' . $id);
    $insert->bindValue(':u', $resultado1);
    $insert->bindValue(':c', $resultado2);
    $insert->bindValue(':t', $resultado3);

    $insert->execute();
    setcookie($id, $id, time() + 10000000000, '/');
    //header('Location: index.php?controller=alumno&action=calificaciones');
}
?>