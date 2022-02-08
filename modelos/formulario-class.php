<?php

class Formulario {

    public $id;
    public $nombre_apellido;
    public $legajo;
    public $documento;
    public $locacion;
    public $sector;
    public $internos;
    public $externos_1;
    public $externos_2;
    public $externos_3;
    public $externos_4;
    public $confidencial;
    public $antecedentes;
    public $otros;
    public $descripcion;
    public $fecha;
    public $codigo;
    public $validado;

    public $vinculos_internos;
    public $vinculos_externos;

    public function search_by_id($id) {
        $db = new DB();
        $this->id = $id;
        $formulario_sql = $db->fetch("select * from formularios where id = :id ", ['id' => $this->id]);
        if($formulario_sql) {
            $this->nombre_apellido = $formulario_sql['nombre_apellido'];
            $this->legajo = $formulario_sql['legajo'];
            $this->documento = $formulario_sql['documento'];
            $this->locacion = $formulario_sql['locacion'];
            $this->sector = $formulario_sql['sector'];
            $this->internos = $formulario_sql['internos'];
            $this->externos_1 = $formulario_sql['externos_1'];
            $this->externos_2 = $formulario_sql['externos_2'];
            $this->externos_3 = $formulario_sql['externos_3'];
            $this->externos_4 = $formulario_sql['externos_4'];
            $this->confidencial = $formulario_sql['confidencial'];
            $this->antecedentes = $formulario_sql['antecedentes'];
            $this->otros = $formulario_sql['otros'];
            $this->descripcion = $formulario_sql['descripcion'];
            $this->fecha = $formulario_sql['fecha'];
            $this->codigo = $formulario_sql['codigo'];
            $this->validado = $formulario_sql['validado'];

            $this->buscar_vinculos_internos();
            $this->buscar_vinculos_externos();
        } else {
            die("El id (" . $id . ") no existe");
        }
    }

    public function buscar_persona($legajo) {
        $db = new DB();
        $persona_sql = $db->fetch("select * from personal_ccasa where legajo = :legajo ", ['legajo' => $legajo]);
        if($persona_sql != NULL) {
            $this->nombre_apellido = $persona_sql['nombre_apellido'];
            $this->legajo = $persona_sql['legajo'];
            $this->documento = $persona_sql['documento'];
            $this->locacion = $persona_sql['locacion'];
            return true;
        } else {
            return false;
        }
    }

    public function buscar_vinculos_internos() {
        $db = new DB();
        $internos_sql = $db->fetchAll("select * from internos where formulario_id = :formulario_id", ['formulario_id' => $this->id]);
        if($internos_sql != NULL) {
            $this->vinculos_internos = $internos_sql;
        }
    }

    public function buscar_vinculos_externos() {
        $db = new DB();
        $externos_sql = $db->fetchAll("select * from externos where formulario_id = :formulario_id", ['formulario_id' => $this->id]);
        if($externos_sql != NULL) {
            $this->vinculos_externos = $externos_sql;
        }
    }

    public function completar_formulario($datos) {
        $this->sector = $datos['sector'];
        $this->internos = $datos['internos'];
        $this->externos_1 = $datos['externos_1'];
        $this->externos_2 = $datos['externos_2'];
        $this->externos_3 = $datos['externos_3'];
        $this->externos_4 = $datos['externos_4'];
        $this->confidencial = $datos['confidencial'];
        $this->antecedentes = $datos['antecedentes'];
        $this->otros = $datos['otros'];

        $this->descripcion = $datos['descripcion'];

        $this->vinculos_internos = array();
        $this->vinculos_externos = array();

        foreach($datos['interno'] as $interno) {
            $this->agregar_vinculo_interno($interno);
        }

        foreach($datos['externo'] as $externo) {
            $this->agregar_vinculo_externo($externo);
        }

    }

    public function agregar_vinculo_interno($vinculo) {
        $this->vinculos_internos[] = $vinculo;
    }

    public function agregar_vinculo_externo($vinculo) {
        $this->vinculos_externos[] = $vinculo;
    }

    public function checkear_formulario() {
        $errores = 0;
        if($this->internos == 'si') {
            if(!$this->revisar_internos() || count($this->vinculos_internos) == 0) {
                $errores++;
            }
        } else {
            $this->vinculos_internos = array();
        }
        if($this->externos_1 == 'si' || 
        $this->externos_2 == 'si' || 
        $this->externos_3 == 'si' || 
        $this->externos_4 == 'si') {
            if(!$this->revisar_externos() || count($this->vinculos_externos) == 0) {
                $errores++;
            }
        } else {
            $this->vinculos_externos = array();
        }
        if($this->confidencial == 'si' || 
        $this->antecedentes == 'si' || 
        $this->otros == 'si') {
            if($this->descripcion == '') {
                $errores++;
            }
        } else {
            $this->descripcion = '';
        }
        return $errores == 0 ? true : false;
    }

    public function revisar_internos() {
        $internos = array();
        $errores = 0;
        foreach($this->vinculos_internos as $vinculo) {
            if($vinculo['nombre'] != '' && 
            $vinculo['apellido'] != '' &&
            $vinculo['locacion'] != '' &&
            $vinculo['sector'] != '' &&
            $vinculo['vinculo'] != ''){
                $internos[] = $vinculo;
            } elseif($vinculo['nombre'] == '' && 
            $vinculo['apellido'] == '' &&
            $vinculo['locacion'] == '' &&
            $vinculo['sector'] == '' &&
            $vinculo['vinculo'] == '') {
            } else {
                $errores++;
            }
        }
        if(!$errores) {
            $this->vinculos_internos = $internos;
        }
        return $errores == 0 ? true : false;
    }

    public function revisar_externos() {
        $externos = array();
        $errores = 0;
        foreach($this->vinculos_externos as $vinculo) {
            if($vinculo['interes'] != '' && 
            $vinculo['nombre'] != '' &&
            $vinculo['propiedad'] != '' &&
            $vinculo['vinculo'] != '' &&
            $vinculo['actual'] != ''){
                $externos[] = $vinculo;
            } elseif($vinculo['interes'] == '' && 
            $vinculo['nombre'] == '' &&
            $vinculo['propiedad'] == '' &&
            $vinculo['vinculo'] == '' &&
            $vinculo['actual'] == '') {
            } else {
                $errores++;
            }
        }
        if(!$errores) {
            $this->vinculos_externos = $externos;
        }
        return $errores == 0 ? true : false;
    }

    public function asignar_codigo() {
        $db = new DB();
        $codigo_creado = false;
        while(!$codigo_creado) {
            $codigo = rand(111111, 999999);
            $existe = $db->count("select * from formularios where codigo = :codigo", ['codigo' => $codigo]);
            if(!$existe) {
                $codigo_creado = true;
            }
        }
        $this->codigo = $codigo;
    }

    public function asignar_fecha() {
        global $DateTime;
        $this->fecha = $DateTime;
    }

    public function guardar_db() {
        $db = new DB();
        $query = "insert into formularios (id, nombre_apellido, legajo, documento, locacion, sector, internos, externos_1, externos_2, externos_3, externos_4, confidencial, antecedentes, otros, descripcion, fecha, codigo, validado) 
        VALUES (:id, :nombre_apellido, :legajo, :documento, :locacion, :sector, :internos, :externos_1, :externos_2, :externos_3, :externos_4, :confidencial, :antecedentes, :otros, :descripcion, :fecha, :codigo, :validado)";
        $parameters = [
            'id' => null, 
            'nombre_apellido' => $this->nombre_apellido, 
            'legajo' => $this->legajo, 
            'documento' => $this->documento, 
            'locacion' => $this->locacion, 
            'sector' => $this->sector, 
            'internos' => $this->internos, 
            'externos_1' => $this->externos_1, 
            'externos_2' => $this->externos_2, 
            'externos_3' => $this->externos_3, 
            'externos_4' => $this->externos_4, 
            'confidencial' => $this->confidencial, 
            'antecedentes' => $this->antecedentes, 
            'otros' => $this->otros, 
            'descripcion' => $this->descripcion, 
            'fecha' => $this->fecha->format('Y-m-d H:i:s'), 
            'codigo' => $this->codigo, 
            'validado' => 'no'
        ];
        $db->insert($query, $parameters);
        $id = $db->fetch("select * from formularios where codigo = :codigo", ['codigo' => $this->codigo]);
        $this->id = $id['id'];
        foreach($this->vinculos_internos as $vinculo) {
            $this->guardar_vinculo_interno($vinculo);
        }
        foreach($this->vinculos_externos as $vinculo) {
            $this->guardar_vinculo_externo($vinculo);
        }
    }

    public function guardar_vinculo_interno($vinculo) {
        $db = new DB();
        $query = "insert into internos (id, nombre, apellido, locacion, sector, vinculo, formulario_id) 
            values (:id, :nombre, :apellido, :locacion, :sector, :vinculo, :formulario_id)";
        $parameters = [
            'id' => null, 
            'nombre' => $vinculo['nombre'], 
            'apellido' => $vinculo['apellido'], 
            'locacion' => $vinculo['locacion'], 
            'sector' => $vinculo['sector'], 
            'vinculo' => $vinculo['vinculo'], 
            'formulario_id' => $this->id
        ];    
        $db->insert($query, $parameters);
    }

    public function guardar_vinculo_externo($vinculo) {
        $db = new DB();
        $query = "insert into externos (id, interes, nombre, propiedad, vinculo, actual, formulario_id) 
            values (:id, :interes, :nombre, :propiedad, :vinculo, :actual, :formulario_id)";
        $parameters = [
            'id' => null, 
            'interes' => $vinculo['interes'], 
            'nombre' => $vinculo['nombre'], 
            'propiedad' => $vinculo['propiedad'], 
            'vinculo' => $vinculo['vinculo'], 
            'actual' => $vinculo['actual'], 
            'formulario_id' => $this->id
        ];    
        $db->insert($query, $parameters);
    }

}