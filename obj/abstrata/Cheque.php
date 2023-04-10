<?php

abstract class Cheque
{
    /*public float $valor;
    public string $tipo;


    public function __construct(float $valor, string $tipo)
    {
        $this->valor = $valor;
        $this->tipo = $tipo;
    }*/

    public function __construct(public float $valor, public string $tipo)
    {
        
    }
    
    
    abstract function calcularJuro();
     
    /*public function verValor(): string
    {
        return "Valor do cheque {$this->tipo} é R$ {$this->valor}<br>";
    }*/

    public function converterReal(float $valor)
    {
        return number_format($valor, '2',',','.');
    }
}
