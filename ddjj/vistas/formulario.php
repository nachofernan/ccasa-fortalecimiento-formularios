<form action="index.php" method="POST" id="FortForm"></form>
<form action="index.php" method="POST" id="FortForm_dump"></form>

<div class="container pt-5">
    <div class="row pt-4">
        <div class="col-8 offset-1">
            <button type="submit" name="volver" value="1" form="FortForm_dump" class="btn btn-outline-secondary px-5">Volver</button>
            <hr>
        </div>
    </div>
    <div class="row pt-2">
        <div class="col-8 offset-1">
            <h3>DECLARACIÓN JURADA DE CONFLICTO DE INTERESES COLABORADORES CCA</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-1">
            <p>Este formulario tiene el objetivo de asistir a los colaboradores de Centrales de la Costa Atlántica S. A (CCA) en la identificación de situaciones que pueden ser consideradas conflicto de intereses en virtud de lo establecido en el Código de Ética y Conducta y en la Política de Conflicto de Intereses.</p>
            <p>Al completarlo, debe tener en cuenta que los conflictos de intereses <strong>son comunes y no necesariamente inapropiados.</strong> Si su respuesta es “SI” para alguna de las preguntas, esto no indica necesariamente que esté violando la normativa y las políticas de CCA. Significa que usted identificó un asunto que requiere su atención y la de CCA.</p>
            <p>Muchos conflictos pueden ser resueltos sencillamente declarando su existencia. Es fundamental para CCA y para usted que los posibles conflictos sean completamente declarados; lo que permitirá que se traten de manera justa para todos los involucrados.</p>
        </div>
    </div>
    <hr>
    <?php if(isset($_SESSION['errores']['legajo'])) { ?>
    <div class="row">
        <div class="col-8 offset-1">
            <div class="alert alert-danger">Faltan datos a completar</div>
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
                        I - Información Personal
                    </h4>
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    Nombre y Apellido
                </div>
                <div class="col">
                    <input type="text" class="form-control" form="FortForm" disabled required value="<?php echo $formulario->nombre_apellido; ?>">
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    Legajo
                </div>
                <div class="col">
                    <input type="text" class="form-control" form="FortForm" disabled required value="<?php echo $formulario->legajo; ?>">
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    Documento
                </div>
                <div class="col">
                    <input type="text" class="form-control" form="FortForm" disabled required value="<?php echo $formulario->documento; ?>">
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small>
                </div>
                <div class="col">
                    <input type="text" class="form-control" form="FortForm" disabled required value="<?php echo $formulario->locacion; ?>">
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                Gerencia, Área o Sector
                </div>
                <div class="col">
                    <input type="text" name="sector" class="form-control" form="FortForm" required value="<?php echo $formulario->sector; ?>">
                </div>
            </div>
        </div>
    </div>

    <!-- Vínculos Laborales Internos -->
    <div class="row border-bottom pb-3">
        <div class="col-8 offset-1">
            <div class="row py-4">
                <div class="col border-bottom">
                    <h4>
                        II - Vínculos laborales internos
                    </h4>
                </div>
            </div>
            <div class="row py-2">
                <div class="col">
                    ¿Tiene usted familiares directos trabajando en CCA? 
                </div>
                <div class="col-2">
                    SI <input type="radio" name="internos" value="si"  form="FortForm" required <?php echo $formulario->internos == 'si' ? 'checked' : ''; ?>/>
                </div>
                <div class="col-2">
                    NO <input type="radio" name="internos" value="no"  form="FortForm" required <?php  echo $formulario->internos == 'no' ? 'checked' : ''  ?>/>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-8 small">
                    <p>Son definidos como familiares directos a familiares con vínculo de consanguinidad en línea recta o colateral hasta el segundo grado inclusive (hijos, padres, nietos abuelos y hermanos) y por afinidad hasta el segundo grado (esposa/esposo, concubina/concubino, suegro/suegra, yerno/nuera, abuelos políticos y/o cuñados)</p>
                </div>
            </div>
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Faltan datos del Vínculo Interno") { ?>
            <div class="text-danger border border-danger rounded p-1">
            <?php } ?>
            <div class="row">
                <div class="col small font-weight-bold pb-2">
                Si la respuesta es SI, por favor complete el siguiente cuadro con los datos de la/s persona/s con quien tenga vínculo
                </div>
            </div>
            <?php for ($i=0; $i < 5; $i++) { ?>
            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Nombre</div>
                        <div class="col"><input type="text" name="interno[<?php echo $i; ?>][nombre]" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_internos[$i])){echo $formulario->vinculos_internos[$i]['nombre'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Apellido</div>
                        <div class="col"><input type="text" name="interno[<?php echo $i; ?>][apellido]" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_internos[$i])){echo $formulario->vinculos_internos[$i]['apellido'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Lugar de Trabajo <small>(Adm. Central/Centrales Eléctricas)</small></div>
                        <div class="col"><input type="text" name="interno[<?php echo $i; ?>][locacion]" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_internos[$i])){echo $formulario->vinculos_internos[$i]['locacion'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Gerencia/Área/Sector</div>
                        <div class="col"><input type="text" name="interno[<?php echo $i; ?>][sector]" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_internos[$i])){echo $formulario->vinculos_internos[$i]['sector'];}  ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Vínculo</div>
                        <div class="col"><input type="text" name="interno[<?php echo $i; ?>][vinculo]" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_internos[$i])){echo $formulario->vinculos_internos[$i]['vinculo'];}  ?>"></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Vínculos Externos -->
    <div class="row border-bottom pb-3">
        <div class="col-8 offset-1">
            <div class="row py-4">
                <div class="col border-bottom">
                    <h4>
                        III - Vínculos externos
                    </h4>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col pb-2 border-bottom">
                ¿Usted o alguien de su familia tiene algún interés económico, financiero, de propiedad o de algún otro tipo, en una persona humana o jurídica proveedora, contratista o tercera parte que se encuentre vinculada al ámbito de las actividades de CCA pudiendo constituir un conflicto de intereses, ya sea real, potencial o aparente? 
                </div>
                <div class="col-2">
                    SI <input type="radio" name="externos_1" value="si" form="FortForm" required  <?php echo $formulario->externos_1 == 'si' ? 'checked' : ''; ?> />
                </div>
                <div class="col-2">
                    NO <input type="radio" name="externos_1" value="no" form="FortForm" required  <?php echo $formulario->externos_1 == 'no' ? 'checked' : ''; ?> />
                </div>
            </div>
            <div class="row pt-2">
                <div class="col pb-2 border-bottom">
                ¿Tiene usted familiares directos desempeñando actividades laborales en empresas de proveedores, contratistas, subcontratistas o en entes reguladores públicos que interactúen en ejercicio de sus funciones con CCA?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="externos_2" value="si" form="FortForm" required  <?php echo $formulario->externos_2 == 'si' ? 'checked' : ''; ?> />
                </div>
                <div class="col-2">
                    NO <input type="radio" name="externos_2" value="no" form="FortForm" required  <?php echo $formulario->externos_2 == 'no' ? 'checked' : ''; ?> />
                </div>
            </div>
            <div class="row pt-2">
                <div class="col pb-2 border-bottom">
                ¿Usted ha trabajado en los últimos tres años o ha tenido algún tipo de relación contractual con alguna persona humana o jurídica que sea proveedor, contratista, subcontratista o tercera parte vinculada a CCA o que represente a este tipo de personas?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="externos_3" value="si" form="FortForm" required  <?php echo $formulario->externos_3 == 'si' ? 'checked' : ''; ?> />
                </div>
                <div class="col-2">
                    NO <input type="radio" name="externos_3" value="no" form="FortForm" required  <?php echo $formulario->externos_3 == 'no' ? 'checked' : ''; ?> />
                </div>
            </div>
            <div class="row py-2">
                <div class="col pb-2 border-bottom">
                ¿Es usted miembro de algún directorio, consejo de administración u otro órgano societario o social diferente de CCA?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="externos_4" value="si" form="FortForm" required  <?php echo $formulario->externos_4 == 'si' ? 'checked' : ''; ?> />
                </div>
                <div class="col-2">
                    NO <input type="radio" name="externos_4" value="no" form="FortForm" required  <?php echo $formulario->externos_4 == 'no' ? 'checked' : ''; ?> />
                </div>
            </div>
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Faltan datos de los Vínculos Externos") { ?>
            <div class="text-danger border border-danger rounded p-1">
            <?php } ?>
            <div class="row">
                <div class="col small font-weight-bold pb-2">
                Si la respuesta fue SI a alguna de las preguntas anteriores, debe completar la siguiente información
                </div>
            </div>
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Faltan datos de los Vínculos Externos") { ?>
            </div>
            <?php } ?>
            <?php for ($i=0; $i < 5; $i++) { ?>
            <div class="row small pt-2">
                <div class="col-10 offset-1 border-bottom pb-2">
                    <div class="row py-1">
                        <div class="col">Tipo de Interés</div>
                        <div class="col"><input type="text" name="externo[<?php echo $i; ?>][interes]" id="nombre" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_externos[$i])){echo $formulario->vinculos_externos[$i]['interes'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Nombre y Apellido o Razón Social</div>
                        <div class="col"><input type="text" name="externo[<?php echo $i; ?>][nombre]" id="apellido" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_externos[$i])){echo $formulario->vinculos_externos[$i]['nombre'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de Propiedad</div>
                        <div class="col"><input type="text" name="externo[<?php echo $i; ?>][propiedad]" id="locacion" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_externos[$i])){echo $formulario->vinculos_externos[$i]['propiedad'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">Tipo de Vínculo</div>
                        <div class="col"><input type="text" name="externo[<?php echo $i; ?>][vinculo]" id="sector" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_externos[$i])){echo $formulario->vinculos_externos[$i]['vinculo'];} ?>"></div>
                    </div>
                    <div class="row py-1">
                        <div class="col">¿Se trata de un interés actual?</div>
                        <div class="col"><input type="text" name="externo[<?php echo $i; ?>][actual]" id="vinculo" class="form-control form-control-sm" form="FortForm" value="<?php if(isset($formulario->vinculos_externos[$i])){echo $formulario->vinculos_externos[$i]['actual'];} ?>"></div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Información Confidencial -->
    <div class="row border-bottom pb-3">
        <div class="col-8 offset-1">
            <div class="row py-4">
                <div class="col border-bottom">
                    <h4>
                        IV - Información Confidencial
                    </h4>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col pb-2">
                    ¿Ha revelado usted de manera consciente cualquier tipo de información confidencial acerca de CCA a personas ajenas a la Empresa?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="confidencial" value="si" form="FortForm" required  <?php echo $formulario->confidencial == 'si' ? 'checked' : ''; ?> />
                </div>
                <div class="col-2">
                    NO <input type="radio" name="confidencial" value="no" form="FortForm" required  <?php echo $formulario->confidencial == 'no' ? 'checked' : ''; ?> />
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
                    ¿Ha sido usted personalmente objeto de una auditoría, investigación, proceso judicial o actividad similar por motivos o hechos de corrupción?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="antecedentes" value="si" form="FortForm" required  <?php echo $formulario->antecedentes == 'si' ? 'checked' : ''; ?> />
                </div>
                <div class="col-2">
                    NO <input type="radio" name="antecedentes" value="no" form="FortForm" required  <?php echo $formulario->antecedentes == 'no' ? 'checked' : ''; ?> />
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
                    ¿Existe alguna otra circunstancia que pueda afectar o que pueda percibirse que afecta su objetividad e independencia en el desempeño de sus funciones en CCA?
                </div>
                <div class="col-2">
                    SI <input type="radio" name="otros" value="si" form="FortForm" required  <?php echo $formulario->otros == 'si' ? 'checked' : ''; ?> />
                </div>
                <div class="col-2">
                    NO <input type="radio" name="otros" value="no" form="FortForm" required  <?php echo $formulario->otros == 'no' ? 'checked' : ''; ?> />
                </div>
            </div>
        </div>
    </div>
    
    <!-- Descripcion -->
    <div class="row mt-4 border-bottom pb-3">
        <div class="col-10 offset-1">
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Falta una descipción para los puntos IV, V o VI en conflicto") { ?>
            <div class="text-danger border border-danger rounded p-1">
            <?php } ?>
            <div class="row">
                <div class="col small font-weight-bold">
                    Si respondió SI a alguna de las preguntas en los puntos IV, V o VI, por favor brinde información detallada:
                </div>
            </div>
            <?php if(isset($_GET['mensaje']) && $_GET['mensaje'] == "Falta una descipción para los puntos IV, V o VI en conflicto") { ?>
            </div>
            <?php } ?>
            <div class="row small pt-4">
                <div class="col-10 pb-2">
                    <textarea name="descripcion" id="descripcion" rows="8" class="form-control" form="FortForm"><?php echo $formulario->descripcion; ?></textarea>
                </div>
            </div>
        </div>
    </div>

    <!-- Declaración final -->
    <div class="row">
        <div class="col-8 offset-1 pt-4">
            <p>Declaro que la información proporcionada en el presente formulario es cierta y que no tengo conocimiento de ninguna otra circunstancia que constituya un conflicto de interés acorde a lo establecido en la normativa vigente y las políticas de CCA. Me comprometo a informar de cualquier cambio en lo anterior, completando un nuevo formulario.</p>
            <p>El plazo para la firma de la Declaración Jurada de Conflictos de Intereses será de 60 días. </p>
            <p>CCA evaluará cada uno de los casos en que se omita la presentación de la Declaración jurada.</p> 
            <p>La falsedad en la información consignada será evaluada por el Comité de Ética e Integridad. </p>
        </div>
    </div>

    <!-- Enviar Formulario -->
    <div class="row mt-4 pb-5 mb-5">
        <div class="col-10 offset-1">
            <div class="row small text-center pt-4">
                <div class="col-10 border-bottom pb-2">
                    <button type="submit" name="previsualizar" value="1" form="FortForm" class="btn btn-primary btn-lg px-5">Previsualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>