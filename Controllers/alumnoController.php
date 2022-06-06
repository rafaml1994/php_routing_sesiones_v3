<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('connection.php');
class AlumnoController
{
    function index()
    {
        require_once('Views/Alumno/bienvenido.php');
    }
    function show()
    {
        require_once('Views/Alumno/show.php');
    }

    function logout()
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['contraseña']);
        unset($_SESSION['rol']);
        unset($_SESSION['id']);
        session_destroy();
        header('Location: index.php');
    }
    function calificaciones()
    {
        require_once('Views/Alumno/calificaciones.php');
    }
    function calificar()
    {
        require_once('Views/Alumno/calificar.php');
    }
    // function error()
    // {
    //     require_once('Views/Alumno/error.php');
    // }
}
