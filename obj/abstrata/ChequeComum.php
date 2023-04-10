<?php 

class ChequeComum extends Cheque
{
    public function calcularJuro():string
    {   
        $valorComJuro = $this->valor + (0.20 * $this->valor);
        //$valorConverteReal = parent::converterReal($this->valor);
        $valorConverteReal = $this->converterReal($valorComJuro);
        return "Valor do {$this->tipo} sem juro é R$ {$this->converterReal($this->valor)} com juro é R$ {$valorConverteReal}<br>";
    }
}