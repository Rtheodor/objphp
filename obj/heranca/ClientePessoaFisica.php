<?php


class ClientePessoaFisica extends Cliente
{
    public string $nome;
    public string $cpf;

    public function verInfomacaoUsuario(): string
    {
        $dados = "Endereço: {$this->logradouro}<br>";
        $dados .= "N° {$this->numeroCasa}<br>";
        $dados .= "Bairro: {$this->bairro}<br>";
        $dados .= "Nome: {$this->nome}<br>";
        $dados .= "CNPJ: {$this->cpf}";

        return $dados;
    }
}
