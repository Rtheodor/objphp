<?php

class Conta
{
    public string $nome;
    public int $numeroAgencia;
    public int $numeroConta;
    public float $saldo;


    public function exibeDados(): string
    {   
        $infoConta = "Nome do Cliente: {$this->nome}<br>";
        $infoConta .= "Agencia: {$this->numeroAgencia} ";
        $infoConta .= "Conta: {$this->numeroConta}<br>";
        $infoConta .= "Saldo R$ {$this->saldo}";
        
        return $infoConta."<br>";

    }
}