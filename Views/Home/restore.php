<div class="container">
    <div class="bg_color">
        <div class="waves w1"></div>
        <div class="waves w2"></div>
    </div>
</div>
<div>
    <div class="container">
        <?php
        if (isset($_COOKIE['noupdate'])) {
            echo "<div class='alert alert-danger mt-5 mx-auto' style='width:40%'>";
            echo "<center><strong>Compruebe que las contraseñas coinciden</strong><center>";
            echo "</div>";
        }
        if (isset($_COOKIE['error'])) {
            echo "<div class='alert alert-danger mt-5 mx-auto'style='width:40%'>";
            echo "<center><strong>No existe ese DNI</strong><center>";
            echo "</div>";
        }
        setcookie('noupdate', 0, time() - 100, '/');
        setcookie('error', 0, time() - 100, '/');
        ?>
    </div>
    <div class="m-0 row justify-content-center" style="justify-content: space-between;">
        <div id="card" class="col-sm-5 m-0 row justify-content-center">
            <div class=" card row mx-auto shadow p-3 mb-5 mt-5 bg-body rounded restore" style="width: 18rem; ">
                <img src="http://eligeeducar.cl/content/uploads/2020/09/clases-virtuales.jpg" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">Usa nuestra App</h5>
                    <p class="card-text">Para poder empezar, primero ponte en contacto con tu administrador para que te de las credenciales necesarias para poder loguearte.</p>
                    <a href="index.php?controller=home&action=sesion" class="btn btn-primary">Log in</a>
                </div>
            </div>
            <div class="col-sm-5 m-0 row justify-content-center">
                <div class=" card shadow p-3 mb-5 mt-5 bg-body rounded" style="width: 18rem; ">
                    <form action="?controller=home&action=restorepwd" method="post">
                        <label class="form-label mb-4 lbl" for="dni">Introduce tu DNI :</label>
                        <input type="text" class="form-control mb-4" placeholder="ej: 11111111A" name="dni" id="dni">
                        <label class="form-label mb-4 lbl" for="pass">Introduce tu nueva contraseña :</label>
                        <input type="password" class="form-control mb-4" placeholder="contraseña nueva" name="pass" id="pass" required>
                        <label class="form-label mb-4 lbl" for="rpass">Repite tu nueva contraseña :</label>
                        <input type="password" class="form-control mb-4" placeholder="repite contraseña" name="rpass" id="rpass" required>
                        <button type="submit" class="btn btn-primary mb-5" style="width:100%;">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>