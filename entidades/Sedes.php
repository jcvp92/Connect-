<?php

class Sedes
{
    private $Codigo_sede;
    private $Nombre;
    private $Direccion;
    private $Telefono;
    private $Accion;


    public function getCodigo_sede(){
        return $this->Codigo_sede;
    }

    public function setCodigo_sede($Codigo_sede){
        $this->Codigo_sede = $Codigo_sede;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }
    public function getDireccion(){
        return $this->Direccion;
    }

    public function setDireccion($Direccion){
        $this->Direccion = $Direccion;
    }

    public function getTelefono(){
        return $this->Telefono;
    }

    public function setTelefono($Telefono){
        $this->Telefono = $Telefono;
    }

    public function getAccion(){
        return $this->Accion;
    }

    public function setAccion($Accion){
        $this->Accion = $Accion;
    }

}