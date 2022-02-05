<?php
/** Inicio de SESSION */
session_start();

/** Conexion a base de datos */
include_once 'db.php';
$db = new DB;

/** Funciones Generales */
function regresar($mensaje = '') {
    if($mensaje) {
        header("Location: index.php?mensaje=" . $mensaje);
    } else {
        header("Location: index.php");
    }
    die();
}

function check_isset_notnull($elemento) {
    global $errores;
    $return = false;
    if(isset($_POST[$elemento]) && $_POST[$elemento] != NULL) {
        $return = true;
    } else {
        $errores .= " - " . $elemento;
    }
    return $return;
}

function crear_codigo() {
    global $db;
    $codigo_creado = false;
    while(!$codigo_creado) {
        $codigo = rand(111111, 999999);
        $existe = $db->count("select * from formularios where codigo = $codigo");
        if(!$existe) {
            $codigo_creado = true;
        }
    }
    return $codigo;
}

/** Inicio / Reinicio de elementos */

$errores = '';
$_SESSION = [];
if(!isset($_POST) || check_isset_notnull('vaciar')) {regresar();}
if(check_isset_notnull('previsualizar')) {
    $_SESSION['post'] = $_POST;
}

/** Comprobación de los datos enviados */
$descripcion = null;
$cambios_descripcion = null;

if(
    // revisa datos básicos
    check_isset_notnull('nombre') &&
    check_isset_notnull('apellido') &&
    check_isset_notnull('legajo') &&
    check_isset_notnull('cuit') &&
    check_isset_notnull('locacion') &&
    check_isset_notnull('sector') &&
    check_isset_notnull('internos') &&
    check_isset_notnull('externos_1') &&
    check_isset_notnull('externos_2') &&
    check_isset_notnull('externos_3') &&
    check_isset_notnull('externos_4') &&
    check_isset_notnull('confidencial') &&
    check_isset_notnull('antecedentes') &&
    check_isset_notnull('otros') 
) {
    if($_POST['internos'] == 'si') { 
        if (
            // revisa si tiene el primer interno cargado
            !check_isset_notnull('nombre_vi1') ||
            !check_isset_notnull('apellido_vi1') ||
            !check_isset_notnull('locacion_vi1') ||
            !check_isset_notnull('sector_vi1') ||
            !check_isset_notnull('vinculo_vi1')
        ) {
            regresar('Faltan datos del Vínculo Interno');
        }
    }
    if(
        $_POST['externos_1'] == 'si' || 
        $_POST['externos_2'] == 'si' || 
        $_POST['externos_3'] == 'si' || 
        $_POST['externos_4'] == 'si'
    ) { 
        if (
            // revisa si tiene el primer externo cargado
            !check_isset_notnull('interes_ve1') ||
            !check_isset_notnull('nombre_ve1') ||
            !check_isset_notnull('propiedad_ve1') ||
            !check_isset_notnull('vinculo_ve1') ||
            !check_isset_notnull('actual_ve1')
        ) {
            regresar('Faltan datos de los Vínculos Externos');
        }
    }
    if(
        $_POST['confidencial'] == 'si' || 
        $_POST['antecedentes'] == 'si' || 
        $_POST['otros'] == 'si'
    ) { 
        if (
            // revisa si está la descripcion
            !check_isset_notnull('descripcion')
        ) {
            regresar('Falta una descipción para los puntos IV, V o VI en conflicto');
        }
        $descripcion = $_POST['descripcion'];
    }

} else {
    regresar('Faltan datos elementales. ¡¡ERROR EN EL ENVÍO!!');
}

/**
 * Si llegaste hasta acá significa que se hizo todo el formulario correctamente. 
 * Después le agregamos algunas boludeces para terminar de hacerlo lindo y proyectable.
 * Y si se puede algo más de documentación.
*/
?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<div class="container">
    <div class="row py-4">
        <div class="col-8 offset-1">
            <h3>DECLARACIÓN JURADA DE CONFLICTO DE INTERESES COLABORADORES CCA</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-1 text-center">
            <div class="alert alert-primary alert-lg">Usted ha completado el Formulario correctamente.<br>Por favor, chequee que los datos ingresados son correctos.</div>
            <p class="text-muted small">Si desea corregir, haga click en el botón <strong>"Volver"</strong>, de lo contrario en el botón <strong>"Enviar Formulario"</strong>.</p>
        </div>
    </div>
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
                Nombre
            </div>
            <div class="col">
                <input type="text" name="nombre" id="nombre" class="form-control disabled" disabled required value="<?php echo $_SESSION['post']['nombre']; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
                Apellido
            </div>
            <div class="col">
                <input type="text" name="apellido" id="apellido" class="form-control" disabled required value="<?php echo $_SESSION['post']['apellido']; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
                Legajo
            </div>
            <div class="col">
                <input type="text" name="legajo" id="legajo" class="form-control" disabled required value="<?php echo $_SESSION['post']['legajo']; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
                CUIT
            </div>
            <div class="col">
                <input type="text" name="cuit" id="cuit" class="form-control" disabled required value="<?php echo $_SESSION['post']['cuit']; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
            Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small>
            </div>
            <div class="col">
                <input type="text" name="locacion" id="locacion" class="form-control" disabled required value="<?php echo $_SESSION['post']['locacion']; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col">
            Gerencia/Área/Sector
            </div>
            <div class="col">
                <input type="text" name="sector" id="sector" class="form-control" disabled required value="<?php echo $_SESSION['post']['sector']; ?>">
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
                <strong><?php echo ($_SESSION['post']['internos'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-8 small">
                <p>Son definidos como familiares directos a familiares con vínculo de consanguinidad en línea recta o colateral hasta el segundo grado inclusive (hijos, padres, nietos abuelos y hermanos) y por afinidad hasta el segundo grado (esposa/esposo, concubina/concubino, suegro/suegra, yerno/nuera, abuelos políticos y/o cuñados)</p>
            </div>
        </div>
        <div class="row">
            <div class="col small font-weight-bold pb-2">
            Si la respuesta es SI, por favor complete el siguiente cuadro con los datos de la/s persona/s con quien tenga vínculo
            </div>
        </div>
        <?php if($_SESSION['post']['internos'] == 'si' && check_isset_notnull('nombre_vi1') && check_isset_notnull('apellido_vi1') && check_isset_notnull('locacion_vi1') && check_isset_notnull('sector_vi1') && check_isset_notnull('vinculo_vi1')) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Nombre</div>
                    <div class="col"><input type="text" name="nombre_vi1" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_vi1']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Apellido</div>
                    <div class="col"><input type="text" name="apellido_vi1" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['apellido_vi1']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small></div>
                    <div class="col"><input type="text" name="locacion_vi1" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['locacion_vi1']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Gerencia/Área/Sector</div>
                    <div class="col"><input type="text" name="sector_vi1" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['sector_vi1']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_vi1" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_vi1']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($_SESSION['post']['internos'] == 'si' && check_isset_notnull('nombre_vi2') && check_isset_notnull('apellido_vi2') && check_isset_notnull('locacion_vi2') && check_isset_notnull('sector_vi2') && check_isset_notnull('vinculo_vi2')) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Nombre</div>
                    <div class="col"><input type="text" name="nombre_vi2" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_vi2']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Apellido</div>
                    <div class="col"><input type="text" name="apellido_vi2" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['apellido_vi2']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small></div>
                    <div class="col"><input type="text" name="locacion_vi2" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['locacion_vi2']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Gerencia/Área/Sector</div>
                    <div class="col"><input type="text" name="sector_vi2" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['sector_vi2']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_vi2" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_vi2']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($_SESSION['post']['internos'] == 'si' && check_isset_notnull('nombre_vi3') && check_isset_notnull('apellido_vi3') && check_isset_notnull('locacion_vi3') && check_isset_notnull('sector_vi3') && check_isset_notnull('vinculo_vi3')) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Nombre</div>
                    <div class="col"><input type="text" name="nombre_vi3" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_vi3']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Apellido</div>
                    <div class="col"><input type="text" name="apellido_vi3" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['apellido_vi3']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small></div>
                    <div class="col"><input type="text" name="locacion_vi3" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['locacion_vi3']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Gerencia/Área/Sector</div>
                    <div class="col"><input type="text" name="sector_vi3" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['sector_vi3']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_vi3" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_vi3']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($_SESSION['post']['internos'] == 'si' && check_isset_notnull('nombre_vi4') && check_isset_notnull('apellido_vi4') && check_isset_notnull('locacion_vi4') && check_isset_notnull('sector_vi4') && check_isset_notnull('vinculo_vi4')) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Nombre</div>
                    <div class="col"><input type="text" name="nombre_vi4" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_vi4']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Apellido</div>
                    <div class="col"><input type="text" name="apellido_vi4" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['apellido_vi4']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small></div>
                    <div class="col"><input type="text" name="locacion_vi4" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['locacion_vi4']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Gerencia/Área/Sector</div>
                    <div class="col"><input type="text" name="sector_vi4" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['sector_vi4']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_vi4" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_vi4']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($_SESSION['post']['internos'] == 'si' && check_isset_notnull('nombre_vi5') && check_isset_notnull('apellido_vi5') && check_isset_notnull('locacion_vi5') && check_isset_notnull('sector_vi5') && check_isset_notnull('vinculo_vi5')) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Nombre</div>
                    <div class="col"><input type="text" name="nombre_vi5" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_vi5']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Apellido</div>
                    <div class="col"><input type="text" name="apellido_vi5" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['apellido_vi5']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small></div>
                    <div class="col"><input type="text" name="locacion_vi5" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['locacion_vi5']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Gerencia/Área/Sector</div>
                    <div class="col"><input type="text" name="sector_vi5" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['sector_vi5']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_vi5" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_vi5']; ?>"></div>
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
                <strong><?php echo ($_SESSION['post']['externos_1'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2 border-bottom">
            ¿Tiene usted familiares directos desempeñando actividades laborales en empresas de proveedores, contratistas, subcontratistas o en entes reguladores públicos que interactúen en ejercicio de sus funciones con CCA?
            </div>
            <div class="col-2">
                <strong><?php echo ($_SESSION['post']['externos_2'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2 border-bottom">
            ¿Usted ha trabajado en los últimos tres años o ha tenido algún tipo de relación profesional con alguna persona humana o jurídica que sea proveedor, contratista, subcontratista o tercera parte vinculada a CCA o que represente a este tipo de personas?
            </div>
            <div class="col-2">
                <strong><?php echo ($_SESSION['post']['externos_3'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col pb-2 border-bottom">
            ¿Es usted miembro de algún directorio, consejo de administración u otro órgano societario o social diferente de CCA?
            </div>
            <div class="col-2">
                <strong><?php echo ($_SESSION['post']['externos_4'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
        <div class="row">
            <div class="col small font-weight-bold py-4">
            Si la respuesta fue SI a alguna de las preguntas anteriores, debe completar la siguiente información
            </div>
        </div>
        <?php if(($_SESSION['post']['externos_1'] == 'si' || $_SESSION['post']['externos_2'] == 'si' ||  $_SESSION['post']['externos_3'] == 'si' ||  $_SESSION['post']['externos_4'] == 'si') && (check_isset_notnull('interes_ve1') && check_isset_notnull('nombre_ve1') && check_isset_notnull('propiedad_ve1') && check_isset_notnull('vinculo_ve1') && check_isset_notnull('actual_ve1'))) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Tipo de Interés</div>
                    <div class="col"><input type="text" name="interes_ve1" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['interes_ve1']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Nombre y Apellido o Razón Social</div>
                    <div class="col"><input type="text" name="nombre_ve1" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_ve1']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Propiedad</div>
                    <div class="col"><input type="text" name="propiedad_ve1" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['propiedad_ve1']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_ve1" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_ve1']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">¿Se trata de un interés actual?</div>
                    <div class="col"><input type="text" name="actual_ve1" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['actual_ve1']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(($_SESSION['post']['externos_1'] == 'si' || $_SESSION['post']['externos_2'] == 'si' ||  $_SESSION['post']['externos_3'] == 'si' ||  $_SESSION['post']['externos_4'] == 'si') && (check_isset_notnull('interes_ve2') && check_isset_notnull('nombre_ve2') && check_isset_notnull('propiedad_ve2') && check_isset_notnull('vinculo_ve2') && check_isset_notnull('actual_ve2'))) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Tipo de Interés</div>
                    <div class="col"><input type="text" name="interes_ve2" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['interes_ve2']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Nombre y Apellido o Razón Social</div>
                    <div class="col"><input type="text" name="nombre_ve2" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_ve2']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Propiedad</div>
                    <div class="col"><input type="text" name="propiedad_ve2" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['propiedad_ve2']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_ve2" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_ve2']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">¿Se trata de un interés actual?</div>
                    <div class="col"><input type="text" name="actual_ve2" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['actual_ve2']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(($_SESSION['post']['externos_1'] == 'si' || $_SESSION['post']['externos_2'] == 'si' ||  $_SESSION['post']['externos_3'] == 'si' ||  $_SESSION['post']['externos_4'] == 'si') && (check_isset_notnull('interes_ve3') && check_isset_notnull('nombre_ve3') && check_isset_notnull('propiedad_ve3') && check_isset_notnull('vinculo_ve3') && check_isset_notnull('actual_ve3'))) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Tipo de Interés</div>
                    <div class="col"><input type="text" name="interes_ve3" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['interes_ve3']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Nombre y Apellido o Razón Social</div>
                    <div class="col"><input type="text" name="nombre_ve3" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_ve3']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Propiedad</div>
                    <div class="col"><input type="text" name="propiedad_ve3" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['propiedad_ve3']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_ve3" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_ve3']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">¿Se trata de un interés actual?</div>
                    <div class="col"><input type="text" name="actual_ve3" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['actual_ve3']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(($_SESSION['post']['externos_1'] == 'si' || $_SESSION['post']['externos_2'] == 'si' ||  $_SESSION['post']['externos_3'] == 'si' ||  $_SESSION['post']['externos_4'] == 'si') && (check_isset_notnull('interes_ve4') && check_isset_notnull('nombre_ve4') && check_isset_notnull('propiedad_ve4') && check_isset_notnull('vinculo_ve4') && check_isset_notnull('actual_ve4'))) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Tipo de Interés</div>
                    <div class="col"><input type="text" name="interes_ve4" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['interes_ve4']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Nombre y Apellido o Razón Social</div>
                    <div class="col"><input type="text" name="nombre_ve4" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_ve4']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Propiedad</div>
                    <div class="col"><input type="text" name="propiedad_ve4" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['propiedad_ve4']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_ve4" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_ve4']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">¿Se trata de un interés actual?</div>
                    <div class="col"><input type="text" name="actual_ve4" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['actual_ve4']; ?>"></div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if(($_SESSION['post']['externos_1'] == 'si' || $_SESSION['post']['externos_2'] == 'si' ||  $_SESSION['post']['externos_3'] == 'si' ||  $_SESSION['post']['externos_4'] == 'si') && (check_isset_notnull('interes_ve5') && check_isset_notnull('nombre_ve5') && check_isset_notnull('propiedad_ve5') && check_isset_notnull('vinculo_ve5') && check_isset_notnull('actual_ve5'))) { ?>
        <div class="row small pt-2">
            <div class="col-10 offset-1 border-bottom pb-2">
                <div class="row py-1">
                    <div class="col">Tipo de Interés</div>
                    <div class="col"><input type="text" name="interes_ve5" id="nombre" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['interes_ve5']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Nombre y Apellido o Razón Social</div>
                    <div class="col"><input type="text" name="nombre_ve5" id="apellido" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['nombre_ve5']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Propiedad</div>
                    <div class="col"><input type="text" name="propiedad_ve5" id="locacion" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['propiedad_ve5']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">Tipo de Vínculo</div>
                    <div class="col"><input type="text" name="vinculo_ve5" id="sector" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['vinculo_ve5']; ?>"></div>
                </div>
                <div class="row py-1">
                    <div class="col">¿Se trata de un interés actual?</div>
                    <div class="col"><input type="text" name="actual_ve5" id="vinculo" class="form-control form-control-sm" disabled value="<?php echo $_SESSION['post']['actual_ve5']; ?>"></div>
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
                <strong><?php echo ($_SESSION['post']['confidencial'] == 'si') ? 'SI' : 'NO'; ?></strong>
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
                <strong><?php echo ($_SESSION['post']['antecedentes'] == 'si') ? 'SI' : 'NO'; ?></strong>
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
                <strong><?php echo ($_SESSION['post']['otros'] == 'si') ? 'SI' : 'NO'; ?></strong>
            </div>
        </div>
    </div>
</div>

<!-- Descripcion -->
<div class="row mt-4 border-bottom pb-3">
    <div class="col-10 offset-1">
        <div class="row">
            <div class="col small font-weight-bold">
                Si respondió SI a alguna de las preguntas en los puntos IV, V o VI, por favor brinde información detallada:
            </div>
        </div>
        <?php if($_SESSION['post']['confidencial'] == 'si' || $_SESSION['post']['antecedentes'] == 'si' || $_SESSION['post']['otros'] == 'si') { ?>
        <div class="row small pt-4">
            <div class="col-10 pb-2">
                <textarea name="descripcion" id="descripcion" rows="8" class="form-control" disabled><?php if(isset($_SESSION['post']['descripcion'])){echo $_SESSION['post']['descripcion'];} ?></textarea>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- Declaración final -->
<div class="row">
    <div class="col-8 offset-1 pt-4">
        <p>Declaro que la información proporcionada en el presente formulario es cierta y que no tengo conocimiento de ninguna otra circunstancia que constituya un conflicto de interés acorde a lo establecido en la normativa vigente y las políticas de CCA. Me comprometo a informar de cualquier cambio en lo anterior, completando un nuevo formulario y enviándolo nuevamente a la Coordinación General de Recursos Humanos.</p>
    </div>
</div>

<!-- Enviar Formulario -->
<div class="row mt-4 pb-5 mb-5">
    <div class="col-10 offset-1">
        <div class="row small text-center pt-4">
            <div class="col-10 border-bottom pb-2">
                <form action="guardar.php" method="post" id="form_send"></form>
                <a href="index.php" class="btn btn-secondary btn-lg px-5 mr-5">Volver</a>
                <button type="submit" name="enviar" value="1" form="form_send" class="btn btn-success btn-lg px-5">Enviar Formulario</button>
            </div>
        </div>
    </div>
</div>