<form action="index.php" method="post" id="login"></form>

<div class="container mt-5 pt-5">
    <?php if(isset($_SESSION['errores']) && $_SESSION['errores'] == 'login') { ?>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="alert alert-danger">Error en el ingreso al sistema</div>
        </div>
    </div>  
    <?php } ?>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <div class="h3 mb-0">Ingresar al Sistema</div>
                </div>
                <div class="card-body">
                    <div class="row py-2">
                        <div class="col">
                            Documento
                        </div>
                        <div class="col">
                            <input type="text" name="documento" id="documento" class="form-control" form="login" value="" required>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col">
                            Contraseña
                        </div>
                        <div class="col">
                            <input type="password" name="password" id="password" class="form-control" form="login" required>
                        </div>
                    </div>
                    <div class="row small text-center pt-4">
                        <div class="col-12 pb-2">
                            <button type="submit" name="login" value="1" form="login" class="btn btn-primary btn-lg px-5">Ingresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
unset($_SESSION['errores']);
?>