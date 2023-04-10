<?php

class Cliente
{
    public string $logradouro;
    public int $numeroCasa;
    public string $bairro;
    

    public function verEndereço(): string
    {
        return "<p> Endereço : {$this->logradouro} N°{$this->numeroCasa}<br>Bairro: {$this->bairro}</p>";

    }

}