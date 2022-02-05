<?php
$personal = $db->fetch("Select * from personal_ccasa where id = $_GET[id]");
?>

<div class="container py-5 mt-4">
    <div class="row py-4">
        <div class="col">
            <h4>Listado de Formularios presentados por: <h2><?php echo $personal['nombre_apellido']; ?></h2></h4>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Vínculos Internos</th>
                        <th>Vínculos Externos (1)</th>
                        <th>Vínculos Externos (2)</th>
                        <th>Vínculos Externos (3)</th>
                        <th>Vínculos Externos (4)</th>
                        <th>Confidencial</th>
                        <th>Antecedentes</th>
                        <th>Otros</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($db->fetchAll("Select * from formularios where legajo = '$personal[legajo]' AND validado = 'si' order by fecha desc") as $formulario) {
                        $dj = $db->count("Select * from formularios where legajo = '$personal[legajo]' AND validado = 'si'");
                    ?>
                    <tr>
                        <td>
                            <a href="index.php?accion=personal&id=<?php echo $personal['id']; ?>&formulario=<?php echo $formulario['id']; ?>">
                            <?php echo date("d/m/Y", strtotime($formulario['fecha'])); ?>
                            </a>
                        </td>
                        <td><?php echo $formulario['internos']; ?></td>
                        <td><?php echo $formulario['externos_1']; ?></td>
                        <td><?php echo $formulario['externos_2']; ?></td>
                        <td><?php echo $formulario['externos_3']; ?></td>
                        <td><?php echo $formulario['externos_4']; ?></td>
                        <td><?php echo $formulario['confidencial']; ?></td>
                        <td><?php echo $formulario['antecedentes']; ?></td>
                        <td><?php echo $formulario['otros']; ?></td>
                    </tr>
                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>