<?php

$nombre = $_POST['usuario'];
$dni = $_POST['dni'];

$conexion = Connect::getConnection();

$resultado = $conexion->query("select usuario,dni from alumnos");
$resultado->execute();

foreach ($resultado->fetchAll() as $fila) {
    $controlUsuario = $fila[0];
    if ($controlUsuario === $nombre) {
        $controlUsuario = $fila[0];
        var_dump($controlUsuario);
    }
    $controlDni = $fila[1];
    if ($dni === $controlDni) {
        $controlDni = $fila[1];
    }
}

if ($controlUsuario !== $nombre || $controlDni !== $dni) {
    var_dump($nombre);
    var_dump($dni);
    $nUsuario = (empty($nombre)) ? $controlUsuario : $nombre;
    $nDni = (empty($dni)) ? $controlDni : $dni;

    //iniciamos update:

    $insert = $conexion->prepare('UPDATE alumnos SET usuario=:usuario, dni=:dni WHERE idalumno=' . $_GET['id']);
    $insert->bindValue('usuario', $nUsuario);
    $insert->bindValue('dni', $nDni); //si ponemos "contraseña" en español da error
    $insert->execute();

    $_SESSION['mensaje'] = "¡Alumno actualizado correctamente!";
    header('Location: index.php?controller=profesor&action=show');
} elseif ($nombre === $controlUsuario && $dni === $controlDni) {
    $_SESSION['mensajeW'] = "¡El alumno ya existe con esa contraseña!";
    header('Location: index.php?controller=profesor&action=show');
} else {
}
