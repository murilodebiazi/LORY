<?php
class Treino{
    private $nome;
    private $nivel;
    private $dificuldade;
    private $musculoTrabalho;
    private $descricao;
    private $video;  

    public function ___construct(String $nome, String $nivel, String $dificuldade, String $musculoTrabalho,
    String $descricao, String $video)
    {
        $this->nome = $nome
        $this->nivel = $nivel;
        $this->senha = $dificuldade;    
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