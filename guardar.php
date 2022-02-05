<?php
/** Inicio de SESSION */
session_start();

/** Conexion a base de datos */
include_once 'db.php';
$db = new DB;

/** Chequeo básico y actualización del post */
if(!isset($_SESSION['post']) || $_POST['enviar'] != 1) {
    header('Location: index.php');
    die();
} else {
    $post = $_SESSION['post'];
}

/** Funciones Generales */

function check_isset_notnull($elemento) {
    global $errores;
    global $post;
    $return = false;
    if(isset($_SESSION['post'][$elemento]) && $_SESSION['post'][$elemento] != NULL) {
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


/** Acomodar descripciones */
$descripcion = null;

if(
    $post['confidencial'] == 'si' || 
    $post['antecedentes'] == 'si' || 
    $post['otros'] == 'si'
) {
    $descripcion = $post['descripcion'];
}


// Generar código
$codigo = crear_codigo();

 
/** Se crea el string del sql y se manda */
$query = "INSERT INTO `formularios` (`id`, `nombre`, `apellido`, `legajo`, `cuit`, `locacion`, `sector`, `internos`, `externos_1`, `externos_2`, `externos_3`, `externos_4`, `confidencial`, `antecedentes`, `otros`, `descripcion`, `fecha`, `codigo`, `validado`) 
VALUES (NULL, '$post[nombre]', '$post[apellido]', '$post[legajo]', '$post[cuit]', '$post[locacion]',  '$post[sector]', '$post[internos]', '$post[externos_1]', '$post[externos_2]', '$post[externos_3]', '$post[externos_4]', '$post[confidencial]', '$post[antecedentes]', '$post[otros]', '$descripcion', current_timestamp(), '$codigo', 'no')";

$db->insert($query);
$formulario = $db->fetch("select * from formularios where codigo = $codigo");

/** Se revisa y se cargan todos los vinculos que tenga */
if($post['internos'] == 'si') { 
    if (
        check_isset_notnull('nombre_vi1') && 
        check_isset_notnull('apellido_vi1') && 
        check_isset_notnull('locacion_vi1') && 
        check_isset_notnull('sector_vi1') && 
        check_isset_notnull('vinculo_vi1')) {
        $query = "INSERT INTO `internos` (`id`, `nombre`, `apellido`, `locacion`, `sector`, `vinculo`, `formulario_id`) 
        VALUES (NULL, 
        '$post[nombre_vi1]', 
        '$post[apellido_vi1]', 
        '$post[locacion_vi1]', 
        '$post[sector_vi1]', 
        '$post[vinculo_vi1]', 
        '$formulario[id]')";
        $db->insert($query);
    }
    if (
        check_isset_notnull('nombre_vi2') && 
        check_isset_notnull('apellido_vi2') && 
        check_isset_notnull('locacion_vi2') && 
        check_isset_notnull('sector_vi2') && 
        check_isset_notnull('vinculo_vi2')) {
        $query = "INSERT INTO `internos` (`id`, `nombre`, `apellido`, `locacion`, `sector`, `vinculo`, `formulario_id`) 
        VALUES (NULL, 
        '$post[nombre_vi2]', 
        '$post[apellido_vi2]', 
        '$post[locacion_vi2]', 
        '$post[sector_vi2]', 
        '$post[vinculo_vi2]', 
        '$formulario[id]')";
        $db->insert($query);
    }
    if (
        check_isset_notnull('nombre_vi3') && 
        check_isset_notnull('apellido_vi3') && 
        check_isset_notnull('locacion_vi3') && 
        check_isset_notnull('sector_vi3') && 
        check_isset_notnull('vinculo_vi3')) {
        $query = "INSERT INTO `internos` (`id`, `nombre`, `apellido`, `locacion`, `sector`, `vinculo`, `formulario_id`) 
        VALUES (NULL, 
        '$post[nombre_vi3]', 
        '$post[apellido_vi3]', 
        '$post[locacion_vi3]', 
        '$post[sector_vi3]', 
        '$post[vinculo_vi3]', 
        '$formulario[id]')";
        $db->insert($query);
    }
    if (
        check_isset_notnull('nombre_vi4') && 
        check_isset_notnull('apellido_vi4') && 
        check_isset_notnull('locacion_vi4') && 
        check_isset_notnull('sector_vi4') && 
        check_isset_notnull('vinculo_vi4')) {
        $query = "INSERT INTO `internos` (`id`, `nombre`, `apellido`, `locacion`, `sector`, `vinculo`, `formulario_id`) 
        VALUES (NULL, 
        '$post[nombre_vi4]', 
        '$post[apellido_vi4]', 
        '$post[locacion_vi4]', 
        '$post[sector_vi4]', 
        '$post[vinculo_vi4]', 
        '$formulario[id]')";
        $db->insert($query);
    }
    if (
        check_isset_notnull('nombre_vi5') && 
        check_isset_notnull('apellido_vi5') && 
        check_isset_notnull('locacion_vi5') && 
        check_isset_notnull('sector_vi5') && 
        check_isset_notnull('vinculo_vi5')) {
        $query = "INSERT INTO `internos` (`id`, `nombre`, `apellido`, `locacion`, `sector`, `vinculo`, `formulario_id`) 
        VALUES (NULL, 
        '$post[nombre_vi5]', 
        '$post[apellido_vi5]', 
        '$post[locacion_vi5]', 
        '$post[sector_vi5]', 
        '$post[vinculo_vi5]', 
        '$formulario[id]')";
        $db->insert($query);
    }
}

if(
    $post['externos_1'] == 'si' || 
    $post['externos_2'] == 'si' || 
    $post['externos_3'] == 'si' || 
    $post['externos_4'] == 'si') 
{ 
    if (
        check_isset_notnull('interes_ve1') && 
        check_isset_notnull('nombre_ve1') && 
        check_isset_notnull('propiedad_ve1') && 
        check_isset_notnull('vinculo_ve1') && 
        check_isset_notnull('actual_ve1')) {
        $query = "INSERT INTO `externos` (`id`, `interes`, `nombre`, `propiedad`, `vinculo`, `actual`, `formulario_id`) 
        VALUES (NULL, 
        '$post[interes_ve1]', 
        '$post[nombre_ve1]', 
        '$post[propiedad_ve1]', 
        '$post[vinculo_ve1]', 
        '$post[actual_ve1]', 
        '$formulario[id]')";
        $db->insert($query);
    }
    if (
        check_isset_notnull('interes_ve2') && 
        check_isset_notnull('nombre_ve2') && 
        check_isset_notnull('propiedad_ve2') && 
        check_isset_notnull('vinculo_ve2') && 
        check_isset_notnull('actual_ve2')) {
        $query = "INSERT INTO `externos` (`id`, `interes`, `nombre`, `propiedad`, `vinculo`, `actual`, `formulario_id`) 
        VALUES (NULL, 
        '$post[interes_ve2]', 
        '$post[nombre_ve2]', 
        '$post[propiedad_ve2]', 
        '$post[vinculo_ve2]', 
        '$post[actual_ve2]', 
        '$formulario[id]')";
        $db->insert($query);
    }
    if (
        check_isset_notnull('interes_ve3') && 
        check_isset_notnull('nombre_ve3') && 
        check_isset_notnull('propiedad_ve3') && 
        check_isset_notnull('vinculo_ve3') && 
        check_isset_notnull('actual_ve3')) {
        $query = "INSERT INTO `externos` (`id`, `interes`, `nombre`, `propiedad`, `vinculo`, `actual`, `formulario_id`) 
        VALUES (NULL, 
        '$post[interes_ve3]', 
        '$post[nombre_ve3]', 
        '$post[propiedad_ve3]', 
        '$post[vinculo_ve3]', 
        '$post[actual_ve3]', 
        '$formulario[id]')";
        $db->insert($query);
    }
    if (
        check_isset_notnull('interes_ve4') && 
        check_isset_notnull('nombre_ve4') && 
        check_isset_notnull('propiedad_ve4') && 
        check_isset_notnull('vinculo_ve4') && 
        check_isset_notnull('actual_ve4')) {
        $query = "INSERT INTO `externos` (`id`, `interes`, `nombre`, `propiedad`, `vinculo`, `actual`, `formulario_id`) 
        VALUES (NULL, 
        '$post[interes_ve4]', 
        '$post[nombre_ve4]', 
        '$post[propiedad_ve4]', 
        '$post[vinculo_ve4]', 
        '$post[actual_ve4]', 
        '$formulario[id]')";
        $db->insert($query);
    }
    if (
        check_isset_notnull('interes_ve5') && 
        check_isset_notnull('nombre_ve5') && 
        check_isset_notnull('propiedad_ve5') && 
        check_isset_notnull('vinculo_ve5') && 
        check_isset_notnull('actual_ve5')) {
        $query = "INSERT INTO `externos` (`id`, `interes`, `nombre`, `propiedad`, `vinculo`, `actual`, `formulario_id`) 
        VALUES (NULL, 
        '$post[interes_ve5]', 
        '$post[nombre_ve5]', 
        '$post[propiedad_ve5]', 
        '$post[vinculo_ve5]', 
        '$post[actual_ve5]', 
        '$formulario[id]')";
        $db->insert($query);
    }
}

?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="container">
    <div class="row py-4">
        <div class="col-8 offset-1">
            <h3>DECLARACIÓN JURADA DE CONFLICTO DE INTERESES COLABORADORES CCA</h3>
        </div>
    </div>

    <!-- Muestra del Código -->
    <div class="row mt-4">
        <div class="col-10 offset-1">
            <div class="row text-center pt-4">
                <div class="col-10 border-bottom pb-2">
                    <div class="alert alert-success">
                    El formulario quedó guardado en la base de datos.<br>Por favor, anote y guarde el siguiente código en un lugar seguro:
                            <hr>
                        <h2 class="font-weight-bold" style="letter-spacing: 10px;"><?php echo $codigo; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-4">
        <div class="col-8 offset-1">
            <p>Para que este formulario sea considerado válido, debe dirigirse a la oficina de personal que le corresponda según su lugar de trabajo. Allí le solicitarán este código para realizar la validación.</p>
            <p>En caso de perder u olvidar el código, deberá rehacer el formulario.</p>
            <p>Puede imprimir esta página, pero la idea es ahorrar papel y cuidar el medio ambiente.</p>
            <p>Puede cerrar esta página. Muchas gracias por su colaboración.</p>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<?php
//session_destroy();
?>