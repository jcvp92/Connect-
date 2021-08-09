<?php

class Cliente
{
    private $id_cliente;
    private $Nit;
    private $Razon_social;
    private $direccion_cliente;
    private $Responsable;
    private $Telefono_clien;
    private $Celular_cliente;
    private $Codigo_ciudad;
    private $Accion;

    public function getid_cliente(){
        return $this->id_cliente;
    }

    public function setid_cliente($id_cliente){
        $this->id_cliente = $id_cliente;
    }

    public function getNit(){
        return $this->Nit;
    }

    public function setNit($Nit){
        $this->Nit = $Nit;
    }

    public function getRazon_social(){
        return $this->Razon_social;
    }

    public function setRazon_social($Razon_social){
        $this->Razon_social = $Razon_social;
    }

    public function getdireccion_cliente(){
        return $this->direccion_cliente;
    }

    public function setdireccion_cliente($direccion_cliente){
        $this->direccion_cliente = $direccion_cliente;
    }

    public function getResponsable(){
        return $this->Responsable;
    }

    public function setResponsable($Responsable){
        $this->Responsable = $Responsable;
    }

    public function getTelefono_clien(){
        return $this->Telefono_clien;
    }

    public function setTelefono_clien($Telefono_clien){
        $this->Telefono_clien = $Telefono_clien;
    }

    public function getCelular_cliente(){
        return $this->Celular_cliente;
    }

    public function setCelular_cliente($Celular_cliente){
        $this->Celular_cliente = $Celular_cliente;
    }

    public function getCodigo_ciudad(){
        return $this->Codigo_ciudad;
    }

    public function setCodigo_ciudad($Codigo_cuidad){
        $this->Codigo_ciudad = $Codigo_cuidad;
    }

    public function getAccion(){
        return $this->Accion;
    }

    public function setAccion($Accion){
        $this->Accion = $Accion;
    }
}