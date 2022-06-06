<?
require_once('connection.php');
$conexion = Connect::getConnection();
$resultado = $conexion->query("select dni from alumnos");
$resultado->execute();

$contraseña = $_POST['pass'];
$rpass = $_POST['rpass'];
$dni = $_POST['dni'];

foreach ($resultado->fetchAll() as $fila) {
    $controlDni = $fila[0];
    if ($controlDni === $dni) {
        $ok = true;
    }
}

if ($ok === true) {
    if ($contraseña === $rpass) {
        $n_pass = $contraseña;

        //iniciamos update:
        $insert = $conexion->prepare('UPDATE alumnos SET contraseña=:pass WHERE dni =:dni');

        $insert->bindValue(':dni', $dni); //como se trata de un String da error al usar el concatenar, por lo que es recomendable usar esta manera.
        $insert->bindValue(':pass', $n_pass); //si ponemos contraseña en español da error

        $insert->execute();

        setcookie('update', 1, time() + 10000, '/'); //poner el path para usar la cookie en distintos directorios

        header('Location: ?controller=home&action=sesion');
    } else {
        setcookie('noupdate', 1, time() + 10000, '/'); //generar mensaje de cookie error con "no coinciden las contraseñas" 
        header('Location: ?controller=home&action=restore');
    }
} else {
    setcookie('error', 1, time() + 10000, '/'); //generar mensaje de cookie error con no existe el DNI
    header('Location: ?controller=home&action=restore');
}
ob_end_flush();
