<?php

class Ciudades
{
    private $Codigo_ciudad;
    private $Ubicacion;
    private $departamentos;
    private $Accion;


    public function getCodigo_ciudad(){
        return $this->Codigo_ciudad;
    }

    public function setCodigo_ciudad($Codigo_ciudad){
        $this->Codigo_ciudad = $Codigo_ciudad;
    }

    public function getUbicacion(){
        return $this->Ubicacion;
    }

    public function setUbicacion($Ubicacion){
        $this->Ubicacion = $Ubicacion;
    }
    public function getdepartamentos(){
        return $this->departamentos;
    }

    public function setdepartamentos($departamentos){
        $this->departamentos = $departamentos;
    }


    public function getAccion(){
        return $this->Accion;
    }

    public function setAccion($Accion){
        $this->Accion = $Accion;
    }



}