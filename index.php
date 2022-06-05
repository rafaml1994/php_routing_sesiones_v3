<?php //Increible error, si esta línea la ponemos en la línea "dos" dejando una línea libre, genera warnigs de sesiones que no se quitan. Solucionado error simplemente poniendolo así (sin espacios en blanco).
ob_start(); //Otro increible error, si no se corta el flujo con estas etiquetas, da error en el header porque se envía y no es posible modificarlo (para las cabeceras) y no se refresca la página.
if (!isset($_SESSION)) {
    session_start();
}
require_once('connection.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'home';
    $action = 'index';
    if (isset($_SESSION['usuario']) && $_SESSION['rol'] === false) {
        $controller = 'alumno';
        $action = 'index';
    } else {
        if ($_SESSION['usuario'] && $_SESSION['rol'] === true) {
            $controller = 'profesor';
            $action = 'index';
        } else {
            $action = 'show';
        }
    }
}
require_once('Views/Layouts/layout.php');
ob_end_flush();
