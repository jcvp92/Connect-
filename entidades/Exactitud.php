<?php

class Exactitud
{
    private $id_exactitud;
    private $Carga_exa;
    private $indicacion_exa;
    private $Error_exa;
    private $id_protocolo;
    private $Accion;

    public function getid_exactitud(){
        return $this->id_exactitud;
    }

    public function setid_exactitud($id_exactitud){
        $this->id_exactitud = $id_exactitud;
    }

    public function getCarga_exa(){
        return $this->Carga_exa;
    }

    public function setCarga_exa($Carga_exa){
        $this->Carga_exa = $Carga_exa;
    }

    public function getindicacion_exa(){
        return $this->indicacion_exa;
    }

    public function setindicacion_exa($indicacion_exa){
        $this->indicacion_exa = $indicacion_exa;
    }
    public function getError_exa(){
        return $this->Error_exa;
    }

    public function setError_exa($Error_exa){
        $this->Error_exa = $Error_exa;
    }
    public function getid_protocolo(){
        return $this->id_protocolo;
    }

    public function setid_protocolo($id_protocolo){
        $this->id_protocolo = $id_protocolo;
    }

    public function getAccion(){
        return $this->Accion;
    }

    public function setAccion($Accion){
        $this->Accion = $Accion;
    }
}