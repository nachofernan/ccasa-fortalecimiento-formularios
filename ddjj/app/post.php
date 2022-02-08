<?php


// Primera revisión por el estado en 0 y busca legajo (((((((((((((( LISTO ))))))))))))))
if($_SESSION['estado'] == 0 && isset($_POST['legajo'])) {

    if($formulario->buscar_persona($_POST['legajo'])) {
        actualizar_estado(1);
        actualizar_formulario($formulario);
    }

    /* if($db->count('select * from personal_ccasa where legajo = ' . $_POST['legajo']) == 0) {
        $_SESSION['errores']['legajo'] = $_POST['legajo'];
    } else {
        // De encontrar algún match, pasa el estado a 1 y lo trae
        $_SESSION['ddjj'] = $db->fetch('select * from personal_ccasa where legajo = ' . $_POST['legajo']);
        $_SESSION['estado'] = 1;

        actualizar();
    } */
}

// Volver a escribir legajo  (((((((((((((( LISTO ))))))))))))))
if($_SESSION['estado'] == 1 && isset($_POST['volver'])) { 
    actualizar_estado(0);
    $formulario = new Formulario();
    actualizar_formulario($formulario);

    /* session_destroy();
    actualizar(); */
}

// Se manda el formulario a previsualizar (a ver q onda)
if($_SESSION['estado'] == 1 && isset($_POST['previsualizar'])) { 
    
    $formulario->completar_formulario($_POST);

    if($formulario->checkear_formulario()) {
        actualizar_estado(2);
        actualizar_formulario($formulario);
    }
    /* 

    $_SESSION['post'] = $_POST;

    if(
        // revisa datos del formulario
        check_isset_notnull('internos') &&
        check_isset_notnull('externos_1') &&
        check_isset_notnull('externos_2') &&
        check_isset_notnull('externos_3') &&
        check_isset_notnull('externos_4') &&
        check_isset_notnull('confidencial') &&
        check_isset_notnull('antecedentes') &&
        check_isset_notnull('otros') 
    ) {
        $ok = true;

        if($_POST['internos'] == 'si') { 
            if (
                // revisa si tiene el primer interno cargado
                !check_isset_notnull('nombre_vi1') ||
                !check_isset_notnull('apellido_vi1') ||
                !check_isset_notnull('locacion_vi1') ||
                !check_isset_notnull('sector_vi1') ||
                !check_isset_notnull('vinculo_vi1')
            ) {
                $ok = false;
                $_SESSION['errores']['interno_1'];
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
                $ok = false;
                $_SESSION['errores']['externo_1'];
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
                $ok = false;
                $_SESSION['errores']['descripcion'];
            }
        }
        if($ok) {
            $_SESSION['estado'] = 2;
        }
    } else {
        $_SESSION['errores']['datos_basicos'];
    }

    actualizar(); */
}

// Volver a la edición del formulario
if($_SESSION['estado'] == 2 && isset($_POST['volver'])) { 
    actualizar_estado(1);
    /* $_SESSION['estado'] = 1;
    actualizar(); */
}

// Se graba el formulario en la base de datos
if($_SESSION['estado'] == 2 && isset($_POST['guardar'])) { 

    $formulario->asignar_codigo();
    $formulario->asignar_fecha();
    $formulario->guardar_db();
    actualizar_estado(3);
    actualizar_formulario($formulario);

/* 
    // Generar código
    $codigo = crear_codigo();
    $_SESSION['codigo'] = $codigo;

    // Acomodar descripciones
    $descripcion = null;

    if(
        $_SESSION['post']['confidencial'] == 'si' || 
        $_SESSION['post']['antecedentes'] == 'si' || 
        $_SESSION['post']['otros'] == 'si'
    ) {
        $descripcion = $_SESSION['post']['descripcion'];
    }

    $ddjj = $_SESSION['ddjj'];
    $post = $_SESSION['post'];

    // Guardar la decla
    $query = "INSERT INTO `formularios` (`id`, `nombre_apellido`, `legajo`, `documento`, `locacion`, `sector`, `internos`, `externos_1`, `externos_2`, `externos_3`, `externos_4`, `confidencial`, `antecedentes`, `otros`, `descripcion`, `fecha`, `codigo`, `validado`) 
    VALUES (NULL, '$ddjj[nombre_apellido]', '$ddjj[legajo]', '$ddjj[documento]', '$ddjj[locacion]',  '$post[sector]', '$post[internos]', '$post[externos_1]', '$post[externos_2]', '$post[externos_3]', '$post[externos_4]', '$post[confidencial]', '$post[antecedentes]', '$post[otros]', '$descripcion', current_timestamp(), '$codigo', 'no')";

    $db->insert($query);

    $formulario = $db->fetch("select * from formularios where codigo = $codigo");

    // Se revisa y se cargan todes los vinculos que tenga
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
 
    $_SESSION['estado'] = 3;
    actualizar();
    */
}