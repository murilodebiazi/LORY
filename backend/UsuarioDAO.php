<?php
require_once "Database.php";
require_once "Usuario.php";

class UsuarioDAO
{
  private $conexao 

  public function __construct()
    {
        $database = new Database();
        $this->conexao = $database->conexaoect();
    } 

  public function (Usuario $usuario)
    {
        $sql = "INSERT INTO Usuario (nomeUsuario, emailUsuario, senhaUsuario) VALUES (:name, :email, :senha)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':name', $usuario->getNome());
        $stmt->bindParam(':email', $usuario->getEmail());
        $stmt->bindParam(':senha', $usuario->getSenha());
        return $stmt->execute();
    }

    public function read()
    {
        $sql = "SELECT * FROM Usuario";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function update(Usuario $usuario)
    {
        $sql = "UPDATE Usuario SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':name', $usuario->getNome());
        $stmt->bindParam(':email', $usuario->getEmail());
        $stmt->bindParam(':senha', $usuario->getSenha());
        return $stmt->execute();
    }

    public function delete($idUsuario)
    {
        $sql = "DELETE FROM Usuario WHERE id = :id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(':id', $idUsuario);
        return $stmt->execute();
    }

}
?>