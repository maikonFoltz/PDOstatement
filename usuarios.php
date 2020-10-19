<?php

class Usuarios{
    
    private $db;
    public function __construct(){
        
        try{
            $this->db = new PDO("mysql:dbname=comentarios;host=localhost:8889", "admin", "admin");
        }catch(PDOException $e){
            echo "ERRO: ".$e->getMessage();
        }        
    }

    public function selecionar($id){
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $dados = array();

        if($sql->rowCount() > 0){
            $dados = $sql->fetch();
        }
        return $dados;
    }

    public function inserir($nome, $email, $senha){
        $sql = $this->db->prepare("INSERT INTO usuarios SET nome = :nome, email = :email, senha = :senha");
        $sql->bindParam(":nome", $nome);
        $sql->bindParam(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
    }

    public function atualizar($nome, $email, $senha, $id){
        $sql = $this->db->prepare("UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?");
        $sql->execute(array($nome, $email, md5($senha), $id));
    }
}