<?php
/** Inicio de SESSION */
session_start();

/** Conexion a base de datos */
include_once 'db.php';
$db = new DB;

?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <div class="navbar-brand">Formularios DDJJ</div>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Crear Formulario</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="buscador.php">Buscador <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listado.php">Listado</a>
      </li>
    </ul>
  </div>
</nav>

<form action="buscador.php" method="post" id="validaciones"></form>

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
                                    <div class="modal-body">
                                        <p>Se va a validar el formulario de:</p>
                                        <p><strong><?php echo $formulario['nombre']; ?> <?php echo $formulario['apellido']; ?></strong> <span class="text-muted small">(Legajo: <?php echo $formulario['legajo']; ?>)</span></p>
                                        <form action="validacion.php" method="post" id="validarFormulario">
                                            <input type="hidden" name="formulario_id" value="<?php echo $formulario['id']; ?>">
                                        </form>
                                        <hr>
                                        <div class="form-group">
                                            <label for="username">Usuario: </label>
                                            <input type="text" name="username" form="validarFormulario" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Contraseña: </label>
                                            <input type="password" name="password" form="validarFormulario" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" form="validarFormulario">Validar Formulario</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group small">
                            <li class="list-group-item"><strong>Nombre: </strong><?php echo $formulario['nombre']; ?></li>
                            <li class="list-group-item"><strong>Apellido: </strong><?php echo $formulario['apellido']; ?></li>
                            <li class="list-group-item"><strong>Legajo: </strong><?php echo $formulario['legajo']; ?></li>
                            <li class="list-group-item"><strong>CUIT: </strong><?php echo $formulario['cuit']; ?></li>
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