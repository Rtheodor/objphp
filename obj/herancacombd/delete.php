<?php
session_start();
//Apagar o buffer
ob_start();
//Receber o ID da URL
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
//var_dump($id);

//Verificar se o ID possui valor
if (!empty($id)) {
//Incluir os arquivos
require './Conn.php';
require './User.php';

//Instanciar a classe e criar o objeto
$deleteUser = new User();

//Enviar o ID para o atributo da classe User

    $deleteUser->id = $id;

    //Instanciar o metodo delete
    $value=$deleteUser->delete();
    if($value){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso!</p>";
        header("Location:index.php");

    }else{
        $_SESSION['msg'] = "<p style='color:red;'>Erro: Usuário não apagado com sucesso!</p>";
        header("Location:index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro: Usuário não apagado com sucesso!</p>";
    header("Location:index.php");
}
