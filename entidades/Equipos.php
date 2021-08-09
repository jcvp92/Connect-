<?php

class Equipos
{
    private $id_equipo;
    private $Modelo;
    private $Fabricante;
    private $Serial;
    private $Ubicacion;
    private $Codigo_interno;
    private $id_tipo;
    private $Accion;

    public function getid_equipo(){
        return $this->id_equipo;
    }

    public function setid_equipo($id_equipo){
        $this->id_equipo = $id_equipo;
    }

    public function getModelo(){
        return $this->Modelo;
    }

    public function setModelo($Modelo){
        $this->Modelo = $Modelo;
    }
    public function getFabricante(){
        return $this->Fabricante;
    }

    public function setFabricante($Fabricante){
        $this->Fabricante = $Fabricante;
    }
    public function getSerial(){
        return $this->Serial;
    }

    public function setSerial($Serial){
        $this->Serial = $Serial;
    }
    public function getUbicacion(){
        return $this->Ubicacion;
    }

    public function setUbicacion($Ubicacion){
        $this->Ubicacion = $Ubicacion;
    }
    public function getCodigo_interno(){
        return $this->Codigo_interno;
    }

    public function setCodigo_interno($Codigo_interno){
        $this->Codigo_interno = $Codigo_interno;
    }
    public function getid_tipo(){
        return $this->id_tipo;
    }

    public function setid_tipo($id_tipo){
        $this->id_tipo = $id_tipo;
    }
    public function getAccion(){
        return $this->Accion;
    }

    public function setAccion($Accion){
        $this->Accion = $Accion;
    }


}