<?php

class Protocolos
{
    private $id_protocolo;
    private $Codigo_pq;
    private $Trazabilidad;
    private $incertidumbre;
    private $comentarios;
    private $Esquema;
    private $Accion;

    public function getid_protocolo(){
        return $this->id_protocolo;
    }

    public function setid_protocolo($id_protocolo){
        $this->id_protocolo = $id_protocolo;
    }

    public function getCodigo_pq(){
        return $this->Codigo_pq;
    }

    public function setCodigo_pq($Codigo_pq){
        $this->Codigo_pq = $Codigo_pq;
    }


    public function getTrazabilidad(){
        return $this->Trazabilidad;
    }

    public function setTrazabilidad($Trazabilidad){
        $this->Trazabilidad = $Trazabilidad;
    }


    public function getincertidumbre(){
        return $this->incertidumbre;
    }

    public function setincertidumbre($incertidumbre){
        $this->incertidumbre = $incertidumbre;
    }


    public function getcomentarios(){
        return $this->comentarios;
    }

    public function setcomentarios($comentarios){
        $this->comentarios = $comentarios;
    }

    public function getEsquema(){
        return $this->Esquema;
    }

    public function setEsquema($Esquema){
        $this->Esquema = $Esquema;
    }


    public function getAccion(){
        return $this->Accion;
    }

    public function setAccion($Accion){
        $this->Accion = $Accion;
    }


}