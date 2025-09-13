<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
$nome = $_SESSION["nome"];
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <title>Exercícios para Idosos</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <h1>Bem-vindo, <?= htmlspecialchars($nome) ?>!</h1>
    <nav>
      <a href="logout.php">Sair</a>
    </nav>
  </header>

  <?php include "html_exercicios.php"; // aqui colocamos o HTML pronto dos exercícios ?>
</body>
</html>