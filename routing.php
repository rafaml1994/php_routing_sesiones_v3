<?php
if (!isset($_SESSION)) {
	session_start();
}
$controllers = array(
	'profesor' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'sesion', 'error', 'logout', 'aleatorio', 'borrarAlea'],
	'alumno' => ['index', 'register', 'save', 'show', 'updateshow', 'update', 'delete', 'sesion', 'error', 'logout'],
	'home' => ['index', 'sesion', 'login', 'error', 'restore', 'restorepwd']
);

if (array_key_exists($controller,  $controllers)) {
	if (in_array($action, $controllers[$controller])) {

		//Aqui debemos redireccionar al usuario según sus credenciales para que pueda acceder a unas actions o a otras.
		if ($_SESSION['nombre'] && $controller == 'alumno' && ($action == 'index' || $action == 'register' || $action == 'save' || $action == 'show' || $action == 'updateshow' || $action == 'update' || $action == 'delete' || $action == 'sesion' || $action == 'error' || $action == 'logout')) {
			call($controller, $action);
		} elseif ($_SESSION['rol'] === true && $controller == 'profesor' && ($action == 'index' || $action == 'register' || $action == 'save' || $action == 'show' || $action == 'updateshow' || $action == 'update' || $action == 'delete' || $action == 'sesion' || $action == 'error' || $action == 'logout' || $action == 'aleatorio' || $action == 'borrarAlea')) {
			call($controller, $action);
		} elseif ($controller == 'home' && ($action == 'index' || $action == 'sesion' || $action == 'login' || $action == 'error' || $action == 'restore' || $action == 'restorepwd')) {
			if ($_SESSION['rol'] === true) {
				$controller = "profesor";
			} elseif ($_SESSION['nombre']) {
				$controller = "alumno";
			} else {
				call($controller, $action);
			}
		} else {
			call('home', 'index');
		}
	} else {
		call('home', 'index');
	}
} else { //si no encuentra o uno u otro se llamará a call('home','error')
	call('home', 'error');
}

function call($controller, $action)
{
	require_once('Controllers/' . $controller . 'Controller.php');
	switch ($controller) {
		case 'profesor':
			require_once('Model/profesor.php');
			$controller = new ProfesorController();
			break;
		case 'alumno':
			require_once('Model/alumno.php');
			$controller = new AlumnoController();
			break;
		case 'home':
			require_once('Model/home.php');
			$controller = new HomeController();
			break;
	}
	$controller->{$action}();
}
