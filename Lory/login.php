<?php
session_start();
require_once __DIR__ . "/config/config.php";

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $senha = trim($_POST["senha"]);

    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nome, $senha_hash);
        $stmt->fetch();

        if (password_verify($senha, $senha_hash)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["nome"] = $nome;
            header("Location: home.php");
            exit;
        } else {
            $msg = "Senha incorreta.";
        }
    } else {
        $msg = "Usuário não encontrado.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/styles.css">
   <title>Login - Lory Portal</title>
</head>
<body>

<div class="login-container">
  <header>
    <h1 style="color:#4A90E2; font-family: 'Segoe UI', sans-serif; text-shadow: 2px 2px 8px #aaa;">Bem-vindo ao Login do Lory!</h1>
  </header>
  <h1>Entrar</h1>

  <form action="login.php" method="post">
    <div>
      <input type="email" name="email" placeholder="Email" required>
    </div>
    <div>
      <input type="password" name="senha" placeholder="Senha" required>
    </div>
    <div>
      <input type="submit" value="Entrar">
    </div>
  </form>

  <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
</div>

</body>
</html>