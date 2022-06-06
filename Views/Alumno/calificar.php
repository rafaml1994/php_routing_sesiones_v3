<div class="container">
    <div class="bg_color">
        <div class="waves w1"></div>
        <div class="waves w2"></div>
    </div>
</div>
<div class="container shadow-lg rounded col-md-3 mt-5 login" style=" background-color:#FFFFFF; border-radius: 7px; ">
    <div class="mx-auto mt-md-5 col-md-5 pb-mb-5 ">
        <form action="?controller=alumno&action=calificar" method="POST">
            <div class="mb-3">
                <label for="usabilidad" class="form-label mt-2" max="10" min="0" style="font-weight: bold;">Usabilidad:</label>
                <input type="number" class="form-control mb-4" id="usabilidad" value="0" name="usabilidad">
            </div>
            <div class="mb-3">
                <label for="codigo" class="form-label mt-2" max="10" min="0" style="font-weight: bold;">Usabilidad:</label>
                <input type="number" class="form-control mb-4" id="codigo" value="0" name="codigo">
            </div>
            <button type="submit" class="btn btn-primary mb-5" style="width:100%;">Puntuar</button>
        </form>
    </div>
    <div class="container pb-5">
        <?php
        if (isset($_SESSION['mensajeW'])) {
            echo "<div class='alert alert-danger'>";
            echo "<strong>" . $_SESSION['mensajeW'] . "</strong>";
            echo "</div>";
        }
        unset($_SESSION['mensajeW']);
        ?>
    </div>
</div>