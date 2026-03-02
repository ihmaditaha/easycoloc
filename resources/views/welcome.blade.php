<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CoLoc — Gérez vos dépenses en colocation, sans prise de tête.</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Nunito:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    :root {
      --cream:   #FDF8F2;
      --charcoal:#1C1917;
      --amber:   #D97706;
      --amber-l: #FCD34D;
      --sage:    #6B7C62;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'Nunito', sans-serif;
      background: var(--cream);
      color: var(--charcoal);
      overflow-x: hidden;
    }

    .serif { font-family: 'DM Serif Display', serif; }

    /* ── Scrollbar ── */
    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-thumb { background: #D4C9BB; border-radius: 4px; }

    /* ── Noise texture overlay ── */
    body::before {
      content: '';
      position: fixed;
      inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 512 512' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.025'/%3E%3C/svg%3E");
      pointer-events: none;
      z-index: 9999;
    }

    /* ── Animations ── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to   { opacity: 1; }
    }
    @keyframes floatA {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50%       { transform: translateY(-18px) rotate(3deg); }
    }
    @keyframes floatB {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50%       { transform: translateY(-12px) rotate(-2deg); }
    }
    @keyframes floatC {
      0%, 100% { transform: translateY(0px); }
      50%       { transform: translateY(-8px); }
    }
    @keyframes spinSlow {
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }
    @keyframes marquee {
      from { transform: translateX(0); }
      to   { transform: translateX(-50%); }
    }
    @keyframes pulse-ring {
      0%   { transform: scale(1);   opacity: .6; }
      100% { transform: scale(1.8); opacity: 0; }
    }
    @keyframes slideRight {
      from { transform: scaleX(0); }
      to   { transform: scaleX(1); }
    }

    .fu   { animation: fadeUp .6s ease both; }
    .fu1  { animation: fadeUp .6s .1s ease both; }
    .fu2  { animation: fadeUp .6s .2s ease both; }
    .fu3  { animation: fadeUp .6s .35s ease both; }
    .fu4  { animation: fadeUp .6s .5s ease both; }
    .fi   { animation: fadeIn .8s ease both; }

    .float-a { animation: floatA 6s ease-in-out infinite; }
    .float-b { animation: floatB 8s ease-in-out infinite; }
    .float-c { animation: floatC 5s ease-in-out infinite; }

    /* ── Navbar ── */
    nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 100;
      padding: 1.1rem 2.5rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      transition: background .3s, box-shadow .3s;
    }
    nav.scrolled {
      background: rgba(253,248,242,.92);
      backdrop-filter: blur(12px);
      box-shadow: 0 1px 0 rgba(0,0,0,.06);
    }

    /* ── Hero ── */
    .hero {
      min-height: 100vh;
      display: flex;
      align-items: center;
      position: relative;
      padding: 7rem 2.5rem 4rem;
    }

    .hero-bg-circle {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
    }

    /* ── Feature cards ── */
    .feature-card {
      background: white;
      border: 1px solid rgba(0,0,0,.07);
      border-radius: 20px;
      padding: 2rem;
      transition: transform .25s, box-shadow .25s;
      position: relative;
      overflow: hidden;
    }
    .feature-card::before {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(217,119,6,.04) 0%, transparent 60%);
      border-radius: inherit;
    }
    .feature-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 16px 48px rgba(0,0,0,.09);
    }

    /* ── Marquee ── */
    .marquee-inner {
      display: flex;
      gap: 1.5rem;
      animation: marquee 28s linear infinite;
      width: max-content;
    }

    /* ── Steps ── */
    .step-line {
      position: absolute;
      left: 19px;
      top: 48px;
      width: 2px;
      height: calc(100% + 2rem);
      background: linear-gradient(to bottom, #D97706 0%, #FEF3C7 100%);
    }

    /* ── Testimonial ── */
    .testimonial-card {
      background: white;
      border: 1px solid rgba(0,0,0,.07);
      border-radius: 20px;
      padding: 1.75rem;
      transition: transform .2s;
    }
    .testimonial-card:hover { transform: translateY(-3px); }

    /* ── CTA section ── */
    .cta-section {
      background: var(--charcoal);
      border-radius: 32px;
      position: relative;
      overflow: hidden;
      padding: 5rem 3rem;
    }
    .cta-section::before {
      content: '';
      position: absolute;
      top: -80px; right: -80px;
      width: 320px; height: 320px;
      background: #D97706;
      border-radius: 50%;
      opacity: .12;
      filter: blur(60px);
    }
    .cta-section::after {
      content: '';
      position: absolute;
      bottom: -60px; left: -60px;
      width: 240px; height: 240px;
      background: #6B7C62;
      border-radius: 50%;
      opacity: .15;
      filter: blur(50px);
    }

    /* ── Btn ── */
    .btn-primary {
      background: var(--charcoal);
      color: white;
      padding: .875rem 1.75rem;
      border-radius: 14px;
      font-weight: 700;
      font-size: .875rem;
      letter-spacing: .02em;
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      transition: background .2s, transform .15s;
      text-decoration: none;
    }
    .btn-primary:hover { background: #D97706; transform: translateY(-1px); }

    .btn-outline {
      border: 1.5px solid rgba(28,25,23,.2);
      color: var(--charcoal);
      padding: .875rem 1.75rem;
      border-radius: 14px;
      font-weight: 700;
      font-size: .875rem;
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      transition: border-color .2s, background .2s;
      text-decoration: none;
    }
    .btn-outline:hover { border-color: #D97706; background: rgba(217,119,6,.04); }

    /* scroll reveal */
    .reveal { opacity: 0; transform: translateY(30px); transition: opacity .7s ease, transform .7s ease; }
    .reveal.visible { opacity: 1; transform: translateY(0); }
  </style>
</head>

<body>

<!-- ════════════════════════ NAVBAR ════════════════════════ -->
<nav id="navbar">
  <!-- Logo -->
  <a href="/" class="flex items-center gap-2.5">
    <div class="w-9 h-9 rounded-xl bg-amber-500 flex items-center justify-center shadow-md">
      <span class="serif text-white text-xl font-bold">C</span>
    </div>
    <span class="serif text-[#1C1917] text-xl">CoLoc</span>
  </a>

  <!-- Links -->
  <div class="hidden md:flex items-center gap-8 text-sm font-semibold text-gray-500">
    <a href="#fonctionnalites" class="hover:text-amber-600 transition">Fonctionnalités</a>
    <a href="#comment-ca-marche" class="hover:text-amber-600 transition">Comment ça marche</a>
    <a href="#temoignages" class="hover:text-amber-600 transition">Témoignages</a>
  </div>

  <!-- Actions -->
  <div class="flex items-center gap-3">
    <a href="{{route('login')}}" class="text-sm font-semibold text-gray-600 hover:text-amber-600 transition px-3 py-2">
      Connexion
    </a>
    <a href="{{route('register')}}" class="btn-primary text-sm py-2.5 px-5">
      Commencer gratuitement →
    </a>
  </div>
</nav>


<!-- ════════════════════════ HERO ════════════════════════ -->
<section class="hero">

  <!-- Background blobs -->
  <div class="hero-bg-circle w-[500px] h-[500px] bg-amber-200 opacity-30 blur-3xl -top-20 -right-32" style="position:absolute;"></div>
  <div class="hero-bg-circle w-[300px] h-[300px] bg-amber-400 opacity-15 blur-2xl bottom-0 left-0" style="position:absolute;"></div>
  <div class="hero-bg-circle w-[200px] h-[200px] bg-[#6B7C62] opacity-10 blur-2xl top-1/3 left-1/4" style="position:absolute;"></div>

  <div class="max-w-7xl mx-auto w-full grid grid-cols-2 gap-16 items-center relative z-10">

    <!-- Left: Text -->
    <div>
      <!-- Badge -->
      <div class="fu inline-flex items-center gap-2 bg-amber-50 border border-amber-200 text-amber-700 text-xs font-bold px-4 py-2 rounded-full mb-7 uppercase tracking-widest">
        <span class="w-1.5 h-1.5 bg-amber-500 rounded-full animate-pulse"></span>
        Gratuit · Sans CB · Prêt en 2 minutes
      </div>

      <!-- Headline -->
      <h1 class="fu1 serif text-6xl leading-[1.08] text-[#1C1917] mb-6">
        La colocation<br/>
        sans les <em class="text-amber-500 italic">conflits</em><br/>
        d'argent.
      </h1>

      <!-- Sub -->
      <p class="fu2 text-gray-500 text-lg leading-relaxed mb-9 max-w-md">
        CoLoc calcule automatiquement qui doit quoi à qui. Fini les tableaux Excel, les discussions gênantes et les oublis.
      </p>

      <!-- CTAs -->
      <div class="fu3 flex items-center gap-4 flex-wrap">
        <a href="{{route('register')}}" class="btn-primary text-base py-3.5 px-7 shadow-lg shadow-amber-200">
          Créer ma colocation →
        </a>
        <a href="#comment-ca-marche" class="btn-outline text-base py-3.5 px-7">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          Voir comment ça marche
        </a>
      </div>

      <!-- Social proof -->
      <div class="fu4 flex items-center gap-4 mt-9">
        <div class="flex -space-x-2">
          <div class="w-8 h-8 rounded-full bg-amber-500 border-2 border-white flex items-center justify-center text-white text-xs font-bold">MA</div>
          <div class="w-8 h-8 rounded-full bg-blue-400 border-2 border-white flex items-center justify-center text-white text-xs font-bold">TL</div>
          <div class="w-8 h-8 rounded-full bg-emerald-400 border-2 border-white flex items-center justify-center text-white text-xs font-bold">SB</div>
          <div class="w-8 h-8 rounded-full bg-rose-400 border-2 border-white flex items-center justify-center text-white text-xs font-bold">KM</div>
          <div class="w-8 h-8 rounded-full bg-[#1C1917] border-2 border-white flex items-center justify-center text-amber-400 text-xs font-bold">+</div>
        </div>
        <div>
          <div class="flex gap-0.5 mb-0.5">
            <span class="text-amber-400 text-sm">★★★★★</span>
          </div>
          <p class="text-xs text-gray-400 font-semibold">+1 200 colocations actives ce mois</p>
        </div>
      </div>
    </div>

    <!-- Right: Dashboard preview floating cards -->
    <div class="relative h-[520px] fi">

      <!-- Main dashboard card -->
      <div class="float-a absolute top-0 left-0 right-0 bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
        <!-- Header bar -->
        <div class="bg-[#1C1917] px-5 py-3 flex items-center gap-2">
          <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
          <div class="w-2.5 h-2.5 rounded-full bg-yellow-400"></div>
          <div class="w-2.5 h-2.5 rounded-full bg-green-400"></div>
          <span class="ml-3 text-gray-500 text-xs">coloc.app · Tableau de bord</span>
        </div>
        <div class="p-5">
          <div class="flex gap-3 mb-4">
            <div class="flex-1 bg-[#1C1917] rounded-xl p-3.5 text-white">
              <p class="text-gray-400 text-xs mb-1">Mon solde</p>
              <p class="serif text-2xl text-amber-400">+124 €</p>
              <p class="text-gray-500 text-xs mt-0.5">Vous êtes créditeur ✓</p>
            </div>
            <div class="flex-1 bg-[#FDF8F2] rounded-xl p-3.5">
              <p class="text-gray-400 text-xs mb-1">Ce mois</p>
              <p class="serif text-2xl text-[#1C1917]">340 €</p>
              <p class="text-gray-400 text-xs mt-0.5">8 dépenses</p>
            </div>
            <div class="flex-1 bg-[#FDF8F2] rounded-xl p-3.5">
              <p class="text-gray-400 text-xs mb-1">Réputation</p>
              <p class="serif text-2xl text-[#1C1917]">+7 ⭐</p>
              <p class="text-emerald-500 text-xs mt-0.5 font-semibold">Excellent</p>
            </div>
          </div>
          <!-- Mini expense list -->
          <div class="space-y-2">
            <div class="flex items-center justify-between bg-gray-50 rounded-xl px-3 py-2">
              <div class="flex items-center gap-2">
                <span class="text-base">🛒</span>
                <span class="text-xs font-semibold text-[#1C1917]">Courses Carrefour</span>
              </div>
              <span class="text-xs font-bold text-[#1C1917]">87,50 €</span>
            </div>
            <div class="flex items-center justify-between bg-gray-50 rounded-xl px-3 py-2">
              <div class="flex items-center gap-2">
                <span class="text-base">⚡</span>
                <span class="text-xs font-semibold text-[#1C1917]">EDF — Février</span>
              </div>
              <span class="text-xs font-bold text-[#1C1917]">124,00 €</span>
            </div>
            <div class="flex items-center justify-between bg-gray-50 rounded-xl px-3 py-2">
              <div class="flex items-center gap-2">
                <span class="text-base">🏠</span>
                <span class="text-xs font-semibold text-[#1C1917]">Loyer — Février</span>
              </div>
              <span class="text-xs font-bold text-[#1C1917]">1 200,00 €</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Floating mini card: settlement -->
      <div class="float-b absolute -bottom-4 -right-6 bg-white rounded-2xl shadow-xl border border-gray-100 p-4 w-56">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Règlement</p>
        <div class="flex items-center gap-2 mb-2">
          <div class="w-7 h-7 rounded-full bg-blue-400 text-white text-xs font-bold flex items-center justify-center">TL</div>
          <svg class="w-3 h-3 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
          <div class="w-7 h-7 rounded-full bg-amber-500 text-white text-xs font-bold flex items-center justify-center">MA</div>
          <span class="text-sm font-bold text-[#1C1917] ml-auto">45 €</span>
        </div>
        <button class="w-full bg-emerald-500 text-white text-xs font-bold py-2 rounded-xl hover:bg-emerald-600 transition">
          ✓ Marquer payé
        </button>
      </div>

      <!-- Floating badge: notification -->
      <div class="float-c absolute -left-6 bottom-16 bg-[#1C1917] text-white rounded-2xl shadow-xl px-4 py-3 flex items-center gap-3 w-52">
        <div class="relative">
          <div class="w-9 h-9 rounded-full bg-amber-500 flex items-center justify-center text-white text-sm font-bold">SB</div>
          <div class="absolute -top-0.5 -right-0.5 w-3 h-3 bg-emerald-400 rounded-full border border-[#1C1917]"></div>
        </div>
        <div>
          <p class="text-xs font-bold text-white">Sophie a payé</p>
          <p class="text-amber-400 text-xs font-semibold">+60 € dépense ajoutée</p>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════ MARQUEE STRIP ════════════════════════ -->
<div class="bg-amber-500 py-4 overflow-hidden relative">
  <div class="marquee-inner">
    <span class="text-white font-bold text-sm whitespace-nowrap">💡 Calcul automatique des soldes</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">🏠 Gestion de colocation simplifiée</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">💸 Remboursements en un clic</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">⭐ Système de réputation</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">📧 Invitations par email</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">📊 Statistiques par catégorie</span>
    <span class="text-amber-200 mx-4">·</span>
    <!-- duplicate for seamless loop -->
    <span class="text-white font-bold text-sm whitespace-nowrap">💡 Calcul automatique des soldes</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">🏠 Gestion de colocation simplifiée</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">💸 Remboursements en un clic</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">⭐ Système de réputation</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">📧 Invitations par email</span>
    <span class="text-amber-200 mx-4">·</span>
    <span class="text-white font-bold text-sm whitespace-nowrap">📊 Statistiques par catégorie</span>
    <span class="text-amber-200 mx-4">·</span>
  </div>
</div>


<!-- ════════════════════════ STATS ════════════════════════ -->
<section class="py-20 px-6">
  <div class="max-w-5xl mx-auto">
    <div class="grid grid-cols-4 gap-6 reveal">
      <div class="text-center">
        <p class="serif text-5xl text-[#1C1917] mb-2">1 200<span class="text-amber-500">+</span></p>
        <p class="text-gray-400 text-sm font-semibold">Colocations actives</p>
      </div>
      <div class="text-center">
        <p class="serif text-5xl text-[#1C1917] mb-2">48k<span class="text-amber-500">+</span></p>
        <p class="text-gray-400 text-sm font-semibold">Dépenses enregistrées</p>
      </div>
      <div class="text-center">
        <p class="serif text-5xl text-[#1C1917] mb-2">€2M<span class="text-amber-500">+</span></p>
        <p class="text-gray-400 text-sm font-semibold">Remboursés entre colocataires</p>
      </div>
      <div class="text-center">
        <p class="serif text-5xl text-[#1C1917] mb-2">4.9<span class="text-amber-500">★</span></p>
        <p class="text-gray-400 text-sm font-semibold">Note moyenne des utilisateurs</p>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════ FEATURES ════════════════════════ -->
<section id="fonctionnalites" class="py-24 px-6 bg-white">
  <div class="max-w-6xl mx-auto">

    <!-- Section header -->
    <div class="text-center mb-16 reveal">
      <span class="text-amber-600 text-xs font-bold uppercase tracking-widest">Fonctionnalités</span>
      <h2 class="serif text-5xl text-[#1C1917] mt-3 mb-4">Tout ce dont vous avez<br/>besoin, et rien de plus.</h2>
      <p class="text-gray-400 max-w-lg mx-auto leading-relaxed">CoLoc couvre toutes les situations de la vie en colocation, des dépenses quotidiennes aux règlements de fin de mois.</p>
    </div>

    <!-- Feature grid -->
    <div class="grid grid-cols-3 gap-5">

      <!-- Feature 1 -->
      <div class="feature-card reveal" style="transition-delay:.05s">
        <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center mb-5 text-2xl">💸</div>
        <h3 class="serif text-xl text-[#1C1917] mb-2">Calcul automatique des soldes</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Chaque dépense est automatiquement répartie. Votre solde est toujours à jour, en temps réel.</p>
      </div>

      <!-- Feature 2 -->
      <div class="feature-card reveal" style="transition-delay:.1s">
        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center mb-5 text-2xl">📊</div>
        <h3 class="serif text-xl text-[#1C1917] mb-2">Vue "Qui doit à qui"</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Une synthèse claire et simplifiée des remboursements à faire, sans ambiguïté.</p>
      </div>

      <!-- Feature 3 -->
      <div class="feature-card reveal" style="transition-delay:.15s">
        <div class="w-12 h-12 rounded-xl bg-emerald-100 flex items-center justify-center mb-5 text-2xl">📧</div>
        <h3 class="serif text-xl text-[#1C1917] mb-2">Invitations par email</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Invitez vos colocataires via un lien unique. Ils acceptent ou refusent en un clic.</p>
      </div>

      <!-- Feature 4 -->
      <div class="feature-card reveal" style="transition-delay:.2s">
        <div class="w-12 h-12 rounded-xl bg-amber-100 flex items-center justify-center mb-5 text-2xl">🏷️</div>
        <h3 class="serif text-xl text-[#1C1917] mb-2">Catégories personnalisées</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Courses, loyer, électricité, loisirs… Organisez vos dépenses avec vos propres catégories.</p>
      </div>

      <!-- Feature 5 — large card -->
      <div class="feature-card col-span-2 reveal" style="transition-delay:.25s">
        <div class="flex gap-8 items-center">
          <div class="flex-1">
            <div class="w-12 h-12 rounded-xl bg-rose-100 flex items-center justify-center mb-5 text-2xl">⭐</div>
            <h3 class="serif text-xl text-[#1C1917] mb-2">Système de réputation</h3>
            <p class="text-gray-400 text-sm leading-relaxed mb-4">Votre comportement financier impacte votre score. Partez sans dettes → +1. Partez avec des dettes → -1. Un indicateur de confiance pour toutes vos futures colocations.</p>
            <div class="flex gap-3">
              <span class="bg-emerald-100 text-emerald-700 text-xs px-3 py-1.5 rounded-full font-bold">⭐ +7 Excellent payeur</span>
              <span class="bg-red-100 text-red-600 text-xs px-3 py-1.5 rounded-full font-bold">⭐ -2 Attention</span>
            </div>
          </div>
          <!-- Mini reputation display -->
          <div class="bg-[#1C1917] rounded-2xl p-5 w-52 flex-shrink-0">
            <p class="text-gray-400 text-xs font-semibold mb-4 uppercase tracking-wider">Classement</p>
            <div class="space-y-3">
              <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-amber-500 text-white text-xs font-bold flex items-center justify-center">MA</div>
                <span class="text-white text-xs flex-1">Marie</span>
                <span class="text-amber-400 text-xs font-bold">+7</span>
              </div>
              <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-emerald-400 text-white text-xs font-bold flex items-center justify-center">SB</div>
                <span class="text-gray-400 text-xs flex-1">Sophie</span>
                <span class="text-amber-400 text-xs font-bold">+5</span>
              </div>
              <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-blue-400 text-white text-xs font-bold flex items-center justify-center">TL</div>
                <span class="text-gray-400 text-xs flex-1">Thomas</span>
                <span class="text-amber-400 text-xs font-bold">+3</span>
              </div>
              <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-rose-400 text-white text-xs font-bold flex items-center justify-center">KM</div>
                <span class="text-gray-400 text-xs flex-1">Karim</span>
                <span class="text-red-400 text-xs font-bold">-1</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Feature 6 -->
      <div class="feature-card reveal" style="transition-delay:.3s">
        <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center mb-5 text-2xl">✅</div>
        <h3 class="serif text-xl text-[#1C1917] mb-2">Marquer comme payé</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Enregistrez les paiements et mettez à jour les soldes instantanément. Aucun oubli possible.</p>
      </div>

      <!-- Feature 7 -->
      <div class="feature-card reveal" style="transition-delay:.35s">
        <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center mb-5 text-2xl">🔍</div>
        <h3 class="serif text-xl text-[#1C1917] mb-2">Filtre par mois</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Consultez l'historique de vos dépenses mois par mois. Visualisez vos tendances de consommation.</p>
      </div>

      <!-- Feature 8 -->
      <div class="feature-card reveal" style="transition-delay:.4s">
        <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center mb-5 text-2xl">🛡️</div>
        <h3 class="serif text-xl text-[#1C1917] mb-2">Administration globale</h3>
        <p class="text-gray-400 text-sm leading-relaxed">Un admin peut gérer la plateforme, voir les statistiques globales et modérer les utilisateurs.</p>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════ HOW IT WORKS ════════════════════════ -->
<section id="comment-ca-marche" class="py-24 px-6">
  <div class="max-w-5xl mx-auto grid grid-cols-2 gap-20 items-center">

    <!-- Left: Steps -->
    <div class="reveal">
      <span class="text-amber-600 text-xs font-bold uppercase tracking-widest">Comment ça marche</span>
      <h2 class="serif text-4xl text-[#1C1917] mt-3 mb-12">Opérationnel en<br/>moins de 2 minutes.</h2>

      <div class="space-y-10 relative">

        <!-- Step 1 -->
        <div class="flex gap-5 relative">
          <div class="relative flex-shrink-0">
            <div class="w-10 h-10 rounded-full bg-[#1C1917] text-amber-400 font-bold text-sm flex items-center justify-center z-10 relative serif">1</div>
            <div class="step-line"></div>
          </div>
          <div class="pb-4">
            <h4 class="font-bold text-[#1C1917] mb-1">Créez votre colocation</h4>
            <p class="text-gray-400 text-sm leading-relaxed">Inscrivez-vous et créez votre espace en quelques secondes. Vous devenez automatiquement Owner.</p>
          </div>
        </div>

        <!-- Step 2 -->
        <div class="flex gap-5 relative">
          <div class="relative flex-shrink-0">
            <div class="w-10 h-10 rounded-full bg-[#1C1917] text-amber-400 font-bold text-sm flex items-center justify-center z-10 relative serif">2</div>
            <div class="step-line"></div>
          </div>
          <div class="pb-4">
            <h4 class="font-bold text-[#1C1917] mb-1">Invitez vos colocataires</h4>
            <p class="text-gray-400 text-sm leading-relaxed">Envoyez des invitations par email avec un lien unique. Ils rejoignent en un clic.</p>
          </div>
        </div>

        <!-- Step 3 -->
        <div class="flex gap-5 relative">
          <div class="relative flex-shrink-0">
            <div class="w-10 h-10 rounded-full bg-[#1C1917] text-amber-400 font-bold text-sm flex items-center justify-center z-10 relative serif">3</div>
            <div class="step-line"></div>
          </div>
          <div class="pb-4">
            <h4 class="font-bold text-[#1C1917] mb-1">Enregistrez les dépenses</h4>
            <p class="text-gray-400 text-sm leading-relaxed">Ajoutez chaque dépense avec son montant, sa catégorie et le payeur. CoLoc fait le reste.</p>
          </div>
        </div>

        <!-- Step 4 -->
        <div class="flex gap-5">
          <div class="flex-shrink-0">
            <div class="w-10 h-10 rounded-full bg-amber-500 text-white font-bold text-sm flex items-center justify-center serif">4</div>
          </div>
          <div>
            <h4 class="font-bold text-[#1C1917] mb-1">Remboursez en un clic</h4>
            <p class="text-gray-400 text-sm leading-relaxed">Consultez la vue "Qui doit à qui" et marquez les paiements comme effectués. Balances à zéro !</p>
          </div>
        </div>

      </div>
    </div>

    <!-- Right: Visual -->
    <div class="reveal" style="transition-delay:.2s">
      <div class="relative">
        <!-- Big balance card -->
        <div class="bg-[#1C1917] rounded-3xl p-7 text-white relative overflow-hidden">
          <div class="absolute -top-8 -right-8 w-32 h-32 bg-amber-500 opacity-15 rounded-full blur-xl"></div>
          <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-5">Balances — Février 2026</p>
          <div class="space-y-4">
            <div>
              <div class="flex justify-between text-sm mb-2">
                <div class="flex items-center gap-2">
                  <div class="w-7 h-7 rounded-full bg-amber-500 text-white text-xs font-bold flex items-center justify-center">MA</div>
                  <span class="font-semibold">Marie</span>
                </div>
                <span class="text-emerald-400 font-bold">+124 €</span>
              </div>
              <div class="h-2 bg-white/10 rounded-full"><div class="h-full bg-emerald-400 rounded-full" style="width:72%"></div></div>
            </div>
            <div>
              <div class="flex justify-between text-sm mb-2">
                <div class="flex items-center gap-2">
                  <div class="w-7 h-7 rounded-full bg-emerald-400 text-white text-xs font-bold flex items-center justify-center">SB</div>
                  <span class="text-gray-300">Sophie</span>
                </div>
                <span class="text-emerald-400 font-bold">+15 €</span>
              </div>
              <div class="h-2 bg-white/10 rounded-full"><div class="h-full bg-emerald-400 rounded-full" style="width:20%"></div></div>
            </div>
            <div>
              <div class="flex justify-between text-sm mb-2">
                <div class="flex items-center gap-2">
                  <div class="w-7 h-7 rounded-full bg-blue-400 text-white text-xs font-bold flex items-center justify-center">TL</div>
                  <span class="text-gray-300">Thomas</span>
                </div>
                <span class="text-red-400 font-bold">-45 €</span>
              </div>
              <div class="h-2 bg-white/10 rounded-full"><div class="h-full bg-red-400 rounded-full" style="width:38%"></div></div>
            </div>
            <div>
              <div class="flex justify-between text-sm mb-2">
                <div class="flex items-center gap-2">
                  <div class="w-7 h-7 rounded-full bg-rose-400 text-white text-xs font-bold flex items-center justify-center">KM</div>
                  <span class="text-gray-300">Karim</span>
                </div>
                <span class="text-red-400 font-bold">-94 €</span>
              </div>
              <div class="h-2 bg-white/10 rounded-full"><div class="h-full bg-red-400 rounded-full" style="width:65%"></div></div>
            </div>
          </div>

          <div class="mt-6 pt-5 border-t border-white/10">
            <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-3">Règlement simplifié</p>
            <div class="space-y-2">
              <div class="flex items-center justify-between bg-white/5 rounded-xl px-3 py-2.5">
                <div class="flex items-center gap-2 text-sm">
                  <div class="w-5 h-5 rounded-full bg-blue-400 text-white text-xs font-bold flex items-center justify-center">T</div>
                  <span class="text-gray-300 text-xs">Thomas → Marie</span>
                </div>
                <span class="text-white font-bold text-sm">45 €</span>
              </div>
              <div class="flex items-center justify-between bg-white/5 rounded-xl px-3 py-2.5">
                <div class="flex items-center gap-2 text-sm">
                  <div class="w-5 h-5 rounded-full bg-rose-400 text-white text-xs font-bold flex items-center justify-center">K</div>
                  <span class="text-gray-300 text-xs">Karim → Marie</span>
                </div>
                <span class="text-white font-bold text-sm">79 €</span>
              </div>
              <div class="flex items-center justify-between bg-white/5 rounded-xl px-3 py-2.5">
                <div class="flex items-center gap-2 text-sm">
                  <div class="w-5 h-5 rounded-full bg-rose-400 text-white text-xs font-bold flex items-center justify-center">K</div>
                  <span class="text-gray-300 text-xs">Karim → Sophie</span>
                </div>
                <span class="text-white font-bold text-sm">15 €</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Floating checkmark badge -->
        <div class="absolute -top-4 -right-4 bg-emerald-500 text-white rounded-2xl px-4 py-3 shadow-xl flex items-center gap-2">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
          <span class="text-sm font-bold">Tout est réglé !</span>
        </div>
      </div>
    </div>

  </div>
</section>


<!-- ════════════════════════ TESTIMONIALS ════════════════════════ -->
<section id="temoignages" class="py-24 px-6 bg-white">
  <div class="max-w-6xl mx-auto">

    <div class="text-center mb-14 reveal">
      <span class="text-amber-600 text-xs font-bold uppercase tracking-widest">Témoignages</span>
      <h2 class="serif text-4xl text-[#1C1917] mt-3">Ce qu'ils en pensent.</h2>
    </div>

    <div class="grid grid-cols-3 gap-5">

      <div class="testimonial-card reveal">
        <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
        <p class="text-gray-600 text-sm leading-relaxed mb-5">"Avant CoLoc, on avait des tableaux Excel partout et des disputes à chaque fin de mois. Maintenant tout est clair en 30 secondes."</p>
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-amber-500 text-white font-bold text-sm flex items-center justify-center">SA</div>
          <div>
            <p class="font-bold text-sm text-[#1C1917]">Sofia A.</p>
            <p class="text-xs text-gray-400">Colocation depuis 2 ans · Paris</p>
          </div>
        </div>
      </div>

      <div class="testimonial-card reveal" style="transition-delay:.1s">
        <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
        <p class="text-gray-600 text-sm leading-relaxed mb-5">"Le système de réputation est brillant. On voit directement qui est fiable. Ça a complètement changé la dynamique de notre groupe."</p>
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-blue-400 text-white font-bold text-sm flex items-center justify-center">MK</div>
          <div>
            <p class="font-bold text-sm text-[#1C1917]">Mehdi K.</p>
            <p class="text-xs text-gray-400">Owner · Bordeaux</p>
          </div>
        </div>
      </div>

      <div class="testimonial-card reveal" style="transition-delay:.2s">
        <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
        <p class="text-gray-600 text-sm leading-relaxed mb-5">"J'ai créé ma colocation en 2 minutes et invité mes 3 colocataires par email. On a ajouté nos premières dépenses le soir même. Incroyable !"</p>
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-emerald-400 text-white font-bold text-sm flex items-center justify-center">LB</div>
          <div>
            <p class="font-bold text-sm text-[#1C1917]">Laura B.</p>
            <p class="text-xs text-gray-400">Membre · Lyon</p>
          </div>
        </div>
      </div>

      <div class="testimonial-card reveal" style="transition-delay:.05s">
        <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
        <p class="text-gray-600 text-sm leading-relaxed mb-5">"La vue 'Qui doit à qui' est exactement ce qu'il manquait dans toutes les autres apps. Simple, clair, sans ambiguïté."</p>
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-rose-400 text-white font-bold text-sm flex items-center justify-center">RC</div>
          <div>
            <p class="font-bold text-sm text-[#1C1917]">Rania C.</p>
            <p class="text-xs text-gray-400">Owner · Marseille</p>
          </div>
        </div>
      </div>

      <div class="testimonial-card reveal" style="transition-delay:.15s">
        <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
        <p class="text-gray-600 text-sm leading-relaxed mb-5">"Fini les 'tu m'avais dit que tu paierais l'eau ce mois-ci'. Maintenant tout est écrit et visible par tout le monde."</p>
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-purple-400 text-white font-bold text-sm flex items-center justify-center">JM</div>
          <div>
            <p class="font-bold text-sm text-[#1C1917]">Jules M.</p>
            <p class="text-xs text-gray-400">Membre · Nantes</p>
          </div>
        </div>
      </div>

      <div class="testimonial-card reveal" style="transition-delay:.25s">
        <div class="flex gap-1 mb-4 text-amber-400">★★★★★</div>
        <p class="text-gray-600 text-sm leading-relaxed mb-5">"Les catégories personnalisées sont super pratiques. On a même créé une catégorie 'Soirées' pour tracker nos dépenses fun !"</p>
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-full bg-orange-400 text-white font-bold text-sm flex items-center justify-center">AN</div>
          <div>
            <p class="font-bold text-sm text-[#1C1917]">Amina N.</p>
            <p class="text-xs text-gray-400">Owner · Toulouse</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════ CTA FINAL ════════════════════════ -->
<section class="py-24 px-6">
  <div class="max-w-5xl mx-auto">
    <div class="cta-section reveal text-center">
      <div class="relative z-10">
        <span class="inline-block bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full mb-6">
          🎉 Gratuit pour toujours
        </span>
        <h2 class="serif text-5xl text-white leading-tight mb-5">
          Prêt à vivre en colocation<br/>
          <em class="text-amber-400">sans stress financier</em> ?
        </h2>
        <p class="text-gray-400 max-w-md mx-auto mb-10 leading-relaxed">
          Créez votre colocation gratuitement. Invitez vos colocataires. Commencez à tracker vos dépenses en 2 minutes.
        </p>
        <div class="flex items-center justify-center gap-4 flex-wrap">
          <a href="{{route('register')}}" class="bg-amber-500 hover:bg-amber-400 text-white font-bold px-8 py-4 rounded-2xl text-base transition shadow-lg shadow-amber-500/30">
            Créer ma colocation gratuitement →
          </a>
          <a href="/login" class="border border-white/20 text-white hover:bg-white/10 font-semibold px-8 py-4 rounded-2xl text-base transition">
            J'ai déjà un compte
          </a>
        </div>
        <p class="text-gray-600 text-xs mt-6">Pas de carte bancaire requise · Prêt en 2 minutes · 100% gratuit</p>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════ FOOTER ════════════════════════ -->
<footer class="border-t border-gray-200 py-10 px-6">
  <div class="max-w-6xl mx-auto flex items-center justify-between flex-wrap gap-4">
    <div class="flex items-center gap-2.5">
      <div class="w-8 h-8 rounded-lg bg-amber-500 flex items-center justify-center">
        <span class="serif text-white font-bold">C</span>
      </div>
      <span class="serif text-[#1C1917]">CoLoc</span>
    </div>
    <p class="text-gray-400 text-sm">
      © 2026 CoLoc · Gérez vos dépenses en colocation, sereinement.
    </p>
    <div class="flex gap-6 text-sm text-gray-400">
      <a href="{{route('login')}}" class="hover:text-amber-600 transition">Connexion</a>
      <a href="{{route('register')}}" class="hover:text-amber-600 transition">Inscription</a>
    </div>
  </div>
</footer>


<!-- ════════════════════════ JS ════════════════════════ -->
<script>
  /* Navbar on scroll */
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 20);
  });

  /* Scroll reveal */
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        observer.unobserve(e.target);
      }
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

  /* Smooth anchor scrolling */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      e.preventDefault();
      const target = document.querySelector(a.getAttribute('href'));
      if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
    });
  });
</script>

</body>
</html>
