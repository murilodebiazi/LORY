<?php
require_once "Conexao.php";
require_once "Usuario.php";

class UsuarioDAO {

    public function criar(Usuario $usuario) {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":nome", $usuario->getNome());
        $stmt->bindValue(":email", $usuario->getEmail());
        // Boa prática: armazenar senha com hash
        $stmt->bindValue(":senha", password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT * FROM usuarios";
        $stmt = Conexao::getConexao()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM usuarios WHERE idUsuario = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($dados) {
            return new Usuario($dados['nome'], $dados['email'], $dados['senha'], $dados['idUsuario']);
        }
        return null;
    }

    public function atualizar(Usuario $usuario) {
        $sql = "UPDATE usuarios SET nome = :nome, email = :email, senha = :senha WHERE idUsuario = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":nome", $usuario->getNome());
        $stmt->bindValue(":email", $usuario->getEmail());
        $stmt->bindValue(":senha", password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        $stmt->bindValue(":id", $usuario->getIdUsuario());
        return $stmt->execute();
    }

    public function deletar($id) {
        $sql = "DELETE FROM usuarios WHERE idUsuario = :id";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }
}
?>