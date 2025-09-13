/* ==========================================================
   Funções de Acessibilidade
========================================================== */

/**
 * Ajusta o tamanho da fonte da página
 * @param {number} px - tamanho em pixels
 */
function setFontSize(px) {
  document.documentElement.style.fontSize = px + 'px';
}

/**
 * Alterna entre modo normal e alto contraste
 */
function toggleContrast() {
  document.body.classList.toggle('high-contrast');
}

/**
 * Aumenta o espaçamento do texto (modo leitura)
 */
function increaseSpacing() {
  document.body.classList.toggle('big');
}

/**
 * Faz rolagem suave até a seção escolhida
 * @param {string} id - ID da seção
 */
function scrollToSection(id) {
  document.getElementById(id).scrollIntoView({
    behavior: 'smooth',
    block: 'start'
  });
}

/* ==========================================================
   Síntese de Voz
========================================================== */

/**
 * Lê um texto em voz alta usando a API de síntese de voz
 * @param {string} text - Texto a ser falado
 */
function speakText(text) {
  if (!('speechSynthesis' in window)) {
    alert('Síntese de voz não suportada neste navegador.');
    return;
  }

  const u = new SpeechSynthesisUtterance(text);
  u.lang = 'pt-BR';
  u.rate = 0.9;

  window.speechSynthesis.cancel();
  window.speechSynthesis.speak(u);
}

/* ==========================================================
   Temporizador
========================================================== */

let timerInterval = null;

/**
 * Inicia o temporizador com base no valor inserido em minutos
 */
function startTimer() {
  const mins = Number(document.getElementById('timerMin').value) || 1;
  let remaining = mins * 60;

  clearInterval(timerInterval);
  updateTimerDisplay(remaining);

  timerInterval = setInterval(() => {
    remaining--;
    updateTimerDisplay(remaining);

    if (remaining <= 0) {
      clearInterval(timerInterval);
      speakText('Tempo encerrado.');
    }
  }, 1000);
}

/**
 * Atualiza o display do temporizador
 * @param {number} sec - segundos restantes
 */
function updateTimerDisplay(sec) {
  const el = document.getElementById('timerDisplay');
  el.textContent = sec <= 0
    ? 'Concluído'
    : Math.floor(sec / 60) + ':' + String(sec % 60).padStart(2, '0');
}

/* ==========================================================
   Exercícios
========================================================== */

/**
 * Inicia a contagem regressiva e fala o nome do exercício
 * @param {string} name - Nome do exercício
 */
function startExercise(name) {
  speakText('Iniciando: ' + name);

  let sec = 5;
  updateTimerDisplay(sec);

  clearInterval(timerInterval);
  timerInterval = setInterval(() => {
    sec--;
    updateTimerDisplay(sec);

    if (sec <= 0) {
      clearInterval(timerInterval);
      speakText('Começar agora.');
    }
  }, 1000);
}

/* ==========================================================
   Inicialização da Página
========================================================== */
document.addEventListener('DOMContentLoaded', () => {
  const range = document.getElementById('fontRange');
  setFontSize(range.value);
});
