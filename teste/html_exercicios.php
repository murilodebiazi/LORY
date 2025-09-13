<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Soluções para a Terceira Idade — Exercícios Assistidos</title>
  <meta name="description" content="Site simples de ajuda com exercícios para idosos — parte do tema Hackaton 'Soluções para a Terceira Idade'" />
  <style>
    :root{
      --bg:#f7fbff; --card:#ffffff; --accent:#0b74da; --text:#0b1b2b; --muted:#4b5563;
      --radius:12px; --gap:18px;
    }
    *{box-sizing:border-box}
    body{font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; background:var(--bg); color:var(--text); margin:0; line-height:1.45}
    header{background:linear-gradient(90deg,var(--accent),#0b5fb0); color:#fff; padding:28px 18px}
    .container{max-width:980px;margin:18px auto;padding:0 16px}
    h1{font-size:28px;margin:0 0 6px}
    p.lead{margin:0;font-size:16px;color: #e6f0ff}

    nav{display:flex;gap:10px;margin-top:12px;flex-wrap:wrap}
    .btn{background:rgba(255,255,255,0.12);border:none;color:#fff;padding:8px 12px;border-radius:10px;font-size:16px;cursor:pointer}

    main{padding:20px 0}
    .hero{display:flex;gap:18px;align-items:center}
    .hero .card{background:var(--card);padding:18px;border-radius:var(--radius);box-shadow:0 6px 18px rgba(11,20,30,0.06);flex:1}

    .controls{display:flex;gap:8px;align-items:center}
    .control-btn{padding:8px 12px;border-radius:8px;border:1px solid #dbeafe;background:white;cursor:pointer}

    .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:var(--gap);margin-top:18px}
    .exercise{background:var(--card);padding:16px;border-radius:12px;box-shadow:0 6px 16px rgba(11,20,30,0.04)}
    .exercise h3{margin:0 0 8px;font-size:18px}
    .exercise p{margin:0 0 10px;color:var(--muted)}
    .steps{list-style:none;padding:0;margin:0}
    .steps li{padding:8px 10px;border-radius:8px;background:#f3f6fb;margin-bottom:8px}

    footer{padding:20px 0;color:var(--muted);text-align:center}

    /* accessibility helpers */
    .big {font-size:20px}
    .high-contrast{background:#000;color:#fff}

    @media (max-width:640px){h1{font-size:22px}}
  </style>
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
        <article class="exercise" aria-labelledby="ex1">
          <h3 id="ex1">1 — Alongamento Sentado</h3>
          <p>Alongamentos suaves para pescoço, ombros e coluna enquanto sentado.</p>
          <ul class="steps">
            <li>Respire fundo — 3 vezes.</li>
            <li>Incline a cabeça para um lado — mantenha 10s — volte ao centro.</li>
            <li>Gire os ombros para trás 5x, depois para frente 5x.</li>
          </ul>
          <div style="display:flex;gap:8px;margin-top:8px">
            <button class="control-btn" onclick="speakText('Faça respirações profundas. Incline a cabeça devagar.')">Ouvir</button>
            <button class="control-btn" onclick="startExercise('Alongamento Sentado')">Iniciar</button>
          </div>
        </article>

        <article class="exercise" aria-labelledby="ex2">
          <h3 id="ex2">2 — Fortalecimento de Pernas (em pé, apoio na cadeira)</h3>
          <p>Melhora equilíbrio e força das pernas — segure a cadeira para apoio.</p>
          <ul class="steps">
            <li>Levante o calcanhar, fique na ponta do pé — 5 repetições.</li>
            <li>Levante um pé à frente (apenas um leve levantamento) — 8 repetições por perna.</li>
            <li>Faça devagar, respire normalmente.</li>
          </ul>
          <div style="display:flex;gap:8px;margin-top:8px">
            <button class="control-btn" onclick="speakText('Segure a cadeira com as duas mãos e suba os calcanhares devagar.')">Ouvir</button>
            <button class="control-btn" onclick="startExercise('Fortalecimento de Pernas')">Iniciar</button>
          </div>
        </article>

        <article class="exercise" aria-labelledby="ex3">
          <h3 id="ex3">3 — Mobilidade de Braços (sentado)</h3>
          <p>Exercícios leves para ombro e cotovelo — bom para movimentos do dia a dia.</p>
          <ul class="steps">
            <li>Estenda os braços à frente e faça círculos pequenos — 10x.</li>
            <li>Eleve os braços lateralmente até a altura dos ombros — 8x.</li>
          </ul>
          <div style="display:flex;gap:8px;margin-top:8px">
            <button class="control-btn" onclick="speakText('Faça movimentos suaves, sem forçar até sentir dor.')">Ouvir</button>
            <button class="control-btn" onclick="startExercise('Mobilidade de Braços')">Iniciar</button>
          </div>
        </article>

        <article class="exercise" aria-labelledby="ex4">
          <h3 id="ex4">4 — Respiração e Relaxamento</h3>
          <p>Exercício para reduzir ansiedade e melhorar oxigenação.</p>
          <ul class="steps">
            <li>Inspire pelo nariz por 4 segundos.</li>
            <li>Segure por 2 segundos, expire pela boca por 6 segundos.</li>
            <li>Repita 5 vezes.</li>
          </ul>
          <div style="display:flex;gap:8px;margin-top:8px">
            <button class="control-btn" onclick="speakText('Inspire suave. Segure um pouco. Expire devagar.')">Ouvir</button>
            <button class="control-btn" onclick="startExercise('Respiração e Relaxamento')">Iniciar</button>
          </div>
        </article>
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

  <script>
    // Accessibility helpers
    function setFontSize(px){document.documentElement.style.fontSize = px + 'px'}
    function toggleContrast(){document.body.classList.toggle('high-contrast')}
    function increaseSpacing(){document.body.classList.toggle('big')}
    function scrollToSection(id){document.getElementById(id).scrollIntoView({behavior:'smooth',block:'start'})}

    // Speech helper (simple)
    function speakText(text){
      if(!('speechSynthesis' in window)){alert('Síntese de voz não suportada neste navegador.');return}
      const u = new SpeechSynthesisUtterance(text);
      u.lang = 'pt-BR'; u.rate = 0.9; window.speechSynthesis.cancel(); window.speechSynthesis.speak(u);
    }

    // Timer
    let timerInterval = null;
    function startTimer(){
      const mins = Number(document.getElementById('timerMin').value) || 1;
      const total = mins * 60; let remaining = total;
      clearInterval(timerInterval);
      updateTimerDisplay(remaining);
      timerInterval = setInterval(()=>{
        remaining--;
        updateTimerDisplay(remaining);
        if(remaining<=0){clearInterval(timerInterval); speakText('Tempo encerrado.');}
      },1000);
    }
    function updateTimerDisplay(sec){
      const el = document.getElementById('timerDisplay');
      if(sec<=0) el.textContent = 'Concluído';
      else el.textContent = Math.floor(sec/60) + ':' + String(sec%60).padStart(2,'0');
    }

    // Start exercise (plays audio + small countdown)
    function startExercise(name){
      speakText('Iniciando: ' + name);
      // short 5s prep
      let sec = 5; updateTimerDisplay(sec); clearInterval(timerInterval);
      timerInterval = setInterval(()=>{sec--; updateTimerDisplay(sec); if(sec<=0){clearInterval(timerInterval); speakText('Começar agora.');}},1000);
    }

    // initial font size fix from range
    document.addEventListener('DOMContentLoaded',()=>{
      const r = document.getElementById('fontRange'); setFontSize(r.value);
    });
  </script>
</body>
</html>
