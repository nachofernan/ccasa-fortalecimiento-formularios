<form action="index.php?accion=buscar" method="post" id="validaciones"></form>

<div class="container my-5 pt-5">
    <?php if(isset($_GET['mensaje'])) { ?>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="alert alert-<?php echo $_GET['color']; ?>"><?php echo $_GET['mensaje']; ?></div>
        </div>
    </div>
    <?php } ?>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    <div class="h3 mb-0">Buscador de DDJJ</div>
                </div>
                <div class="card-body">
                    <div class="row py-2">
                        <div class="col">
                            LEGAJO
                        </div>
                        <div class="col">
                            <input type="text" name="legajo" id="legajo" class="form-control" form="validaciones" value="<?php echo isset($_POST['legajo']) ? $_POST['legajo'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col">
                            CODIGO
                        </div>
                        <div class="col">
                            <input type="text" name="codigo" id="codigo" class="form-control" form="validaciones" value="<?php echo isset($_POST['codigo']) ? $_POST['codigo'] : '' ?>" required>
                        </div>
                    </div>
                    <div class="row small text-center pt-4">
                        <div class="col-12 pb-2">
                            <button type="submit" name="previsualizar" value="1" form="validaciones" class="btn btn-primary btn-lg px-5">BUSCAR</button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $mensaje = "";
            $color = "";

            if(
                (isset($_POST['legajo']) && $_POST['legajo'] != NULL) 
                &&
                (isset($_POST['codigo']) && $_POST['codigo'] != NULL)
            ){
                $formulario = $db->fetch("select * from formularios where legajo = '$_POST[legajo]' AND codigo = '$_POST[codigo]'");
            ?>
            <div class="card mt-4">
                <div class="card-body">
                    <?php if($formulario && ($formulario['validado'] == 'no')) { ?>
                        <div class="alert alert-success">
                            <div class="row">
                                <div class="col-10">Formulario presentado correctamente</div>
                                <div class="col text-right">
                                    <a type="button" data-toggle="modal" data-target="#validacionModal">
                                        Validar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="validacionModal" tabindex="-1" role="dialog" aria-labelledby="validacionModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="validacionModalLabel">Validación</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="validacion.php" method="post" id="validarFormulario">
                                        <input type="hidden" name="formulario_id" value="<?php echo $formulario['id']; ?>">
                                    </form>
                                    <div class="modal-body">
                                        <p>Se va a validar el formulario de:</p>
                                        <p><strong><?php echo $formulario['nombre_apellido']; ?></strong> <span class="text-muted small">(Legajo: <?php echo $formulario['legajo']; ?>)</span></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" form="validarFormulario">Validar Formulario</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group small">
                            <li class="list-group-item"><strong>Nombre y apellido: </strong><?php echo $formulario['nombre_apellido']; ?></li>
                            <li class="list-group-item"><strong>Legajo: </strong><?php echo $formulario['legajo']; ?></li>
                            <li class="list-group-item"><strong>Documento: </strong><?php echo $formulario['documento']; ?></li>
                            <li class="list-group-item"><strong>Lugar de Trabajo: </strong><?php echo $formulario['locacion']; ?></li>
                            <li class="list-group-item"><strong>Gerencia/Área/Sector: </strong><?php echo $formulario['sector']; ?></li>
                        </ul>
                    <?php } elseif($formulario && ($formulario['validado'] == 'si')) { 
                        $validacion = $db->fetch("select * from formularios_validaciones where formulario_id = $formulario[id]");
                        $user = $db->fetch("select * from users where id = $validacion[user_id]");
                    ?>
                        <div class="alert alert-info">El formulario ya está validado por: <strong><?php echo $user['username']; ?></strong></div>
                    <?php } else { ?>
                        <div class="alert alert-warning">El formulario no existe</div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>