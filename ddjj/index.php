<?php
include('app/app.php');

switch ($_SESSION['estado']) {
    case 0:
        armar_vista('inicio');
        break;

    case 1:
        armar_vista('formulario', $formulario);
        break;

    case 2:
        armar_vista('previsualizacion', $formulario);
        break;

    case 3:
        armar_vista('codigo', $formulario);
        break;

    default:
        header("Location: index.php");
        break;
}