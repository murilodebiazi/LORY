<?php
session_start();
require_once "config.php";

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
            header("Location: Home.php");
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
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <title>Login - Exercícios Terceira Idade</title>
</head>
<body>
  <h2>Entrar</h2>
  <form method="post">
    <label>Email:<br><input type="email" name="email" required></label><br>
    <label>Senha:<br><input type="password" name="senha" required></label><br>
    <button type="submit">Entrar</button>
  </form>
  <p><?= $msg ?></p>
  <p>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
</body>
</html>