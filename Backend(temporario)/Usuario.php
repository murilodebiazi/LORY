<?php
class Usuario{
    private $nome;
    private $email;
    private $senha;  

    public function ___construct(String $nome, String $email, String $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;    
    }

    public function setNome($nome) : void
    {
        $this->nome = $nome;
    }

    public function getNome() : String
    {
        return this->$nome;
    }

    public function setEmail($email) : void
    {
        $this->email = $email;
    }

    public function getEmail() : String
    {
        $this->email = $email;
    }

    public function setSenha($senha) : void
    {
        $this->senha = $senha;
    }

    public function getSenha() : String
    {
        $this->senha= $senha;
    }

}