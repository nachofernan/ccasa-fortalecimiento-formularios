<form action="index.php" method="POST" id="FortForm"></form>

<div class="container pt-5">
    <div class="row py-4">
        <div class="col-8 offset-1">
            <h3>DECLARACIÓN JURADA DE CONFLICTO DE INTERESES COLABORADORES CCA</h3>
        </div>
    </div>
    <hr>
    <?php if(isset($_SESSION['errores']['legajo'])) { ?>
    <div class="row">
        <div class="col-8 offset-1">
            <div class="alert alert-danger">El legajo no existe en nuestra base de datos</div>
        </div>
    </div>
    <?php }
    // var_dump($_SESSION);
    ?>

    <!-- INFORMACION PERSONAL -->
    <div class="row pb-3">
        <div class="col-8 offset-1">
            <div class="row py-4">
                <div class="col border-bottom">
                    <h4>
                        BUSCAR POR LEGAJO
                    </h4>
                </div>
            </div>
            <div class="row py-2">
                <div class="col h4">
                    Legajo
                </div>
                <div class="col">
                    <input type="number" name="legajo" id="legajo" class="form-control
                    <?php if(isset($_SESSION['errores']['legajo'])) { echo 'border border-danger'; } ?>
                    " form="FortForm" required value="<?php if(isset($_SESSION['errores']['legajo'])) { echo $_SESSION['errores']['legajo']; } ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4 pb-5 mb-5">
        <div class="col-8 offset-1">
            <div class="row small text-center">
                <div class="col-12 pb-2">
                    <button type="submit" name="buscar" form="FortForm" class="btn btn-primary btn-lg px-5">Buscar</button>
                </div>
            </div>
        </div>
    </div>
</div>