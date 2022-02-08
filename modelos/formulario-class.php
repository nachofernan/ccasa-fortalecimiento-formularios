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
        return ($this->revisar_internos() && $this->revisar_externos() && $this->descripcion != NULL);
    }

    public function revisar_internos() {
        $retorno = true;
        foreach($this->vinculos_internos as $key => $vinculo) {
            if($vinculo['nombre'] != NULL){
                
            }
        }
    }
    public function revisar_externos() {
        $retorno = true;
        foreach($this->vinculos_internos as $key => $vinculo) {
            if($vinculo['nombre'] != NULL){

            }
        }
    }

}