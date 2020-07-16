<?php

class LogModel{
    
    public $Fecha;
    public $AccionRealizada;
    public $IdTransaccion;

    function __construct($AccionRealizada,$IdTransaccion)
    {
        $date = new DateTime();
        $this->Fecha = $date->format('Y-m-d H:i:s');
        $this->AccionRealizada = $AccionRealizada;
        $this->IdTransaccion = $IdTransaccion;
    }
}