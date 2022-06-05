<?php
ob_start();
if (!isset($_SESSION)) {
    session_start();
}
require_once('connection.php');
class ProfesorController
{
    function index()
    {
        require_once('Views/Profesor/bienvenido.php');
    }
    function register()
    {
        require_once('Views/Profesor/register.php');
    }
    function error()
    {
        require_once('Views/Profesor/error.php');
    }
    function show()
    {
        require_once('Views/Profesor/show.php');
    }
    function save()
    {
        require_once('Views/Profesor/save.php');
    }
    function delete()
    {
        require_once('Views/Profesor/delete.php');
    }
    function updateshow()
    {
        require_once('Views/Profesor/updateshow.php');
    }
    function update()
    {
        require_once('Views/Profesor/update.php');
    }
    function logout()
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['contraseña']);
        unset($_SESSION['rol']);
        unset($_SESSION['id']);
        session_destroy();
        header('Location: index.php?controller=home&action=index');
    }
    function aleatorio()
    {
        require_once('Views/Profesor/aleatorio.php');
    }
    function borrarAlea()
    {
        require_once('Views/Profesor/borrarAlea.php');
    }
}
ob_end_flush();
