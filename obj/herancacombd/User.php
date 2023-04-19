<?php

class User extends Conn

{
    public object $conn;
    public array $formData;

    public int $id;
    public function list(): array
    {
        $this->conn = $this->connectDb();
        $query_users = "SELECT id, name, email, pais FROM users ORDER BY id DESC LIMIT 40";
        $result_users = $this->conn->prepare($query_users);
        $result_users->execute();
        $retorno = $result_users->fetchAll();
        //var_dump($retorno);
        return $retorno;
    }
    public function create(): bool
    {
        //var_dump($this->formData);
        $this->conn = $this->connectDb();
       $query_user = "INSERT INTO users(name, email, pais, created) VALUES(:name, :email,:pais, NOW())";
        $add_user = $this->conn->prepare($query_user);
        $add_user->bindParam(':name', $this->formData['name']);
        $add_user->bindParam(':email', $this->formData['email']);
        $add_user->bindParam(':pais', $this->formData['pais']);
        $add_user->execute();

        if($add_user->rowCount()){
            return true;
        }else {
            return false;
        }

    }
    public function view()
    {
       $this->conn = $this->connectDb();
       $query_user = "SELECT id, name, email,pais, created, modified FROM users WHERE id = :id LIMIT 1";
       $result_user = $this->conn->prepare($query_user);
       $result_user->bindParam(':id', $this->id);
       $result_user->execute();
       $value = $result_user->fetch();
       return $value;

    }
    public function edit():bool
    {
        var_dump($this->formData);
        $this->conn = $this->connectDb();
        //criando a query e setando quais colunas devem ser usadas
        $query_user = "UPDATE users SET name =:name, email =:email, pais =:pais, modified=NOW()
        WHERE id=:id";
        //preparando a conexion
        $edit_user = $this->conn->prepare($query_user);
        //Substituir links pelo que tem em formData
        $edit_user->bindParam(':name',$this->formData['name']);
        $edit_user->bindParam(':email',$this->formData['email']);
        $edit_user->bindParam(':pais',$this->formData['pais']);
        $edit_user->bindParam(':id',$this->formData['id']);
        $edit_user->execute();

        if($edit_user->rowCount()){
            return true;
        }else{
            return false;
        }

    }

    public function delete() : bool
    {
        $this->conn = $this->connectDb();
        $query_user = "DELETE FROM users WHERE id=:id LIMIT 1";
        $delete_user = $this->conn->prepare($query_user);
        $delete_user ->bindParam(':id', $this->id);
        $value = $delete_user->execute();
        return $value;
    }
}
