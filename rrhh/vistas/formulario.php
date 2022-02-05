<?php 
    $personal = $db->fetch("Select * from personal_ccasa where id = $_GET[id]");
    $formulario = $db->fetch("Select * from formularios where id = $_GET[formulario]");
?>

<div class="container my-4 py-4">
    <div class="row py-4">
        <div class="col-8 offset-1">
            <h3>DECLARACIÓN JURADA DE CONFLICTO DE INTERESES COLABORADORES CCA</h3>
        </div>
    </div>
    <a href="index.php?accion=personal&id=<?php echo $personal['id']; ?>" class="btn btn-secondary btn-sm px-5 mr-3">Volver</a>
    <?php
    $validacion = $db->fetch("select * from formularios_validaciones where formulario_id = $formulario[id]");
    $user = $db->fetch("select * from users where id = $validacion[user_id]");
    ?>
    Presentación: <strong><?php echo date("d/m/Y", strtotime($formulario['fecha'])); ?> </strong> |
    Validación: <strong><?php echo date("d/m/Y", strtotime($validacion['fecha'])); ?> </strong> |
    Por: <strong><?php echo $user['username']; ?></strong>
    <hr>

<!-- INFORMACION PERSONAL -->
<div class="row border-bottom pb-3">
    <div class="col-8 offset-1">
        <div class="row py-4">
            <div class="col border-bottom">
                <h4>
                    I - Información Personal
                </h4>
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
                Nombre y Apellido
            </div>
            <div class="col">
                <input type="text" name="nombre_apellido" id="nombre_apellido" class="form-control" disabled required value="<?php echo $formulario['nombre_apellido']; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
                Legajo
            </div>
            <div class="col">
                <input type="text" name="legajo" id="legajo" class="form-control" disabled required value="<?php echo $formulario['legajo']; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
                Documento
            </div>
            <div class="col">
                <input type="text" name="documento" id="documento" class="form-control" disabled required value="<?php echo $formulario['documento']; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
            Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small>
            </div>
            <div class="col">
                <input type="text" name="locacion" id="locacion" class="form-control" disabled required value="<?php echo $formulario['locacion']; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
            Gerencia/Área/Sector
            </div>
            <div class="col">
                <input type="text" name="sector" id="sector" class="form-control" disabled required value="<?php echo $formulario['sector']; ?>">
            </div>
        </div>
    </div>
</div>

<!-- Vínculos Laborales Internos -->
<div class="row border-bottom pb-3">
    <div class="col-8 offset-1">
        <div class="row py-4">
            <div class="col border-bottom">
                <h4>
                    II - Vínculos laborales internos
                </h4>
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
                ¿Tiene usted familiares directos trabajando en CCA? 
            </div>
            <div class="col-2">
                <strong><?php echo ($formulario['internos'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-8 small">
                <p>Son definidos como familiares directos a familiares con vínculo de consanguinidad en línea recta o colateral hasta el segundo grado inclusive (hijos, padres, nietos abuelos y hermanos) y por afinidad hasta el segundo grado (esposa/esposo, concubina/concubino, suegro/suegra, yerno/nuera, abuelos políticos y/o cuñados)</p>
            </div>
        </div>
        <?php if($formulario['internos'] == 'si') { ?>
        <div class="row">
            <div class="col small font-weight-bold pb-2">
            Si la respuesta es SI, por favor complete el siguiente cuadro con los datos de la/s persona/s con quien tenga vínculo
            </div>
        </div>
        <?php } ?>
        <?php foreach($db->fetchAll("Select * from internos where formulario_id = $formulario[id]") as $interno) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Nombre</div>
                    <div class="col"><input type="text" name="nombre_vi1" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $interno['nombre']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Apellido</div>
                    <div class="col"><input type="text" name="apellido_vi1" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $interno['apellido']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small></div>
                    <div class="col"><input type="text" name="locacion_vi1" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $interno['locacion']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Gerencia/Área/Sector</div>
                    <div class="col"><input type="text" name="sector_vi1" id="sector" class="form-control form-control-sm" disabled value="<?php echo $interno['sector']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_vi1" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $interno['vinculo']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Vínculos Externos -->
<div class="row border-bottom pb-3">
    <div class="col-8 offset-1">
        <div class="row py-4">
            <div class="col border-bottom">
                <h4>
                    III - Vínculos externos
                </h4>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2 border-bottom">
            ¿Usted o alguien de su familia tiene algún interés económico, financiero, de propiedad o de algún otro tipo, en una persona humana o jurídica proveedora, contratista o tercera parte que se encuentre vinculada al ámbito de las actividades de CCA pudiendo constituir un conflicto de intereses, ya sea real, potencial o aparente? 
            </div>
            <div class="col-2">
                <strong><?php echo ($formulario['externos_1'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2 border-bottom">
            ¿Tiene usted familiares directos desempeñando actividades laborales en empresas de proveedores, contratistas, subcontratistas o en entes reguladores públicos que interactúen en ejercicio de sus funciones con CCA?
            </div>
            <div class="col-2">
                <strong><?php echo ($formulario['externos_2'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2 border-bottom">
            ¿Usted ha trabajado en los últimos tres años o ha tenido algún tipo de relación profesional con alguna persona humana o jurídica que sea proveedor, contratista, subcontratista o tercera parte vinculada a CCA o que represente a este tipo de personas?
            </div>
            <div class="col-2">
                <strong><?php echo ($formulario['externos_3'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2 border-bottom">
            ¿Es usted miembro de algún directorio, consejo de administración u otro órgano societario o social diferente de CCA?
            </div>
            <div class="col-2">
                <strong><?php echo ($formulario['externos_4'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <?php if($formulario['externos_1'] == 'si' || $formulario['externos_2'] == 'si' || $formulario['externos_3'] == 'si' || $formulario['externos_4'] == 'si' ) { ?>
        <div class="row">
            <div class="col small font-weight-bold py-4">
            Si la respuesta fue SI a alguna de las preguntas anteriores, debe completar la siguiente información
            </div>
        </div>
        <?php } ?>
        <?php foreach($db->fetchAll("Select * from externos where formulario_id = $formulario[id]") as $externo) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Tipo de Interés</div>
                    <div class="col"><input type="text" name="interes_ve1" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $externo['interes']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Nombre y Apellido o Razón Social</div>
                    <div class="col"><input type="text" name="nombre_ve1" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $externo['nombre']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Propiedad</div>
                    <div class="col"><input type="text" name="propiedad_ve1" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $externo['propiedad']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_ve1" id="sector" class="form-control form-control-sm" disabled value="<?php echo $externo['vinculo']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">¿Se trata de un interés actual?</div>
                    <div class="col"><input type="text" name="actual_ve1" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $externo['actual']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Información Confidencial -->
<div class="row border-bottom pb-3">
    <div class="col-8 offset-1">
        <div class="row py-4">
            <div class="col border-bottom">
                <h4>
                    IV - Información Confidencial
                </h4>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2">
                ¿Ha revelado usted de manera consciente cualquier tipo de información confidencial acerca de CCA a personas ajenas a la Empresa?
            </div>
            <div class="col-2">
                <strong><?php echo ($formulario['confidencial'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
    </div>
</div>

<!-- Registro de Antecedentes -->
<div class="row border-bottom pb-3">
    <div class="col-8 offset-1">
        <div class="row py-4">
            <div class="col border-bottom">
                <h4>
                    V - Registro de Antecedentes
                </h4>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2">
                ¿Ha sido usted personalmente objeto de una auditoría, investigación, proceso judicial o actividad similar por motivos o hechos de corrupción?
            </div>
            <div class="col-2">
                <strong><?php echo ($formulario['antecedentes'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
    </div>
</div>

<!-- Otros -->
<div class="row border-bottom pb-3">
    <div class="col-8 offset-1">
        <div class="row py-4">
            <div class="col border-bottom">
                <h4>
                    VI - Otros
                </h4>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2">
                ¿Existe alguna otra circunstancia que pueda afectar o que pueda percibirse que afecta su objetividad e independencia en el desempeño de sus funciones en CCA?
            </div>
            <div class="col-2">
                <strong><?php echo ($formulario['otros'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
    </div>
</div>

<!-- Descripcion -->
<div class="row mt-4 border-bottom pb-5 mb-5">
    <div class="col-10 offset-1">
        <?php if($formulario['descripcion'] != '') { ?>
        <div class="row">
            <div class="col small font-weight-bold">
                Si respondió SI a alguna de las preguntas en los puntos IV, V o VI, por favor brinde información detallada:
            </div>
        </div>
        <div class="row small pt-4">
            <div class="col-10 pb-2">
                <textarea name="descripcion" id="descripcion" rows="8" class="form-control" disabled><?php if(isset($_SESSION['post']['descripcion'])){echo $_SESSION['post']['descripcion'];} ?></textarea>
            </div>
        </div>
        <?php } ?>
    </div>
</div>