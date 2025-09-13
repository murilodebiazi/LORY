<?php
// config.php (conexão)
$mysqli = new mysqli('localhost', 'root', '', 'LORY'); // ajuste o DB name
if ($mysqli->connect_errno) {
    die("Falha ao conectar ao MySQL: " . $mysqli->connect_error);
}

// Buscar exercícios
$result = $mysqli->query("SELECT * FROM treinos ORDER BY nome ASC");
$exercicios = [];
if($result){
    while($row = $result->fetch_assoc()){
        $exercicios[] = $row;
    }
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Soluções para a Terceira Idade — Exercícios Assistidos</title>
  <link rel="stylesheet" href="assets\css\styles.css">
</head>
<body>
  <header role="banner">
    <div class="container">
      <h1>Soluções para a Terceira Idade</h1>
      <p class="lead">Site de apoio com exercícios simples, pensados para segurança, mobilidade e bem-estar dos idosos — tema Hackaton</p>
      <nav role="navigation" aria-label="Menu principal">
        <button class="btn" onclick="scrollToSection('exercicios')">Exercícios</button>
        <button class="btn" onclick="scrollToSection('rotina')">Rotina</button>
        <button class="btn" onclick="scrollToSection('ajuda')">Ajuda</button>
      </nav>
    </div>
  </header>

  <main class="container" role="main">
    <section class="hero" aria-labelledby="intro">
      <div class="card">
        <h2 id="intro">Exercícios seguros e guiados</h2>
        <p style="color:var(--muted)">Passo a passo com sugestões de intensidade, contagem e variações para quem tem mobilidade reduzida. Sempre consulte um profissional de saúde antes de começar.</p>
        <div style="margin-top:12px" class="controls" aria-hidden="false">
          <div>
            <label for="fontRange">Tamanho do texto</label>
            <input id="fontRange" type="range" min="16" max="28" value="18" oninput="setFontSize(this.value)">
          </div>
          <button class="control-btn" onclick="toggleContrast()" aria-pressed="false">Alto contraste</button>
          <button class="control-btn" onclick="increaseSpacing()">Aumentar espaçamento</button>
          <button class="control-btn" onclick="window.print()">Imprimir</button>
        </div>
        <div style="margin-top:12px;color:var(--muted)">
          <strong>Dica:</strong> Faça os exercícios em uma cadeira firme e estável; tenha alguém por perto caso necessário.
        </div>
      </div>

      <aside style="width:320px;min-width:240px">
        <div style="background:linear-gradient(180deg,#fff,#f0f7ff);padding:14px;border-radius:12px;box-shadow:0 8px 20px rgba(11,20,30,0.06)">
          <h3 style="margin-top:0">Temporizador</h3>
          <div style="display:flex;gap:8px;align-items:center">
            <input type="number" id="timerMin" value="1" min="0" style="width:72px;padding:8px;border-radius:8px;border:1px solid #dbeafe"> min
            <button class="control-btn" onclick="startTimer()">Iniciar</button>
          </div>
          <div id="timerDisplay" aria-live="polite" style="margin-top:10px;font-weight:600">Pronto</div>
        </div>
      </aside>
    </section>

    <section id="exercicios" style="margin-top:22px">
      <h2>Exercícios recomendados</h2>
      <p style="color:var(--muted)">Cada exercício mostra variações fáceis e seguras — clique em "Iniciar" para ouvir instruções ou cronometrar.</p>

      <div class="grid">
        <?php foreach($exercicios as $ex): ?>
          <article class="exercise" aria-labelledby="ex<?= $ex['id'] ?>">
            <h3 id="ex<?= $ex['id'] ?>"><?= htmlspecialchars($ex['nome']) ?></h3>
            <p><?= htmlspecialchars($ex['descricao']) ?></p>
            <?php if(!empty($ex['musculoTrabalhado'])): ?>
              <p style="color:var(--muted); font-size:14px"><strong>Músculo trabalhado:</strong> <?= htmlspecialchars($ex['musculoTrabalhado']) ?></p>
            <?php endif; ?>
            <ul class="steps">
              <li>Nível: <?= htmlspecialchars($ex['nivel']) ?></li>
              <li>Dificuldade: <?= htmlspecialchars($ex['dificuldade']) ?>/5</li>
            </ul>
            <div style="display:flex;gap:8px;margin-top:8px">
              <?php if(!empty($ex['video'])): ?>
                <a class="control-btn" href="<?= htmlspecialchars($ex['video']) ?>" target="_blank">Assistir vídeo</a>
              <?php endif; ?>
              <button class="control-btn" onclick="startExercise('<?= addslashes($ex['nome']) ?>')">Iniciar</button>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="rotina" style="margin-top:22px">
      <h2>Exemplo de rotina semanal (leve)</h2>
      <ol>
        <li>Segunda, Quarta e Sexta: Alongamento + Fortalecimento de Pernas (15–20 min)</li>
        <li>Terça e Quinta: Mobilidade de Braços + Respiração (10–15 min)</li>
        <li>Sábado: Caminhada leve (20–30 min) se possível</li>
        <li>Domingo: Descanso e alongamento suave</li>
      </ol>
    </section>

    <section id="ajuda" style="margin-top:22px">
      <h2>Ajuda e segurança</h2>
      <p style="color:var(--muted)">Antes de iniciar fale com um médico. Interrompa o exercício ao sentir dor, tontura, falta de ar intensa ou outra reação incomum.</p>
      <p>Contato de emergência (exemplo): <strong>Telefone: 190</strong></p>
    </section>
  </main>

  <footer>
    <div class="container">
      <small>Feito para o Hackaton "Soluções para a Terceira Idade" — personalize este template conforme as necessidades do público.</small>
    </div>
  </footer>

  <script src="assets\js\script.js"></script>
</body>
</html>