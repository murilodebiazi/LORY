<?php
session_start();
require_once "config.php";

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        $msg = "Cadastro realizado com sucesso! <a href='login.php'>Entrar</a>";
    } else {
        $msg = "Erro ao cadastrar: " . $stmt->error;
    }
    $stmt->close();
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <title>Cadastro - Exercícios Terceira Idade</title>
</head>
<body>
  <h2>Criar Conta</h2>
  <form method="post">
    <label>Nome:<br><input type="text" name="nome" required></label><br>
    <label>Email:<br><input type="email" name="email" required></label><br>
    <label>Senha:<br><input type="password" name="senha" required></label><br>
    <button type="submit">Cadastrar</button>
  </form>
  <p><?= $msg ?></p>
  <p>Já tem conta? <a href="login.php">Entre aqui</a></p>
</body>
</html>
