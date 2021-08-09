<?php

class Configuraciones
{
    private $codigo;
    private $tipo_config;
    private $Descripcion_config;
    private $Estado;
    private $valor;
    private $Accion;

    public function getcodigo(){
        return $this->codigo;
    }

    public function setcodigo($codigo){
        $this->codigo = $codigo;
    }
    public function gettipo_config(){
        return $this->tipo_config;
    }

    public function settipo_config($tipo_config){
        $this->tipo_config = $tipo_config;
    }

    public function getDescripcion_config(){
        return $this->Descripcion_config;
    }

    public function setDescripcion_config($Descripcion_config){
        $this->Descripcion_config = $Descripcion_config;
    }
    public function getEstado(){
        return $this->Estado;
    }

    public function setEstado($Estado){
        $this->Estado = $Estado;
    }
    public function getvalor(){
        return $this->valor;
    }

    public function setvalor($valor){
        $this->valor = $valor;
    }
    public function getAccion(){
        return $this->Accion;
    }

    public function setAccion($Accion){
        $this->Accion = $Accion;
    }
}
