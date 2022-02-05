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
                        <th>Nombre y Apellido</th>
                        <th>Legajo</th>
                        <th>Documento</th>
                        <th>Lugar de Trabajo</th>
                        <th>¿Presentó DJ?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($db->fetchAll("Select * FROM personal_ccasa") as $personal) {
                        $dj = $db->count("Select * from formularios where legajo = '$personal[legajo]' AND validado = 'si'");
                    ?>
                    <tr>
                        <td><a href="index.php?accion=personal&id=<?php echo $personal['id']; ?>"><?php echo $personal['nombre_apellido']; ?></td>
                        <td><?php echo $personal['legajo']; ?></td>
                        <td><?php echo $personal['documento']; ?></td>
                        <td><?php echo $personal['locacion']; ?></td>
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