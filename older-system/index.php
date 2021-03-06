<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div class="container">
    <div class="row pt-5">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title h5">Acceso al servicio de formularios</div>
                </div>
                <div class="card-body">
                    <div class="row pb-3">
                        <div class="col">
                            <a class="btn btn-block btn-outline-primary" href="./ddjj/">
                                Completar formulario
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a class="btn btn-block btn-outline-primary" href="./rrhh/">
                                Acceso RRHH
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php die(); ?>
<?php // session_start(); ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <div class="navbar-brand">Formularios DDJJ</div>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Crear Formulario <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="buscador.php">Buscador</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="listado.php">Listado</a>
      </li>
    </ul>
  </div>
</nav>
<form action="previsualizar.php" method="POST" id="FortForm"></form>
<form action="previsualizar.php" method="POST" id="FortForm_dump"></form>

<div class="container pt-5">
    <div class="row py-4">
        <div class="col-8 offset-1">
            <h3>DECLARACI??N JURADA DE CONFLICTO DE INTERESES COLABORADORES CCA</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-1">
            <p>Este formulario tiene el objetivo de asistir a los colaboradores de Centrales de la Costa Atl??ntica S. A (CCA) en la identificaci??n de situaciones que pueden ser consideradas conflicto de intereses en virtud de lo establecido en el C??digo de ??tica y Conducta y en la Pol??tica de Conflicto de Intereses.</p>
            <p>Al completarlo, debe tener en cuenta que los conflictos de intereses <strong>son comunes y no necesariamente inapropiados.</strong> Si su respuesta es ???SI??? para alguna de las preguntas, esto no indica necesariamente que est?? violando la normativa y las pol??ticas de CCA. Significa que usted identific?? un asunto que requiere su atenci??n y la de CCA.</p>
            <p>Muchos conflictos pueden ser resueltos sencillamente declarando su existencia. Es fundamental para CCA y para usted que los posibles conflictos sean completamente declarados; lo que permitir?? que se traten de manera justa para todos los involucrados.</p>
        </div>
    </div>
    <hr>
    <?php if(isset($_GET['mensaje'])) { ?>
    <div class="row py-5">
        <div class="col-8 offset-1">
            <div class="alert alert-danger"><?php echo $_GET['mensaje']; ?></div>
        </div>
    </div>
    <?php }
    // var_dump($_SESSION);
    ?>

    <!-- INFORMACION PERSONAL -->
    <div class="row border-bottom pb-3">
        <div class="col-8 offset-1">
            <div class="row py-4">
                <div class="col border-bottom">
                    <h4>
                        I - Informaci??n Personal
                    </h4>
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    Nombre
                </div>
                <div class="col">
                    <input type="text" name="nombre" id="nombre" class="form-control" form="FortForm" required value="<?php if(isset($_SESSION['post']['nombre'])){echo $_SESSION['post']['nombre'];} ?>">
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    Apellido
                </div>
                <div class="col">
                    <input type="text" name="apellido" id="apellido" class="form-control" form="FortForm" required value="<?php if(isset($_SESSION['post']['apellido'])){echo $_SESSION['post']['apellido'];} ?>">
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    Legajo
                </div>
                <div class="col">
                    <input type="text" name="legajo" id="legajo" class="form-control" form="FortForm" required value="<?php if(isset($_SESSION['post']['legajo'])){echo $_SESSION['post']['legajo'];} ?>">
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    CUIT
                </div>
                <div class="col">
                    <input type="text" name="cuit" id="cuit" class="form-control" form="FortForm" required value="<?php if(isset($_SESSION['post']['cuit'])){echo $_SESSION['post']['cuit'];} ?>">
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                Lugar de Trabajo <small>(Adm. Central/Centrales El??ctricas)</small>
                </div>
                <div class="col">
                    <input type="text" name="locacion" id="locacion" class="form-control" form="FortForm" required value="<?php if(isset($_SESSION['post']['locacion'])){echo $_SESSION['post']['locacion'];} ?>">
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                Gerencia/??rea/Sector
                </div>
                <div class="col">
                    <input type="text" name="sector" id="sector" class="form-control" form="FortForm" required value="<?php if(isset($_SESSION['post']['sector'])){echo $_SESSION['post']['sector'];} ?>">
                </div>
            </div>
        </div>
    </div>

    <!-- V??nculos Laborales Internos -->
    <div class="row border-bottom pb-3">
        <div class="col-8 offset-1">
            <div class="row py-4">
                <div class="col border-bottom">
                    <h4>
                        II - V??nculos laborales internos
                    </h4>
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    ??Tiene usted familiares directos trabajando en CCA? 
                </div>
                <div class="col-2">
                    SI <input type="radio" name="internos" value="si"  form="FortForm" required <?php if(isset($_SESSION['post']['internos']) && $_SESSION['post']['internos'] == 'si'){echo 'checked';} ?>/>
                </div>
                <div class="col-2">
                    NO <input type="radio" name="internos" value="no"  form="FortForm" required <?php if(isset($_SESSION['post']['internos']) && $_SESSION['post']['internos'] == 'no'){echo 'checked';} ?>/>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-8 small">
                    <p>Son definidos como familiares directos a familiares con v??nculo de consanguinidad en l??nea recta o colateral hasta el segundo grado inclusive (hijos, padres, nietos abuelos y hermanos) y por afinidad hasta el segundo grado (esposa/esposo, concubina/concubino, suegro/suegra, yerno/nuera, abuelos pol??ticos y/o cu??ados)</p>
                </div>
            </div>
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Faltan datos del V??nculo Interno") { ?>
            <div class="text-danger border border-danger rounded p-1">
            <?php } ?>
            <div class="row">
                <div class="col small font-weight-bold pb-2">
                Si la respuesta es SI, por favor complete el siguiente cuadro con los datos de la/s persona/s con quien tenga v??nculo
                </div>
            </div>
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Faltan datos del V??nculo Interno") { ?>
            </div>
            <?php } ?>
            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Nombre</div>
                        <div class="col"><input type="text" name="nombre_vi1" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_vi1'])){echo $_SESSION['post']['nombre_vi1'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Apellido</div>
                        <div class="col"><input type="text" name="apellido_vi1" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['apellido_vi1'])){echo $_SESSION['post']['apellido_vi1'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales El??ctricas)</small></div>
                        <div class="col"><input type="text" name="locacion_vi1" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['locacion_vi1'])){echo $_SESSION['post']['locacion_vi1'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Gerencia/??rea/Sector</div>
                        <div class="col"><input type="text" name="sector_vi1" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['sector_vi1'])){echo $_SESSION['post']['sector_vi1'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_vi1" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_vi1'])){echo $_SESSION['post']['vinculo_vi1'];} ?>"></div>
                    </div>
                </div>
            </div>

            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Nombre</div>
                        <div class="col"><input type="text" name="nombre_vi2" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_vi2'])){echo $_SESSION['post']['nombre_vi2'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Apellido</div>
                        <div class="col"><input type="text" name="apellido_vi2" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['apellido_vi2'])){echo $_SESSION['post']['apellido_vi2'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales El??ctricas)</small></div>
                        <div class="col"><input type="text" name="locacion_vi2" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['locacion_vi2'])){echo $_SESSION['post']['locacion_vi2'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Gerencia/??rea/Sector</div>
                        <div class="col"><input type="text" name="sector_vi2" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['sector_vi2'])){echo $_SESSION['post']['sector_vi2'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_vi2" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_vi2'])){echo $_SESSION['post']['vinculo_vi2'];} ?>"></div>
                    </div>
                </div>
            </div>

            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Nombre</div>
                        <div class="col"><input type="text" name="nombre_vi3" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_vi3'])){echo $_SESSION['post']['nombre_vi3'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Apellido</div>
                        <div class="col"><input type="text" name="apellido_vi3" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['apellido_vi3'])){echo $_SESSION['post']['apellido_vi3'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales El??ctricas)</small></div>
                        <div class="col"><input type="text" name="locacion_vi3" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['locacion_vi3'])){echo $_SESSION['post']['locacion_vi3'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Gerencia/??rea/Sector</div>
                        <div class="col"><input type="text" name="sector_vi3" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['sector_vi3'])){echo $_SESSION['post']['sector_vi3'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_vi3" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_vi3'])){echo $_SESSION['post']['vinculo_vi3'];} ?>"></div>
                    </div>
                </div>
            </div>

            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Nombre</div>
                        <div class="col"><input type="text" name="nombre_vi4" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_vi4'])){echo $_SESSION['post']['nombre_vi4'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Apellido</div>
                        <div class="col"><input type="text" name="apellido_vi4" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['apellido_vi4'])){echo $_SESSION['post']['apellido_vi4'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales El??ctricas)</small></div>
                        <div class="col"><input type="text" name="locacion_vi4" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['locacion_vi4'])){echo $_SESSION['post']['locacion_vi4'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Gerencia/??rea/Sector</div>
                        <div class="col"><input type="text" name="sector_vi4" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['sector_vi4'])){echo $_SESSION['post']['sector_vi4'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_vi4" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_vi4'])){echo $_SESSION['post']['vinculo_vi4'];} ?>"></div>
                    </div>
                </div>
            </div>

            <div class="row small pt-2">
                <div class="col-10 offset-1 pb-2">
                    <div class="row py-1">
                        <div class="col">Nombre</div>
                        <div class="col"><input type="text" name="nombre_vi5" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_vi5'])){echo $_SESSION['post']['nombre_vi5'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Apellido</div>
                        <div class="col"><input type="text" name="apellido_vi5" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['apellido_vi5'])){echo $_SESSION['post']['apellido_vi5'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales El??ctricas)</small></div>
                        <div class="col"><input type="text" name="locacion_vi5" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['locacion_vi5'])){echo $_SESSION['post']['locacion_vi5'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Gerencia/??rea/Sector</div>
                        <div class="col"><input type="text" name="sector_vi5" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['sector_vi5'])){echo $_SESSION['post']['sector_vi5'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_vi5" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_vi5'])){echo $_SESSION['post']['vinculo_vi5'];} ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- V??nculos Externos -->
    <div class="row border-bottom pb-3">
        <div class="col-8 offset-1">
            <div class="row py-4">
                <div class="col border-bottom">
                    <h4>
                        III - V??nculos externos
                    </h4>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col pb-2 border-bottom">
                ??Usted o alguien de su familia tiene alg??n inter??s econ??mico, financiero, de propiedad o de alg??n otro tipo, en una persona humana o jur??dica proveedora, contratista o tercera parte que se encuentre vinculada al ??mbito de las actividades de CCA pudiendo constituir un conflicto de intereses, ya sea real, potencial o aparente? 
                </div>
                <div class="col-2">
                    SI <input type="radio" name="externos_1" value="si" form="FortForm" required  <?php if(isset($_SESSION['post']['externos_1']) && $_SESSION['post']['externos_1'] == 'si'){echo 'checked';} ?>/>
                </div>
                <div class="col-2">
                    NO <input type="radio" name="externos_1" value="no" form="FortForm" required  <?php if(isset($_SESSION['post']['externos_1']) && $_SESSION['post']['externos_1'] == 'no'){echo 'checked';} ?>/>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col pb-2 border-bottom">
                ??Tiene usted familiares directos desempe??ando actividades laborales en empresas de proveedores, contratistas, subcontratistas o en entes reguladores p??blicos que interact??en en ejercicio de sus funciones con CCA?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="externos_2" value="si" form="FortForm" required  <?php if(isset($_SESSION['post']['externos_2']) && $_SESSION['post']['externos_2'] == 'si'){echo 'checked';} ?>/>
                </div>
                <div class="col-2">
                    NO <input type="radio" name="externos_2" value="no" form="FortForm" required  <?php if(isset($_SESSION['post']['externos_2']) && $_SESSION['post']['externos_2'] == 'no'){echo 'checked';} ?>/>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col pb-2 border-bottom">
                ??Usted ha trabajado en los ??ltimos tres a??os o ha tenido alg??n tipo de relaci??n contractual con alguna persona humana o jur??dica que sea proveedor, contratista, subcontratista o tercera parte vinculada a CCA o que represente a este tipo de personas?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="externos_3" value="si" form="FortForm" required  <?php if(isset($_SESSION['post']['externos_3']) && $_SESSION['post']['externos_3'] == 'si'){echo 'checked';} ?>/>
                </div>
                <div class="col-2">
                    NO <input type="radio" name="externos_3" value="no" form="FortForm" required  <?php if(isset($_SESSION['post']['externos_3']) && $_SESSION['post']['externos_3'] == 'no'){echo 'checked';} ?>/>
                </div>
            </div>
            <div class="row py-2">
                <div class="col pb-2 border-bottom">
                ??Es usted miembro de alg??n directorio, consejo de administraci??n u otro ??rgano societario o social diferente de CCA?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="externos_4" value="si" form="FortForm" required  <?php if(isset($_SESSION['post']['externos_4']) && $_SESSION['post']['externos_4'] == 'si'){echo 'checked';} ?>/>
                </div>
                <div class="col-2">
                    NO <input type="radio" name="externos_4" value="no" form="FortForm" required  <?php if(isset($_SESSION['post']['externos_4']) && $_SESSION['post']['externos_4'] == 'no'){echo 'checked';} ?>/>
                </div>
            </div>
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Faltan datos de los V??nculos Externos") { ?>
            <div class="text-danger border border-danger rounded p-1">
            <?php } ?>
            <div class="row">
                <div class="col small font-weight-bold pb-2">
                Si la respuesta fue SI a alguna de las preguntas anteriores, debe completar la siguiente informaci??n
                </div>
            </div>
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Faltan datos de los V??nculos Externos") { ?>
            </div>
            <?php } ?>
            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Tipo de Inter??s</div>
                        <div class="col"><input type="text" name="interes_ve1" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['interes_ve1'])){echo $_SESSION['post']['interes_ve1'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Nombre y Apellido o Raz??n Social</div>
                        <div class="col"><input type="text" name="nombre_ve1" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_ve1'])){echo $_SESSION['post']['nombre_ve1'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de Propiedad</div>
                        <div class="col"><input type="text" name="propiedad_ve1" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['propiedad_ve1'])){echo $_SESSION['post']['propiedad_ve1'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_ve1" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_ve1'])){echo $_SESSION['post']['vinculo_ve1'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">??Se trata de un inter??s actual?</div>
                        <div class="col"><input type="text" name="actual_ve1" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['actual_ve1'])){echo $_SESSION['post']['actual_ve1'];} ?>"></div>
                    </div>
                </div>
            </div>
            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Tipo de Inter??s</div>
                        <div class="col"><input type="text" name="interes_ve2" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['interes_ve2'])){echo $_SESSION['post']['interes_ve2'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Nombre y Apellido o Raz??n Social</div>
                        <div class="col"><input type="text" name="nombre_ve2" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_ve2'])){echo $_SESSION['post']['nombre_ve2'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de Propiedad</div>
                        <div class="col"><input type="text" name="propiedad_ve2" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['propiedad_ve2'])){echo $_SESSION['post']['propiedad_ve2'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_ve2" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_ve2'])){echo $_SESSION['post']['vinculo_ve2'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">??Se trata de un inter??s actual?</div>
                        <div class="col"><input type="text" name="actual_ve2" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['actual_ve2'])){echo $_SESSION['post']['actual_ve2'];} ?>"></div>
                    </div>
                </div>
            </div>
            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Tipo de Inter??s</div>
                        <div class="col"><input type="text" name="interes_ve3" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['interes_ve3'])){echo $_SESSION['post']['interes_ve3'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Nombre y Apellido o Raz??n Social</div>
                        <div class="col"><input type="text" name="nombre_ve3" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_ve3'])){echo $_SESSION['post']['nombre_ve3'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de Propiedad</div>
                        <div class="col"><input type="text" name="propiedad_ve3" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['propiedad_ve3'])){echo $_SESSION['post']['propiedad_ve3'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_ve3" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_ve3'])){echo $_SESSION['post']['vinculo_ve3'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">??Se trata de un inter??s actual?</div>
                        <div class="col"><input type="text" name="actual_ve3" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['actual_ve3'])){echo $_SESSION['post']['actual_ve3'];} ?>"></div>
                    </div>
                </div>
            </div>
            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Tipo de Inter??s</div>
                        <div class="col"><input type="text" name="interes_ve4" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['interes_ve4'])){echo $_SESSION['post']['interes_ve4'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Nombre y Apellido o Raz??n Social</div>
                        <div class="col"><input type="text" name="nombre_ve4" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_ve4'])){echo $_SESSION['post']['nombre_ve4'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de Propiedad</div>
                        <div class="col"><input type="text" name="propiedad_ve4" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['propiedad_ve4'])){echo $_SESSION['post']['propiedad_ve4'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_ve4" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_ve4'])){echo $_SESSION['post']['vinculo_ve4'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">??Se trata de un inter??s actual?</div>
                        <div class="col"><input type="text" name="actual_ve4" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['actual_ve4'])){echo $_SESSION['post']['actual_ve4'];} ?>"></div>
                    </div>
                </div>
            </div>
            <div class="row small pt-2">
                <div class="col-10 offset-1 pb-2">
                    <div class="row py-1">
                        <div class="col">Tipo de Inter??s</div>
                        <div class="col"><input type="text" name="interes_ve5" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['interes_ve5'])){echo $_SESSION['post']['interes_ve5'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Nombre y Apellido o Raz??n Social</div>
                        <div class="col"><input type="text" name="nombre_ve5" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['nombre_ve5'])){echo $_SESSION['post']['nombre_ve5'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de Propiedad</div>
                        <div class="col"><input type="text" name="propiedad_ve5" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['propiedad_ve5'])){echo $_SESSION['post']['propiedad_ve5'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de V??nculo</div>
                        <div class="col"><input type="text" name="vinculo_ve5" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['vinculo_ve5'])){echo $_SESSION['post']['vinculo_ve5'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">??Se trata de un inter??s actual?</div>
                        <div class="col"><input type="text" name="actual_ve5" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($_SESSION['post']['actual_ve5'])){echo $_SESSION['post']['actual_ve5'];} ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Informaci??n Confidencial -->
    <div class="row border-bottom pb-3">
        <div class="col-8 offset-1">
            <div class="row py-4">
                <div class="col border-bottom">
                    <h4>
                        IV - Informaci??n Confidencial
                    </h4>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col pb-2">
                    ??Ha revelado usted de manera consciente cualquier tipo de informaci??n confidencial acerca de CCA a personas ajenas a la Empresa?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="confidencial" value="si" form="FortForm" required  <?php if(isset($_SESSION['post']['confidencial']) && $_SESSION['post']['confidencial'] == 'si'){echo 'checked';} ?>/>
                </div>
                <div class="col-2">
                    NO <input type="radio" name="confidencial" value="no" form="FortForm" required  <?php if(isset($_SESSION['post']['confidencial']) && $_SESSION['post']['confidencial'] == 'no'){echo 'checked';} ?>/>
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
                    ??Ha sido usted personalmente objeto de una auditor??a, investigaci??n, proceso judicial o actividad similar por motivos o hechos de corrupci??n?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="antecedentes" value="si" form="FortForm" required  <?php if(isset($_SESSION['post']['antecedentes']) && $_SESSION['post']['antecedentes'] == 'si'){echo 'checked';} ?>/>
                </div>
                <div class="col-2">
                    NO <input type="radio" name="antecedentes" value="no" form="FortForm" required  <?php if(isset($_SESSION['post']['antecedentes']) && $_SESSION['post']['antecedentes'] == 'no'){echo 'checked';} ?>/>
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
                    ??Existe alguna otra circunstancia que pueda afectar o que pueda percibirse que afecta su objetividad e independencia en el desempe??o de sus funciones en CCA?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="otros" value="si" form="FortForm" required  <?php if(isset($_SESSION['post']['otros']) && $_SESSION['post']['otros'] == 'si'){echo 'checked';} ?>/>
                </div>
                <div class="col-2">
                    NO <input type="radio" name="otros" value="no" form="FortForm" required  <?php if(isset($_SESSION['post']['otros']) && $_SESSION['post']['otros'] == 'no'){echo 'checked';} ?>/>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Descripcion -->
    <div class="row mt-4 border-bottom pb-3">
        <div class="col-10 offset-1">
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Falta una descipci??n para los puntos IV, V o VI en conflicto") { ?>
            <div class="text-danger border border-danger rounded p-1">
            <?php } ?>
            <div class="row">
                <div class="col small font-weight-bold">
                    Si respondi?? SI a alguna de las preguntas en los puntos IV, V o VI, por favor brinde informaci??n detallada:
                </div>
            </div>
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Falta una descipci??n para los puntos IV, V o VI en conflicto") { ?>
            </div>
            <?php } ?>
            <div class="row small pt-4">
                <div class="col-10 pb-2">
                    <textarea name="descripcion" id="descripcion" rows="8" class="form-control" form="FortForm"><?php if(isset($_SESSION['post']['descripcion'])){echo $_SESSION['post']['descripcion'];} ?></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Declaraci??n final -->
    <div class="row">
        <div class="col-8 offset-1 pt-4">
            <p>Declaro que la informaci??n proporcionada en el presente formulario es cierta y que no tengo conocimiento de ninguna otra circunstancia que constituya un conflicto de inter??s acorde a lo establecido en la normativa vigente y las pol??ticas de CCA. Me comprometo a informar de cualquier cambio en lo anterior, completando un nuevo formulario.</p>
            <p>El plazo para la firma de la Declaraci??n Jurada de Conflictos de Intereses ser?? de 60 d??as. </p>
            <p>CCA evaluar?? cada uno de los casos en que se omita la presentaci??n de la Declaraci??n jurada.</p> 
            <p>La falsedad en la informaci??n consignada ser?? evaluada por el Comit?? de ??tica e Integridad. </p>
        </div>
    </div>

    <!-- Enviar Formulario -->
    <div class="row mt-4 pb-5 mb-5">
        <div class="col-10 offset-1">
            <div class="row small text-center pt-4">
                <div class="col-10 border-bottom pb-2">
                    <button type="submit" name="previsualizar" value="1" form="FortForm" class="btn btn-primary btn-lg px-5">Previsualizar</button>
                    <button type="submit" name="vaciar" value="1" form="FortForm_dump" class="btn btn-secondary btn-lg px-5 ml-5">Vaciar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
