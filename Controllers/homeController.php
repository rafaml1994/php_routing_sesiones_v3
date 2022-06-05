<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('connection.php');
class HomeController
{
    function index()
    {
        require_once('Views/Home/inicio.php');
    }

    function error()
    {
        require_once('Views/Home/error.php');
    }
    function sesion()
    {
        require_once('Views/Home/sesion.php');
    }
    function login()
    {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $repetir = $_POST['repetir'];

        $base = new Connect();
        $conexion = $base->getConnection();

        $resultado = $conexion->query("select*from profesores where usuario ='$usuario'");
        $resultado2 = $conexion->query("select*from alumnos where usuario ='$usuario'");

        foreach ($resultado->fetchAll() as $fila) {
            $_SESSION['id'] = $fila[0];
            $_SESSION['usuario'] = $fila[1];
            $_SESSION['contraseña'] = $fila[2];
            $_SESSION['rol'] = $fila[3];
        }
        foreach ($resultado2->fetchAll() as $falumno) {
            $_SESSION['idAlumno'] = $falumno[1];
            $_SESSION['nombre'] = $falumno[2];
            $_SESSION['contraseñaAlumno'] = $falumno[3];
        }
        if (isset($_SESSION) && $_SESSION['usuario'] === $usuario && $_SESSION['rol'] === true) {
            if ($contraseña === $repetir) {
                $_SESSION['iniciada'] = true;
                $_SESSION['grupos'] = 0;
                header('Location: ?controller=profesor&&action=index');
            } else {
                //mensajes de error como en profesor
            }
        } elseif (isset($_SESSION) && $_SESSION['nombre'] === $usuario) {
            if ($contraseña === $repetir) {
                $_SESSION['iniciada'] = true;
                header('Location: ?controller=alumno&&action=index');
            } else {
                //mensaje de error como en profesor
            }
        }
    }

    function restore()
    {
        require_once('Views/Home/restore.php');
    }
    function restorepwd()
    {
        require_once('Views/Home/restorepwd.php');
    }
}
