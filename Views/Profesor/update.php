<?php

$nombre = $_POST['usuario'];
$dni = $_POST['dni'];

$conexion = Connect::getConnection();

$resultado = $conexion->query("select usuario,dni from alumnos where idalumno=" . $_GET['id']);
$resultado->execute();

foreach ($resultado->fetchAll() as $fila) {
    $controlUsuario = $fila[0];
    $controlDni = $fila[1];
}

if ($controlUsuario !== $nombre || $controlDni !== $dni) {

    $nUsuario = (empty($nombre)) ? $controlUsuario : $nombre;
    $nDni = (empty($dni)) ? $controlDni : $dni;
    $profesor = new Profesor('1', 'carmelo', 'admin', '1'); //probar a meterlo en una variable de sesion 
    $validar = $profesor->dni($nDni);
    if ($validar === true) {
        $nDni = strtoupper($nDni);
        //iniciamos update:
        $insert = $conexion->prepare('UPDATE alumnos SET usuario=:usuario, dni=:dni WHERE idalumno=' . $_GET['id']);
        $insert->bindValue('usuario', $nUsuario);
        $insert->bindValue('dni', $nDni); //si ponemos "contraseña" en español da error
        $insert->execute();

        $_SESSION['mensaje'] = "Alumno actualizado correctamente";
        header('Location: index.php?controller=profesor&action=show');
    } else {
        $_SESSION['mensajeW'] = "Formato DNI incorrecto";
        require_once('show.php');
    }
}
