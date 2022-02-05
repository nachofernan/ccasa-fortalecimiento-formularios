<?php
/** Inicio de SESSION */
session_start();

/** Conexion a base de datos */
include_once 'db.php';
$db = new DB;

/** Funciones Generales */
function regresar($mensaje = '', $color = 'danger') {
    if($mensaje) {
        header("Location: buscador.php?mensaje=" . $mensaje . "&color=" . $color);
    } else {
        header("Location: buscador.php");
    }
    die();
}

/** Revisar el POST */
if(!isset($_POST['formulario_id']) || !isset($_POST['username']) || !isset($_POST['password'])) {
    regresar('Error en la carga del usuario y contraseña');
}

$username = strtolower($_POST['username']);
$password = md5($_POST['password']);

$usuario = $db->fetch("select * from users where username = '$username' and password = '$password'");

if(!isset($usuario['id'])) {
    regresar('Error en la búsqueda del usuario');
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