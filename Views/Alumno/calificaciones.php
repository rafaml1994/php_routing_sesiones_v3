<div class="container mt-5" style="width: 50%;">
    <div class="container shadow-lg p-4 mb-5 tabla">
        <table class="table">
            <thead style="color:white; background-color: #060606">
                <tr style="text-align:center">
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Usabilidad</th>
                    <th scope="col">Codigo</th>
                    <th scope="col">Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conexion = Connect::getConnection();
                $comprobar = $conexion->query("select idalumno from alumnos order by idalumno asc;");
                $comprobar2 = $conexion->query("select idalumno from calificar order by idalumno asc;");
                foreach ($comprobar->fetchAll() as $row2) {
                    $idAlumno[] = $row2[0];
                }

                $idCalificar[0] = 0;
                foreach ($comprobar2->fetchAll() as $row1) {
                    $idCalificar[] = $row1[0];
                }

                $resultado = array_diff($idAlumno, $idCalificar);

                foreach ($resultado as $id) {
                    $insert = $conexion->prepare("insert into calificar values(default,$id)");
                    $insert->execute();
                }

                $tabla = $conexion->query("select alumnos.idalumno,alumnos.usuario,calificar.usabilidad,calificar.codigo,calificar.total from alumnos inner join calificar on alumnos.idalumno = calificar.idalumno order by alumnos.idalumno asc;");
                foreach ($tabla->fetchAll() as $fila) {
                    if ($_SESSION['nombre'] !== $fila[2]) {
                        echo "<tr style='text-align: center'><th scope='row'>" . $fila[0] . "</th>";
                        echo "<td>" . $fila[1] . "</td>";
                        echo "<td>" . $fila[2] . "</td>";
                        echo "<td>" . $fila[3] . "</td>";
                        echo "<td>" . $fila[4] . "</td>";
                        echo "<td style='text-align: center;'><a class='btn btn-primary' href='?controller=alumno&action=calificar&id=" . $fila[0] . "'>Puntuar</a></td>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>