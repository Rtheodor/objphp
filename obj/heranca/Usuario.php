<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    require './Cliente.php';
    require './ClientePessoaFisica.php';
    require './ClientePessoaJuridica.php';
    require './Conta.php';

    $cliente = new Cliente();
    $cliente->logradouro = "R.Marivaldo Fernandes";
    $cliente->numeroCasa = 35;
    $cliente->bairro = "Interlagos";
    $msg = $cliente->verEndereço();

    echo $msg;
    echo "<hr>";

    $clientePF = new ClientePessoaFisica();
    $clientePF->logradouro = "R.Marivaldo Fernandes";
    $clientePF->numeroCasa = 35;
    $clientePF->bairro = "Interlagos";
    $clientePF->nome = "Rafael ";
    $clientePF->cpf = "398655466984";
    
    $smgPF = $clientePF->verInfomacaoUsuario();
    echo $smgPF;
    echo "<hr>";


    $clientePJ = new ClientePessoaJuridica();
    $clientePJ->logradouro = "R.Marivaldo Fernandes";
    $clientePJ->numeroCasa = 35;
    $clientePJ->bairro = "Interlagos";
    $clientePJ->nome = "Rafael ";
    $clientePJ->cnpj = "592915340001";
    $smgPJ = $clientePJ->verInformacaoEmpresa();
    echo $smgPJ;
    echo "<hr>";

    $contaPF = new Conta();
    $contaPF->nome = "Rafão";
    $contaPF->numeroAgencia = 003;
    $contaPF->numeroConta = 0000111;
    $contaPF->saldo = 10000000;
    $smgContaPF = $contaPF->exibeDados();
    echo $smgContaPF;
    ?>
</body>

</html>