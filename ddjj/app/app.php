<?php
// Se inicia sesión en el storage
session_start();

// Se agregan funciones generales y valores Globales del sistema
// include('app/globales.php');  <<<< ------ CREAR
include('app/funciones.php');

// Se agregan los modelos de base de datos y formularios
include('../modelos/db.php');
include('../modelos/formulario-class.php');

// Se habilita un acceso a la conexión de la Base de datos
$DB = new DB();

// Contruir una variable de tiempo actual
$DateTime = new DateTime('now', new DateTimeZone('America/Argentina/Buenos_Aires'));

// Revisa el estado de la session, en caso de no aparecer, la crea
if(!isset($_SESSION['estado'])) {
    session_reset();
    actualizar_estado(0);
}

// Dependiendo el estado se arma el Formulario o se trae
if($_SESSION['estado'] == 0) {
    $formulario = new Formulario;
    actualizar_formulario($formulario);
} else {
    $formulario = unserialize($_SESSION['formulario']);
}


// En caso de haber un $_POST se activa este archivo:
if(isset($_POST) && $_POST != NULL) {
    include('app/post.php');
}


/**
 * 
 *  ///////////////    NOTA IMPORTANTE   ///////////////
 * 
 * El estado es un numero que define el valor de la session y la posición del recorrido
 * 
 * 0 - Inicia todo en blanco. Se muestra la carga del legajo.
 * 1 - Legajo cargado y validado. Se muestra el formulario.
 * 2 - Formulario cargado y validado. Se muestra la previsualización.
 * 3 - Formulario enviado correctamente. Se muestra el código verificador.
 * 
 */

// Se busca si hay un POST
