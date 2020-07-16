<?php

class TransaccionModel
{

    public $Id;
    public $Fecha;
    public $Monto;
    public $Descripcion;

    function __construct($Monto, $Descripcion)
    {
        $this->Id = uniqid();
        $date = new DateTime();
        $this->Fecha = $date->format('Y-m-d H:i:s');
        $this->Monto = $Monto;
        $this->Descripcion = $Descripcion;
    }
}