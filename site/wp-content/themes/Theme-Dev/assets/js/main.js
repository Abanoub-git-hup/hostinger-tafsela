// main.js | Plexify Digital Marketing Agency | Updated: 2026-04-03
// Fixes: 1-magnetic CTA, 7-scroll-driven work, 10-rocket timeline,
//        11-blog sticky stack, 12-scroll progress ring button

'use strict';

const qs   = (sel, ctx = document) => ctx.querySelector(sel);
const qsa  = (sel, ctx = document) => [...ctx.querySelectorAll(sel)];
const clamp = (v, mn, mx) => Math.min(Math.max(v, mn), mx);

/* ================================================================
   1. STICKY HEADER
   ================================================================ */
(function initHeader() {
  const header = qs('#site-header');
  if (!header) return;
  const update = () => header.classList.toggle('scrolled', window.scrollY > 60);
  window.addEventListener('scroll', update, { passive: true });
  update();
})();

/* ================================================================
   2. SCROLL-TO-TOP + PROGRESS RING  ← Fix 12
      SVG ring fills as user scrolls; label shows % while scrolling.
   ================================================================ */
(function initScrollTopProgress() {
  const btn   = qs('#scroll-top');
  const fill  = qs('#scroll-top-fill');
  const label = qs('#scroll-top-pct');
  if (!btn) return;

  const CIRC = 2 * Math.PI * 24; // r=24 → ≈150.8

  const update = () => {
    const scrollable = document.documentElement.scrollHeight - window.innerHeight;
    const progress   = scrollable > 0 ? window.scrollY / scrollable : 0;
    const pct        = Math.round(progress * 100);

    btn.classList.toggle('visible', pct > 4);

    if (fill)  fill.style.strokeDashoffset  = CIRC * (1 - progress);
    if (label) label.textContent = (pct > 0 && pct < 100) ? pct + '%' : '↑';
  };

  window.addEventListener('scroll', update, { passive: true });
  update();

  btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
})();

/* ================================================================
   3. INTERSECTION OBSERVER — .js-reveal
   ================================================================ */
(function initReveal() {
  const items = qsa('.js-reveal');
  if (!items.length) return;

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      const siblings = qsa('.js-reveal', entry.target.parentElement);
      entry.target.style.transitionDelay = `${siblings.indexOf(entry.target) * 80}ms`;
      entry.target.classList.add('revealed');
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  items.forEach(el => observer.observe(el));
})();

/* ================================================================
   4. ANIMATED COUNTERS
   ================================================================ */
(function initCounters() {
  const stats = qsa('.about__stat[data-count]');
  if (!stats.length) return;

  const easeOut = t => 1 - Math.pow(1 - t, 3);

  const animate = el => {
    const target = parseInt(el.dataset.count, 10);
    const numEl  = qs('.about__stat-num', el);
    const label  = numEl.getAttribute('aria-label') || '';
    const suffix = label.includes('k') ? 'k' : label.includes('+') ? '+' : '';
    const dur    = 1800;
    let start    = null;

    const step = ts => {
      if (!start) start = ts;
      const p = Math.min((ts - start) / dur, 1);
      numEl.textContent = Math.round(easeOut(p) * target) + suffix;
      if (p < 1) requestAnimationFrame(step);
    };
    requestAnimationFrame(step);
  };

  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) { animate(e.target); obs.unobserve(e.target); } });
  }, { threshold: 0.5 });
  stats.forEach(el => obs.observe(el));
})();

/* ================================================================
   5. MAGNETIC "LET'S TALK" BUTTON  ← Fix 1
      Pulls toward cursor within hitbox, snaps back on leave.
   ================================================================ */
(function initMagnetic() {
  const wraps = qsa('.js-magnetic');
  if (!wraps.length || window.matchMedia('(pointer:coarse)').matches) return;

  wraps.forEach(wrap => {
    const strength = parseFloat(wrap.dataset.strength) || 30;
    const link     = wrap.querySelector('a, button');
    if (!link) return;

    let raf = null;

    wrap.addEventListener('mousemove', e => {
      const r  = wrap.getBoundingClientRect();
      const dx = e.clientX - (r.left + r.width  / 2);
      const dy = e.clientY - (r.top  + r.height / 2);
      if (raf) cancelAnimationFrame(raf);
      raf = requestAnimationFrame(() => {
        link.style.transform = `translate(${dx * strength / 100}px, ${dy * strength / 100}px)`;
      });
    });

    wrap.addEventListener('mouseleave', () => {
      if (raf) cancelAnimationFrame(raf);
      link.style.transition = 'transform 0.5s cubic-bezier(0.22,1,0.36,1)';
      link.style.transform  = 'translate(0,0)';
      setTimeout(() => { link.style.transition = ''; }, 520);
    });
  });
})();

/* ================================================================
   6. WORK SECTION — SCROLL-DRIVEN HORIZONTAL PAN  ← Fix 7
      Outer element is 500vh tall; inner sticky at 100vh.
      JS maps page-scroll progress → translateX on the track.
   ================================================================ */
(function initWorkScrollDriven() {
  const outer    = qs('#work-sticky-outer');
  const track    = qs('#work-track');
  const fill     = qs('#work-progress-fill');
  const pctLabel = qs('#work-progress-pct');
  if (!outer || !track) return;

  const CIRC = 2 * Math.PI * 18;
  let raf    = null;

  const update = () => {
    const outerRect  = outer.getBoundingClientRect();
    const outerH     = outer.offsetHeight;
    const viewH      = window.innerHeight;
    const scrolled   = clamp(-outerRect.top, 0, outerH - viewH);
    const totalRange = outerH - viewH;
    const progress   = totalRange > 0 ? scrolled / totalRange : 0;

    const maxShift = track.scrollWidth - window.innerWidth;
    track.style.transform = `translateX(-${Math.max(0, progress * maxShift)}px)`;

    if (fill)     fill.style.strokeDashoffset = CIRC * (1 - progress);
    if (pctLabel) pctLabel.textContent = Math.round(progress * 100) + '%';
    raf = null;
  };

  const onScroll = () => { if (raf) cancelAnimationFrame(raf); raf = requestAnimationFrame(update); };
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', update);
  update();
})();

/* ================================================================
   7. TESTIMONIAL SLIDER
   ================================================================ */
(function initTestimonials() {
  const slides  = qsa('.testimonial-slide');
  const dots    = qsa('.testimonials__dot');
  const prevBtn = qs('#prev-testimonial');
  const nextBtn = qs('#next-testimonial');
  if (!slides.length) return;

  let current = 0;
  let timer   = null;
  const DELAY = 5000;

  const goTo = idx => {
    slides[current].classList.remove('active');
    dots[current]?.classList.remove('active');
    dots[current]?.setAttribute('aria-selected', 'false');
    current = (idx + slides.length) % slides.length;
    slides[current].classList.add('active');
    dots[current]?.classList.add('active');
    dots[current]?.setAttribute('aria-selected', 'true');
  };

  const startAuto = () => { clearInterval(timer); timer = setInterval(() => goTo(current + 1), DELAY); };
  prevBtn?.addEventListener('click', () => { goTo(current - 1); startAuto(); });
  nextBtn?.addEventListener('click', () => { goTo(current + 1); startAuto(); });
  dots.forEach((dot, i) => dot.addEventListener('click', () => { goTo(i); startAuto(); }));
  startAuto();
})();

/* ================================================================
   8. FAQ ACCORDION
   ================================================================ */
(function initFaq() {
  const btns = qsa('.faq__q');
  if (!btns.length) return;

  btns.forEach(btn => {
    btn.addEventListener('click', () => {
      const isOpen = btn.getAttribute('aria-expanded') === 'true';
      btns.forEach(other => {
        if (other === btn) return;
        other.setAttribute('aria-expanded', 'false');
        qs('#' + other.getAttribute('aria-controls'))?.classList.add('faq__a--closed');
        const ic = qs('.faq__icon', other); if (ic) ic.textContent = '▼';
      });
      btn.setAttribute('aria-expanded', String(!isOpen));
      qs('#' + btn.getAttribute('aria-controls'))?.classList.toggle('faq__a--closed', isOpen);
      const ic = qs('.faq__icon', btn); if (ic) ic.textContent = isOpen ? '▼' : '▲';
    });
  });
})();

/* ================================================================
   9. MARQUEE — pause on hover
   ================================================================ */
(function initMarquee() {
  const inner = qs('.marquee__inner');
  const wrap  = inner?.closest('.marquee');
  if (!wrap) return;
  wrap.addEventListener('mouseenter', () => inner.style.animationPlayState = 'paused');
  wrap.addEventListener('mouseleave', () => inner.style.animationPlayState = 'running');
})();

/* ================================================================
   10. HERO PARALLAX — deco elements follow mouse
   ================================================================ */
(function initHeroParallax() {
  const hero  = qs('.hero');
  const decos = qsa('.hero__deco');
  if (!hero || !decos.length) return;
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  let raf = null;
  hero.addEventListener('mousemove', e => {
    const r  = hero.getBoundingClientRect();
    const mx = (e.clientX - r.left) / r.width  - 0.5;
    const my = (e.clientY - r.top)  / r.height - 0.5;
    if (raf) cancelAnimationFrame(raf);
    raf = requestAnimationFrame(() => {
      decos.forEach((d, i) => { const depth = (i % 3 + 1) * 10; d.style.transform = `translate(${mx * depth}px, ${my * depth}px)`; });
      raf = null;
    });
  });
  hero.addEventListener('mouseleave', () => decos.forEach(d => { d.style.transform = ''; }));
})();

/* ================================================================
   11. PROCESS ROCKET ANIMATION  ← Fix 10
       Rocket SVG rides the dashed vertical center-line.
       Y position mapped to scroll progress through section.
       Each step card reveals as rocket passes its midpoint.
   ================================================================ */
(function initProcessRocket() {
  const section = qs('#process');
  const rocket  = qs('#process-rocket');
  const lineEl  = qs('#process-line');
  const lineSvg = qs('#process-line-svg');
  const steps   = qsa('.process__step');
  if (!section || !rocket || !lineEl) return;

  // Set initial hidden state for all cards (rocket will reveal them)
  qsa('.process-card').forEach(card => {
    card.style.opacity    = '0';
    card.style.transform  = 'translateY(20px)';
    card.style.transition = 'opacity 0.55s ease, transform 0.55s cubic-bezier(0.22,1,0.36,1)';
  });

  let raf = null;

  const update = () => {
    const sRect   = section.getBoundingClientRect();
    const viewH   = window.innerHeight;
    const secH    = section.offsetHeight;

    // Scroll progress through section: 0→1
    const scrolled  = clamp(viewH - sRect.top, 0, secH + viewH);
    const progress  = scrolled / (secH + viewH);

    // Resize line SVG to match container
    const lineH = lineEl.offsetHeight;
    if (lineSvg) {
      lineSvg.setAttribute('viewBox', `0 0 4 ${lineH}`);
      lineSvg.querySelector('line')?.setAttribute('y2', lineH);
    }

    // Rocket Y — travels from -20px (above line) to lineH-30px (bottom)
    const rocketY = clamp(progress * (lineH + 40) - 20, -20, lineH - 30);
    rocket.style.transform = `translateX(-50%) translateY(${rocketY}px)`;

    // Reveal step cards as rocket reaches their vertical midpoint
    steps.forEach(step => {
      const card = step.querySelector('.process-card');
      if (!card) return;
      const stepRect = step.getBoundingClientRect();
      const triggerY = viewH * 0.72;
      if (stepRect.top < triggerY) {
        card.style.opacity   = '1';
        card.style.transform = 'translateY(0)';
      }
    });

    raf = null;
  };

  const onScroll = () => { if (raf) cancelAnimationFrame(raf); raf = requestAnimationFrame(update); };
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', update);
  update();
})();

/* ================================================================
   12. BLOG STICKY STACK CARDS  ← Fix 11
       Cards stack with position:sticky at staggered top values.
       As next card scrolls in, the previous one scales down + dims.
       Creates a "card pushes card" effect without JS scroll hijacking.
   ================================================================ */
(function initBlogStack() {
  const cards = qsa('.blog-card--stack');
  if (!cards.length) return;

  const NAV_H      = 68;   // px, matches --nav-h
  const BASE_TOP   = 24;   // extra padding below nav
  const STEP       = 18;   // px each card is offset lower than previous
  const SCALE_MIN  = 0.90; // how small buried cards get

  // Assign staggered sticky top & z-index
  cards.forEach((card, i) => {
    card.style.top     = `${NAV_H + BASE_TOP + i * STEP}px`;
    card.style.zIndex  = i + 1;
    card.style.transformOrigin = 'top center';
  });

  let raf = null;

  const update = () => {
    cards.forEach((card, i) => {
      const nextCard = cards[i + 1];
      if (!nextCard) {
        // Last card — always full scale
        card.style.transform = 'scale(1)';
        card.style.filter    = 'brightness(1)';
        return;
      }

      const cardRect = card.getBoundingClientRect();
      const nextRect = nextCard.getBoundingClientRect();
      const cardH    = card.offsetHeight || 120;

      // How much of this card has the next card covered?
      const stickyTop     = NAV_H + BASE_TOP + i * STEP;
      const nextStickyTop = NAV_H + BASE_TOP + (i + 1) * STEP;
      const overlap = clamp((stickyTop - nextRect.top + STEP), 0, cardH);
      const coverProg = overlap / cardH;

      const scale      = 1 - coverProg * (1 - SCALE_MIN);
      const brightness = 1 - coverProg * 0.3;

      card.style.transform = `scale(${scale})`;
      card.style.filter    = `brightness(${brightness})`;
    });

    raf = null;
  };

  const onScroll = () => { if (raf) cancelAnimationFrame(raf); raf = requestAnimationFrame(update); };
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', update);
  update();
})();

/* ================================================================
   13. GLOBAL TOP PROGRESS BAR
   ================================================================ */
(function initScrollBar() {
  const bar = document.createElement('div');
  bar.setAttribute('aria-hidden', 'true');
  bar.style.cssText = `
    position:fixed; top:0; left:0; height:2.5px; width:0%;
    background:linear-gradient(90deg,#6EFF6A,#00CFCF);
    z-index:9999; pointer-events:none;
    border-radius:0 2px 2px 0;
  `;
  document.body.appendChild(bar);

  window.addEventListener('scroll', () => {
    const s = document.documentElement.scrollHeight - window.innerHeight;
    bar.style.width = s > 0 ? (window.scrollY / s * 100) + '%' : '0%';
  }, { passive: true });
})();

/* ================================================================
   14. SMOOTH NAV LINKS
   ================================================================ */
(function initSmoothNav() {
  qsa('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = qs(a.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });
})();

/* ================================================================
   15. CURSOR GLOW (desktop only)
   ================================================================ */
(function initCursorGlow() {
  if (window.matchMedia('(pointer:coarse)').matches) return;
  const glow = document.createElement('div');
  glow.setAttribute('aria-hidden', 'true');
  glow.style.cssText = `
    position:fixed; pointer-events:none; z-index:9998;
    width:320px; height:320px; border-radius:50%;
    background:radial-gradient(circle, rgba(110,255,106,0.055) 0%, transparent 70%);
    transform:translate(-50%,-50%); transition:opacity 0.3s ease; opacity:0;
  `;
  document.body.appendChild(glow);
  document.addEventListener('mousemove', e => {
    glow.style.left = e.clientX + 'px';
    glow.style.top  = e.clientY + 'px';
    glow.style.opacity = '1';
  });
  document.addEventListener('mouseleave', () => { glow.style.opacity = '0'; });
})();

/* ================================================================
   PAGE LOAD FADE-IN
   ================================================================ */
document.addEventListener('DOMContentLoaded', () => {
  document.body.style.opacity    = '0';
  document.body.style.transition = 'opacity 0.45s ease';
  requestAnimationFrame(() => { document.body.style.opacity = '1'; });
});