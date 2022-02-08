<?php

function actualizar() {
    header("Location: index.php");
    die();
}

function actualizar_estado(int $estado) {
    $_SESSION['estado'] = $estado;
}

function actualizar_formulario(Formulario $formulario) {
    $_SESSION['formulario'] = serialize($formulario);
}

function armar_vista(string $archivo, Formulario $formulario = null) {
    include('vistas/default/header.php');
    include('vistas/' . $archivo . '.php');
    include('vistas/default/header.php');
}

function check_isset_notnull($elemento) {
    $return = false;
    if(isset($_SESSION['post'][$elemento]) && $_SESSION['post'][$elemento] != NULL) {
        $return = true;
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