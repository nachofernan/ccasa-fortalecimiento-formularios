<?php
/** Inicio de SESSION */
session_start();

/** ANALISIS DE ADMIN */
if(!isset($_SESSION['admin']['activado']) || $_SESSION['admin']['activado'] == false) {
    session_destroy();
    header("Location: index.php");
    die();
} else {
    $usuario = $_SESSION['admin']['db'];
}

/** Conexion a base de datos */
include_once 'app/db.php';
$db = new DB;

/** Funciones Generales */
function regresar($mensaje = '', $color = 'danger') {
    if($mensaje) {
        header("Location: index.php?accion=buscar&mensaje=" . $mensaje . "&color=" . $color);
    } else {
        header("Location: index.php?accion=buscar");
    }
    die();
}

/** Revisar el POST */
if(!isset($_POST['formulario_id'])) {
    regresar('Error en el post');
}

$formulario = $db->fetch("select * from formularios where id = '$_POST[formulario_id]'");
if(!isset($formulario['id'])) {
    regresar('Error en la búsqueda del formulario');
}

if($formulario['validado'] == 'si') {
    regresar('El formulario ya está validado');
}

if(
    $db->update("update formularios set validado = 'si' where id = $formulario[id]")
    &&
    $db->insert("insert into formularios_validaciones (id, user_id, formulario_id, fecha) values (null, $usuario[id], $formulario[id], CURRENT_TIMESTAMP)")
) {
    regresar('El formulario se validó satisfactoriamente', 'success');
}

?>