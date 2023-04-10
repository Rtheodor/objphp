<?php

class clientePessoaJuridica extends Cliente
{
    public string $nome;
    public string $cnpj;

    public function verInformacaoEmpresa(): string
    {
        $dados  = "Endereço {$this->logradouro}<br>";
        $dados .= "N° {$this->numeroCasa}<br>";
        $dados .= "Bairro: {$this->bairro}<br>";
        $dados .= "Nome da Empresa: {$this->nome}<br>";
        $dados .= "CNPJ:{$this->cnpj}";

        return $dados . "<br>";
    }
}
