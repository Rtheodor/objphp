<?php
session_start();

ob_start();

//Receber o id do usuario
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Herança / BD</title>
</head>

<body>

    <a href="index.php">Listar</a><br>
    <a href="create.php">Cadastrar</a><br><br>
    <h1>Detalhes do Usuários</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    //Verificando se o id possui valor
    if (!empty($id)) 
    {
        //Incluir os arquivos
        require './Conn.php';
        require './User.php';
        //Instanciar classe e criar o objeto
        $viewUser = new User();

        //Enviando o id para o atributo id da classe User
        $viewUser->id = $id;

        //Estanciar o metodo visualizar
        $velueUser = $viewUser->view();
        //var_dump($velueUser);
        //Estraindo informações de um array
        extract($velueUser);
        
        echo "ID do usuário : $id<br>";
        echo "Nome : $name <br>";
        echo "Email : $email <br>";
        echo "Pais : $pais <br>";
        //Date para informar a dia, mes, ano, Horas,minutos e segundos 
        echo "Cadastrado :".date('d/m/Y / H:i:s', strtotime($created))."<br>";

        //Caso a coluna modified esteja vazia(empty) deixa em branco.
        echo "Editado :"; 
        if(!empty($modified))
        {
            echo date('d/m/Y / H:i:s', strtotime($modified));
        }else{
          echo "<br>";
        }
    }else 
    {   //Session tem o start no inicio do codigo
        $_SESSION['msg'] = "<p style='color:red;'>Erro: Usuário não existe</p>";
        header("Location:index.php");
    }



    ?>

</body>

</html>