<?php
/* session_start();
session_destroy(); */
session_start();
include('app/db.php');
$db = new DB();

/* Se cargan las funciones */
include('app/funciones.php');
include('app/admin.php');

/* En el estado de la Session se analiza qué controlador tiene que actuar */
if(!isset($_SESSION['estado'])) { $_SESSION['estado'] = 0; }

/**
 * Obligar el $_GET['accion']
 */
if(!isset($_GET['accion'])) {
    header('Location: index.php?accion=buscar');
    die();
}

/**
 * El camino acá se bifurca y hay dos procesos:
 * - El primero ( $_GET['accion'] == 'buscar' )
 *      - Buscar una DJ con dni y codigo
 *      - Mostrar el resultado: Este puede ser: no existe, ya validado o con opción a validar.
 *      - Validar la DJ
 * 
 * - El segundo ( $_GET['accion'] == 'listar' )
 *      - Listar a todo el personal (mostrando si subió DJ o no).
 *      - Revisar su historial de DDJJ
 *      - Ver una DJ particular
 *  
 */

/** Revisión del POST para actualizar el estado de ser necesario */
//include('app/post.php');

if($_GET['accion'] == 'buscar') {
    armar_vista('buscar');
} elseif($_GET['accion'] == 'listar') {
    armar_vista('listar');
}elseif($_GET['accion'] == 'personal') {
    if(!isset($_GET['id']) || $_GET['id'] == null) {
        header("Location: index.php?accion=listar");
        die();
    } elseif(isset($_GET['formulario']) && $_GET['formulario'] != null) {
        armar_vista('formulario');
    } else {
        armar_vista('personal');
    }
} else {
    header("Location: index.php");
    die();
}



/**
 * Finalizando la muestra, borramos errores de la session
 */

die();

 unset($_SESSION['errores']);

 echo "<pre>";
 var_dump($_SESSION);