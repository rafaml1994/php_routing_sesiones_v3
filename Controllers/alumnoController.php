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
    function search()
    {
        require_once('Views/Alumno/search.php');
    }
    function register()
    {
        require_once('Views/Alumno/register.php');
    }
    function error()
    {
        require_once('Views/Alumno/error.php');
    }
    function show()
    {

        require_once('Views/Alumno/show.php');
    }
    function save()
    {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $repetir = $_POST['repetir'];

        if ($contraseña === $repetir && !empty($contraseña)) {
            $base = new Connect();
            $conexion = $base->getConnection();
            $insert = $conexion->prepare("insert into usuarios values(default, :usuario,:contraseña)");
            $insert->bindValue('usuario', $usuario);
            $insert->bindValue('contraseña', $contraseña);
            $insert->execute();
            require_once('Views/Alumno/show.php');
        } else {
            require_once('Views/Alumno/register.php');
        }
    }
    function delete()
    {
        $id = $_GET['id'];
        $base = new Connect();
        $conexion = $base->getConnection();
        $resultado = $conexion->prepare("delete from usuarios where idusuario =" . $id);
        $resultado->execute();
        require_once('Views/Alumno/delete.php');
    }
    function updateshow()
    {
        require_once('Views/Alumno/updateshow.php');
    }
    function update()
    {
        $nombre = $_POST['nombre'];
        $unidades = $_POST['unidades'];
        $precio = $_POST['precio'];
        //Cambiado, cambiar si no funciona
        $id = $_GET['id'];

        $base = new Connect();
        $conexion = $base->getConnection();
        $insert = $conexion->prepare("update Productos set nombre = :nombre, unidades= :unidades, precio= :precio  where id =" . $id);
        $insert->bindValue('nombre', $nombre);
        $insert->bindValue('unidades', $unidades);
        $insert->bindValue('precio', $precio);
        $insert->execute();

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
}
