<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classe abstrata no PHP</title>
</head>
<body>
    <?php 
        require './Cheque.php';
        require './ChequeComum.php';
        require './ChequeEspecial.php';
        
        //A classe abstrata nao pode ser instanciada
        //$cheque = new Cheque(300.55, "comum");
        //$msg = $cheque->verValor();
        //echo $msg;

        $chequecomum = new ChequeComum(4005.85,"Cheque comum");
        $msgChequeComum = $chequecomum->calcularJuro();
        echo $msgChequeComum;

        $chequeEspecial = new ChequeEspecial(5890.45,"Cheque especial");
        $msgChequeEspecial = $chequeEspecial->calcularJuro();
        echo $msgChequeEspecial;
    ?>
</body>
</html>