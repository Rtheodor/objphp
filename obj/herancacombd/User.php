<?php

class User extends Conn

{
    public object $conn;
    public array $formData;
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
}
