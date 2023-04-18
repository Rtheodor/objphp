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
    <title>Edit</title>
</head>

<body>

    <a href="index.php">Listar</a><br>
    <a href="create.php">Cadastrar</a><br><br>
    <h1>Editar o usuários</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

     //Incluir os arquivos
     require './Conn.php';
     require './User.php';
     
      //Receber o dados do formulario
      $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
      
      //Verificar se o usuario clicou no botao editar
        if(!empty($formData['SendEditUser']))
        {
            var_dump($formData);
            //Estancio o User para dai crirar um objeto 
            $editUser = new User();

            //formData que se encontra no arquivo User
             $editUser->formData = $formData;
            
             //Nesta parte verificamos se o edit será true or false
             $value = $editUser->edit();
             if($value){
                $_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso!</p>";
                header("Location:index.php");
             }else{
                echo "<p style='color:red;'>Erro: Usuário não editado com sucesso!</p>";
                
             }
        }



    //Verificando se o id possui valor
    if (!empty($id)) {
              
        //Instanciar classe e cria o objeto
        $viewUser = new User();

        //Enviando o id para o atributo id da classe User
        $viewUser->id = $id;

        //Estanciar o metodo visualizar
        $velueUser = $viewUser->view();
        //var_dump($velueUser);
        //Estraindo informações de um array
        //var_dump($velueUser);
        extract($velueUser);

    ?>
        <form name="EditUser" method="POST" action="">
            <input type="hidden" nome="id" value="<?php echo $id; ?>" />
            <label>Nome: </label>
            <input type="text" name="name" placeholder="Nome completo" value="<?php echo $name; ?>" required /><br><br>

            <label>Email: </label>
            <input type="email" name="email" placeholder="Melhor Email" value="<?php echo $email; ?>" required /><br><br>

            <label>Pais</label>
            <!--<input type="select" name="pais" value="<//?php echo $pais; ?>"-->
            <select name="pais" required>
                <option value="">Selecione</option>
                <option value="Brasil">Brasil</option>
                <option value="Canada">Canada</option>
                <option value="Mexico">Mexico</option>
            </select>
            </input><br><br>
           
            <input type="submit" value="Editar" name="SendEditUser" />

        </form>

    <?php
    } else {   //Session tem o start no inicio do codigo
        $_SESSION['msg'] = "<p style='color:red;'>Erro: Usuário não existe</p>";
        header("Location:index.php");
    }



    ?>

</body>

</html>