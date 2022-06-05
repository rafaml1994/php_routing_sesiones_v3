<div class="container">

    <div class="container vh-100" style=" background-color:#FFFFFF;">
        <h1 class=" text-center pt-2">Bienvenido <?php echo ucfirst($_SESSION['nombre']) ?>!</h1>
        <h3 class="text-center">¡En esta app vas a poder ver tus grupos de una manera muy rápida!</h3>
        <div class=" m-0 row justify-content-center" style="justify-content: space-between">
            <div id="card" class="col-sm-5 m-0 row justify-content-center">
                <div class="card shadow p-3 mb-5 mt-5 bg-body rounded principal" style="width: 18rem; ">
                    <img src="https://3.bp.blogspot.com/-JjQR1wGfCLM/V8dV2vTzVjI/AAAAAAAAdMY/RVfq9KktUR07dNrRKeA3yNs7nvWGKbMBgCLcB/s1600/aula%2Binformatica.png" alt="alumnos" class="card-img-top">
                    <div class="card-body">
                        <h4 class="card-title">Visualizar mi grupo de trabajo</h4>
                        <p class="card-text mb-5">Aquí puedes ver a que grupo de trabajo perteneces, sencillo y rápido. ¿No crees?</p>
                        <a href="index.php?controller=alumno&action=show" class="btn btn-primary">Visualizar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-5 m-0 row justify-content-center rounded">
                <div class="video" style="margin-top: 20%;">
                    <video src="assets/videos/video.mp4" autoplay loop muted class="fillWidth visible-lg">
                        <source type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>
</div>