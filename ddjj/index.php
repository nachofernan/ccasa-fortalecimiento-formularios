<?php
/* session_start();
session_destroy(); */
session_start();
include('app/db.php');
$db = new DB();

/* Se cargan las funciones */
include('app/funciones.php');

/* En el estado de la Session se analiza qué controlador tiene que actuar */
if(!isset($_SESSION['estado'])) { $_SESSION['estado'] = 0; }

/**
 * El estado es un numero que define el valor de la session y la posición del recorrido
 * 
 * 0 - Inicia todo en blanco. Se muestra la carga del legajo.
 * 1 - Legajo cargado y validado. Se muestra el formulario.
 * 2 - Formulario cargado y validado. Se muestra la previsualización.
 * 3 - Formulario enviado correctamente. Se muestra el código verificador.
 * 
 */

/** Revisión del POST para actualizar el estado de ser necesario */
include('app/post.php');

switch ($_SESSION['estado']) {
    case 0:
        armar_vista('inicio');
        break;

    case 1:
        armar_vista('formulario');
        break;

    case 2:
        armar_vista('previsualizacion');
        break;

    case 3:
        armar_vista('codigo');
        session_destroy();
        break;

    default:
        session_destroy();
        header("Location: index.php");
        break;
}

/**
 * Finalizando la muestra, borramos errores de la session
 */

 unset($_SESSION['errores']);