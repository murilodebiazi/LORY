<?php
session_start();
require_once __DIR__ . "/config/config.php";

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome  = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $senha = $_POST["password"];
    $senhaConfirm = $_POST["passwordConfirm"];

    // Validação simples de senha
    if ($senha !== $senhaConfirm) {
        $msg = "As senhas não coincidem.";
    } else {
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha_hash);

        if ($stmt->execute()) {
            $msg = "Cadastro realizado com sucesso! <a href='login.php'>Entrar</a>";
        } else {
            $msg = "Erro ao cadastrar: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/styles.css">
   <title>Cadastro - Lory Portal</title>
</head>
<body>

<div class="login-container">
  <h1>Criar Conta</h1>
    <header>
        <h1 style="color:#4A90E2; font-family: 'Segoe UI', sans-serif; text-shadow: 2px 2px 8px #aaa;">Crie sua conta no Lory!</h1>
    </header>

  <form action="cadastro.php" method="post">
    <div>
      <input type="text" name="nome" placeholder="Nome" required>
    </div>
    <div>
      <input type="email" name="email" placeholder="Email" required>
    </div>
    <div>
      <input type="password" name="senha" placeholder="Senha" required>
    </div>
    <div>
      <input type="password" name="senha_confirm" placeholder="Confirmar Senha" required>
    </div>
    <div>
      <input type="submit" value="Cadastrar">
    </div>
  </form>

  <p>Já tem conta? <a href="login.php">Entre aqui</a></p>
</div>

</body>
</html>
