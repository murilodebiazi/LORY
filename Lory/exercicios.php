<?php
session_start();
require_once __DIR__ . "/config/config.php";

// Verifica se o usuário está logado
if (!isset($_SESSION["id_usuario"])) {
    header("Location: login.php");
    exit;
}

// Busca os exercícios do banco
$sql = "SELECT * FROM exercicios";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercícios - Terceira Idade</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/timer.js" defer></script>
</head>
<body>
    <header>
        <h1>Exercícios Recomendados</h1>
        <a href="logout.php">Sair</a>
    </header>

    <main>
        <?php if ($result && $result->num_rows > 0): ?>
            <ul class="lista-exercicios">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li class="exercicio">
                        <h2><?= htmlspecialchars($row["nome"]) ?></h2>
                        <p><?= htmlspecialchars($row["descricao"]) ?></p>
                        <p><strong>Duração:</strong> <?= $row["duracao"] ?> segundos</p>
                        <p><strong>Nível:</strong> <?= ucfirst($row["nivel"]) ?></p>
                        <button onclick="iniciarTimer(<?= $row['duracao'] ?>)">Iniciar</button>
                        <div class="timer" id="timer-<?= $row['id'] ?>"></div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Nenhum exercício disponível.</p>
        <?php endif; ?>
    </main>
</body>
</html>
