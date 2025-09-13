<?php
require_once "Usuario.php";

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "LORY";

public void salvar(Usuario $usuario)
{
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // prepare and bind
    $stmt = $conn->prepare("INSERT INTO Usuario (nomeUsuario, emailUsuario, senhaUsuario) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $email);

    // set parameters and execute
    $nome = $usuario->getNome;
    $email = $usuario->getEmail;
    $senha = $usuario->getSenha;

    $stmt->execute()

    echo "New records created successfully";

    $stmt->close();
    $conn->close();

    return $usuario;
}

public void deletar(int $idUsuario)
{
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM Usuario WHERE id = ?");
    $stmt->bind_param("sss", $id);

    $id = $idUsuario;

    $stmt->execute();

    echo "Records deleted successfully";

    $stmt->close();
    $conn->close();
}
?>