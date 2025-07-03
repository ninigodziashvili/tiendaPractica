document.addEventListener('DOMContentLoaded', function () {
  // Actualizar año en el footer
  document.getElementById('year').textContent = new Date().getFullYear();

  // Smooth scrolling para enlaces internos
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      if (targetId === '#') return;

      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        const headerHeight = document.querySelector('.header').offsetHeight;
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - headerHeight;

        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });

  // Efecto scroll para header
  window.addEventListener('scroll', function () {
    const header = document.querySelector('.header');
    header.style.boxShadow = window.scrollY > 100 ? '0 4px 12px rgba(0, 0, 0, 0.1)' : 'none';
  });

  // Inicializar carruseles
  initCarousels();
});

function initCarousels() {
  document.querySelectorAll('.carousel-container').forEach(carousel => {
    const slides = carousel.querySelectorAll('.carousel-slide');
    if (!slides.length) return; // Sin slides → salimos

    /* ======================  BOTONES  ====================== */
    const controls = carousel.parentElement.querySelector('.carousel-controls');
    const prevBtn  = controls?.querySelector('.carousel-prev');
    const nextBtn  = controls?.querySelector('.carousel-next');

    const step = () => {
      const slideW = slides[0].getBoundingClientRect().width;
      const gap    = parseFloat(getComputedStyle(carousel).columnGap || getComputedStyle(carousel).gap || 0);
      return slideW + gap;
    };

    prevBtn?.addEventListener('click', () => {
      carousel.scrollBy({ left: -step(), behavior: 'smooth' });
    });

    nextBtn?.addEventListener('click', () => {
      carousel.scrollBy({ left:  step(), behavior: 'smooth' });
    });

    /* ======================  ARRASTRE  ====================== */
    let active = false, startX = 0, scrollStart = 0;

    const dragStart = e => {
      active      = true;
      startX      = (e.pageX ?? e.touches[0].pageX);
      scrollStart = carousel.scrollLeft;
      carousel.classList.add('dragging');
      carousel.style.scrollBehavior = 'auto';
      pauseAutoScroll();            // ⏸️  Pausamos mientras se arrastra
    };

    const dragMove = e => {
      if (!active) return;
      const x   = (e.pageX ?? e.touches[0].pageX);
      const walk = (x - startX) * 1.5;
      carousel.scrollLeft = scrollStart - walk;
    };

    const dragEnd = () => {
      active = false;
      carousel.classList.remove('dragging');
      carousel.style.scrollBehavior = 'smooth';
      resumeAutoScroll();           // ▶️  Reanudamos al soltar
    };

    carousel.addEventListener('pointerdown', dragStart,  { passive: true });
    window.addEventListener  ('pointermove', dragMove,  { passive: true });
    window.addEventListener  ('pointerup',   dragEnd,   { passive: true });

    /* ======================  AUTOSCROLL  ====================== */
    let autoId;

    const setupAutoScroll = (delay = 3500) => {
      autoId = setInterval(() => {
        const max = carousel.scrollWidth - carousel.clientWidth;
        const atEnd = carousel.scrollLeft >= max - 2;     // márgen de seguridad
        carousel.scrollBy({
          left: atEnd ? -max : step(),                    // si llegó al final → vuelve al inicio
          behavior: 'smooth'
        });
      }, delay);
    };

    const pauseAutoScroll  = () => clearInterval(autoId);
    const resumeAutoScroll = () => {
      clearInterval(autoId);
      setupAutoScroll();
    };

    // Opcional: pausa cuando el ratón entra y reanuda al salir (evita marear al usuario)
    carousel.addEventListener('mouseenter', pauseAutoScroll);
    carousel.addEventListener('mouseleave', resumeAutoScroll);

    setupAutoScroll();  // ▶️ ¡Listo!  Arranca el auto‑scroll
  });
}