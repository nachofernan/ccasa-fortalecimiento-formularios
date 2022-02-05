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
      <li class="nav-item">
        <a class="nav-link" href="buscador.php">Buscador</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="listado.php">Listado <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>

<div class="container py-5 mt-4">
    <div class="row py-4">
        <div class="col">
            <h2>Listado de Personal</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Legajo</th>
                        <th>DDJJ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($db->fetchAll("Select * FROM personal") as $personal) {
                        $dj = $db->count("Select * from formularios where legajo = '$personal[legajo]' AND validado = 'si'");
                    ?>
                    <tr>
                        <td><?php echo $personal['id']; ?></td>
                        <td><a href="personal.php?id=<?php echo $personal['id']; ?>"><?php echo $personal['nombre']; ?></a></td>
                        <td><?php echo $personal['apellido']; ?></td>
                        <td><?php echo $personal['legajo']; ?></td>
                        <td><?php echo $dj > 0 ? "Si" : "No"; ?></td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>