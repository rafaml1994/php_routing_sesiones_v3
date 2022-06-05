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
        $id = $_GET['id'];
        $base = new Connect();
        $conexion = $base->getConnection();
        $resultado = $conexion->prepare("delete from grupo where idalumno = " . $id);
        $resultado2 = $conexion->prepare("delete from alumnos where idalumno = " . $id);
        $resultado->execute();
        $resultado2->execute();

        $this->show();
    }
    function updateshow()
    {
        require_once('Views/Profesor/updateshow.php');
    }
    function update()
    {
        $nombre = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        $base = new Connect();
        $conexion = $base->getConnection();

        $resultado = $conexion->query("select usuario,contraseña from alumnos");
        $resultado->execute();

        foreach ($resultado->fetchAll() as $fila) {
            $controlUsuario = $fila[0];
            $controlContraseña = $fila[1];
        }

        if ($nombre !== $controlUsuario && $contraseña !== $controlContraseña) {

            $nUsuario = (empty($nombre)) ? $controlUsuario : $nombre;
            $n_contraseña = (empty($contraseña)) ? $controlContraseña : $contraseña;

            //iniciamos update:
            $insert = $conexion->prepare('UPDATE alumnos SET usuario=:usuario, contraseña=:pass WHERE idalumno=' . $_GET['id']);
            $insert->bindValue('usuario', $nUsuario);
            $insert->bindValue('pass', $n_contraseña); //si ponemos contraseña en español da error
            $insert->execute();
            $_SESSION['mensaje'] = "¡Alumno actualizado correctamente!";
            $this->show();
        } elseif ($nombre === $controlUsuario && $contraseña === $controlContraseña) {
            $_SESSION['mensajeW'] = "¡El alumno ya existe con esa contraseña!";
            $this->show();
        } else {

            $this->show();
        }
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
