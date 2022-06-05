<?php

// Meter aquí el logueo

$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$base = new Connect();
$conexion = $base->getConnection();

$resultado = $conexion->query("select*from profesores where usuario ='$usuario'");
$resultado2 = $conexion->query("select*from alumnos where usuario ='$usuario'");

foreach ($resultado->fetchAll() as $fila) {
    $_SESSION['id'] = $fila[0];
    $_SESSION['usuario'] = $fila[1];
    $_SESSION['contraseña'] = $fila[2];
    if ($_SESSION['contraseña'] === $contraseña) {
        echo "contraseña ok" . var_dump($contraseña);
        $pass = true;
    }
    $_SESSION['rol'] = $fila[3];
}
foreach ($resultado2->fetchAll() as $falumno) {
    $_SESSION['idAlumno'] = $falumno[1];
    $_SESSION['nombre'] = $falumno[2];
    $_SESSION['contraseñaAlumno'] = $falumno[3];
}
if (isset($_SESSION) && $_SESSION['usuario'] === $usuario && $_SESSION['rol'] === true) {
    if ($pass === true) {
        $_SESSION['iniciada'] = true;
        $_SESSION['grupos'] = 0;
        header('Location: ?controller=profesor&&action=index');
    } else {
        session_destroy();
        setcookie('control', 1, time() + 1000, '/');
        header('Location: ?controller=home&&action=sesion');
    }
} elseif (isset($_SESSION) && $_SESSION['nombre'] === $usuario) {
    if ($pass === true) {
        $_SESSION['iniciada'] = true;
        //header('Location: ?controller=alumno&&action=index');
    } else {

        //mensaje de error como en profesor
        //header('Location: ?controller=alumno&&action=index');
    }
} else {
    session_destroy();
    setcookie('usuario', 1, time() + 1000, '/');
    header('Location: ?controller=home&&action=sesion');
}
