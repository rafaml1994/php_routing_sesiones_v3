<div class="container pt-5 pb-5 mt-5 shadow-lg p-3 mb-5" style=" background-color:#FFFFFF;border-radius:10px; ">
    <table class="table">
        <thead style="color:white; background-color: #060606">
            <tr>
                <th class="text-center" scope="col">Grupos</th>
                <th class="text-center" scope="col">Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conexion = Connect::getConnection();
            $resultado = $conexion->query("select alumnos.usuario, grupo.grupo from alumnos inner join grupo on alumnos.idalumno = grupo.idalumno order by grupo.grupo asc; ");
            if ($resultado) {
                foreach ($resultado->fetchAll() as $fila) {
                    //Buscamos el grupo del alumno y lo extraemos.
                    if ($fila[0] === $_SESSION['nombre']) {
                        $grupo = $fila[1];
                    }
                    //Igualamos el grupo del alumno con el grupo de la DB para que nos lo pinte en caso de que sean iguales.
                    if ($grupo === $fila[1]) {
                        echo "<tr class='text-center bg-success'><td class='text-center'scope='row'><strong>" . $fila[1] . "</strong></td>
                        <td class='text-center'><strong>" . strtoupper($fila[0]) . "</strong></td></tr>";
                    } else {
                        echo "<tr><td class='text-center'scope='row'>" . $fila[1] . "</td>";
                        echo "<td class='text-center'>" . strtoupper($fila[0]) . "</td></tr>";
                    }
                }
            } else {
                echo "<div class='alert alert-warning text-center'>";
                echo "<h3>Actualmente no estas en nigún grupo de trabajo</h3>";
                echo "<a class='btn btn-primary text-center' href='?controller=alumno&action=index'>Volver a inicio</a>";
                echo "</div>";
            }
            ?>
        </tbody>
    </table>
</div>