<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CoLoc — Tableau de bord</title>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Nunito:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body { font-family:'Nunito',sans-serif; background:#FDF8F2; }
    .serif { font-family:'DM Serif Display',serif; }

    @keyframes fadeUp {
      from { opacity:0; transform:translateY(16px); }
      to   { opacity:1; transform:translateY(0); }
    }
    @keyframes floatCard {
      0%,100% { transform:translateY(0px) rotate(-1deg); }
      50%      { transform:translateY(-10px) rotate(-1deg); }
    }
    @keyframes floatCard2 {
      0%,100% { transform:translateY(0px) rotate(2deg); }
      50%      { transform:translateY(-14px) rotate(2deg); }
    }
    @keyframes floatCard3 {
      0%,100% { transform:translateY(0px); }
      50%      { transform:translateY(-8px); }
    }
    @keyframes pulse-dot {
      0%,100% { opacity:1; transform:scale(1); }
      50%      { opacity:.5; transform:scale(.85); }
    }

    .fu  { animation: fadeUp .5s ease both; }
    .fu1 { animation: fadeUp .5s .1s ease both; }
    .fu2 { animation: fadeUp .5s .2s ease both; }
    .fu3 { animation: fadeUp .5s .3s ease both; }
    .fu4 { animation: fadeUp .5s .4s ease both; }

    .float-1 { animation: floatCard  6s ease-in-out infinite; }
    .float-2 { animation: floatCard2 8s ease-in-out infinite; }
    .float-3 { animation: floatCard3 5s ease-in-out infinite; }

    .option-card {
      background: white;
      border: 1.5px solid rgba(0,0,0,.07);
      border-radius: 24px;
      padding: 2.25rem;
      cursor: pointer;
      transition: transform .25s, box-shadow .25s, border-color .25s;
      position: relative;
      overflow: hidden;
    }
    .option-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 50px rgba(0,0,0,.09);
      border-color: #D97706;
    }
    .option-card::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(217,119,6,.03) 0%, transparent 60%);
      border-radius: inherit;
      pointer-events: none;
    }

    ::-webkit-scrollbar { width:5px; }
    ::-webkit-scrollbar-thumb { background:#D4C9BB; border-radius:4px; }

    /* Modal */
    .modal-backdrop {
      position: fixed; inset: 0;
      background: rgba(0,0,0,.45);
      backdrop-filter: blur(6px);
      z-index: 50;
      display: flex; align-items: center; justify-content: center;
    }
    .modal-card {
      background: white;
      border-radius: 28px;
      width: 100%; max-width: 480px;
      padding: 2.5rem;
      position: relative;
      animation: fadeUp .3s ease;
    }
  </style>
</head>
<body>

<!-- ═══════════════════ SIDEBAR (réduite) ═══════════════════ -->
<aside class="w-64 bg-[#1C1917] flex flex-col min-h-screen fixed left-0 top-0 z-30">

  <!-- Logo -->
  <div class="px-6 pt-7 pb-6 border-b border-white/10">
    <a href="/dashboard" class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-xl bg-amber-500 flex items-center justify-center">
        <span class="serif text-white text-xl font-bold">C</span>
      </div>
      <span class="serif text-amber-400 text-xl">CoLoc</span>
    </a>
  </div>

  <!-- Nav links -->
  <nav class="flex-1 py-5 px-3 space-y-1">

    <a href="/dashboard"
      class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold bg-amber-500 text-white">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10h14V10"/>
      </svg>
      Tableau de bord
    </a>

    <a href="/profile"
      class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-400 hover:text-white hover:bg-white/10 transition">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
      </svg>
      Mon profil
    </a>

    <!-- Locked items -->
    <div class="pt-3 border-t border-white/10 mt-3 space-y-1">
      <p class="px-3 text-xs text-gray-600 font-bold uppercase tracking-widest mb-2">Disponible après avoir rejoint</p>

      <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-700 opacity-40 cursor-not-allowed select-none">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
        </svg>
        Ma Colocation
        <svg class="w-3.5 h-3.5 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
        </svg>
      </div>

      <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-700 opacity-40 cursor-not-allowed select-none">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2"/>
        </svg>
        Dépenses
        <svg class="w-3.5 h-3.5 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
        </svg>
      </div>

      <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-700 opacity-40 cursor-not-allowed select-none">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 6l3 1m0 0l-3 9a5 5 0 006.47 4.97M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5 5 0 01-6.47 4.97M18 7l3 9"/>
        </svg>
        Balances
        <svg class="w-3.5 h-3.5 ml-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
        </svg>
      </div>
    </div>

  </nav>

  <!-- User Profile -->
  <div class="p-4 border-t border-white/10">
    <div class="flex items-center gap-3">
      <div class="w-9 h-9 rounded-full bg-amber-500 flex items-center justify-center text-white font-bold text-sm">{{substr($user,0,2)}}</div>
      <div class="min-w-0">
        <div class="text-white text-sm font-semibold truncate">{{$user}}</div>
        <div class="flex items-center gap-1.5">
          <span class="w-1.5 h-1.5 rounded-full bg-emerald-400" style="animation:pulse-dot 2s ease-in-out infinite"></span>
          <span class="text-gray-500 text-xs">Sans colocation</span>
        </div>
      </div>
      <a href="/logout" class="ml-auto text-gray-600 hover:text-red-400 transition flex-shrink-0" title="Déconnexion">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
        </svg>
      </a>
    </div>
  </div>

</aside>


<!-- ═══════════════════ MAIN CONTENT ═══════════════════ -->
<main class="ml-64 min-h-screen flex flex-col">

  <!-- Top bar -->
  <div class="px-10 pt-8 pb-0 fu">
    <p class="text-gray-400 text-sm">Lundi 23 février 2026</p>
    <h1 class="serif text-4xl text-[#1C1917] mt-0.5">Bonjour, {{$user}} 👋</h1>
  </div>

  <!-- Center content -->
  <div class="flex-1 flex flex-col items-center justify-center px-10 py-10">

    <!-- Illustration zone -->
    <div class="relative w-72 h-52 mb-10 fu1">

      <!-- Floating card 1 — dépense -->
      <div class="float-1 absolute top-0 left-0 bg-white rounded-2xl shadow-lg border border-gray-100 px-4 py-3 w-44">
        <div class="flex items-center gap-2 mb-2">
          <span class="text-lg">🛒</span>
          <span class="text-xs font-bold text-[#1C1917]">Courses</span>
        </div>
        <p class="text-gray-400 text-xs mb-1">Payé par Thomas</p>
        <p class="serif text-xl text-[#1C1917]">87,50 €</p>
      </div>

      <!-- Floating card 2 — balance -->
      <div class="float-2 absolute top-4 right-0 bg-[#1C1917] rounded-2xl shadow-lg px-4 py-3 w-40">
        <p class="text-gray-400 text-xs mb-1">Mon solde</p>
        <p class="serif text-xl text-amber-400">+124 €</p>
        <p class="text-gray-500 text-xs mt-1">Créditeur ✓</p>
      </div>

      <!-- Floating card 3 — membres -->
      <div class="float-3 absolute bottom-0 left-1/2 -translate-x-1/2 bg-white rounded-2xl shadow-lg border border-gray-100 px-4 py-3">
        <p class="text-gray-400 text-xs mb-2">Membres</p>
        <div class="flex -space-x-2">
          <div class="w-7 h-7 rounded-full bg-amber-500 border-2 border-white text-white text-xs font-bold flex items-center justify-center">MA</div>
          <div class="w-7 h-7 rounded-full bg-blue-400 border-2 border-white text-white text-xs font-bold flex items-center justify-center">TL</div>
          <div class="w-7 h-7 rounded-full bg-emerald-400 border-2 border-white text-white text-xs font-bold flex items-center justify-center">SB</div>
          <div class="w-7 h-7 rounded-full bg-[#1C1917] border-2 border-white text-amber-400 text-xs font-bold flex items-center justify-center">+</div>
        </div>
      </div>

      <!-- Center lock icon -->
      <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-14 h-14 rounded-2xl bg-amber-500 shadow-xl shadow-amber-200 flex items-center justify-center z-10">
        <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 22V12h6v10"/>
        </svg>
      </div>

    </div>

    <!-- Text -->
    <div class="text-center mb-10 fu2">
      <h2 class="serif text-3xl text-[#1C1917] mb-3">
        Vous n'avez pas encore<br/>de colocation active.
      </h2>
      <p class="text-gray-400 max-w-sm leading-relaxed text-sm">
        Créez votre propre colocation ou rejoignez-en une existante via un lien d'invitation envoyé par votre colocataire.
      </p>
    </div>

    <!-- Two action cards -->
    <div class="grid grid-cols-2 gap-5 w-full max-w-2xl fu3">

      <!-- Option 1: Create -->
      <div class="option-card group" onclick="document.getElementById('modal-create').classList.remove('hidden')">
        <!-- Icon -->
        <div class="w-14 h-14 rounded-2xl bg-[#1C1917] flex items-center justify-center mb-5 group-hover:bg-amber-500 transition-colors">
          <svg class="w-7 h-7 text-amber-400 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
          </svg>
        </div>
        <h3 class="serif text-xl text-[#1C1917] mb-2">Créer une colocation</h3>
        <p class="text-gray-400 text-sm leading-relaxed mb-6">
          Vous devenez <strong class="text-[#1C1917]">Owner</strong>. Vous invitez vos colocataires, gérez les dépenses et les catégories.
        </p>
        <!-- Tags -->
        <div class="flex flex-wrap gap-2 mb-6">
          <span class="bg-amber-50 text-amber-700 text-xs px-2.5 py-1 rounded-full font-semibold">🏠 Vous êtes Owner</span>
          <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-1 rounded-full font-semibold">✉️ Invitations email</span>
          <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-1 rounded-full font-semibold">🏷️ Gestion catégories</span>
        </div>
        <button
          class="w-full bg-[#1C1917] group-hover:bg-amber-500 text-white font-bold py-3 rounded-xl text-sm transition-colors flex items-center justify-center gap-2">
          Créer ma colocation
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </button>
      </div>

      <!-- Option 2: Join -->
      <div class="option-card group" onclick="document.getElementById('modal-join').classList.remove('hidden')">
        <!-- Icon -->
        <div class="w-14 h-14 rounded-2xl bg-[#FDF8F2] border border-gray-200 flex items-center justify-center mb-5 group-hover:bg-amber-500 group-hover:border-amber-500 transition-colors">
          <svg class="w-7 h-7 text-gray-400 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
          </svg>
        </div>
        <h3 class="serif text-xl text-[#1C1917] mb-2">Rejoindre une colocation</h3>
        <p class="text-gray-400 text-sm leading-relaxed mb-6">
          Vous devenez <strong class="text-[#1C1917]">Membre</strong>. Collez le lien d'invitation reçu par email de votre Owner.
        </p>
        <!-- Tags -->
        <div class="flex flex-wrap gap-2 mb-6">
          <span class="bg-blue-50 text-blue-700 text-xs px-2.5 py-1 rounded-full font-semibold">👤 Vous êtes Membre</span>
          <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-1 rounded-full font-semibold">🔗 Lien d'invitation</span>
          <span class="bg-gray-100 text-gray-600 text-xs px-2.5 py-1 rounded-full font-semibold">💸 Suivi dépenses</span>
        </div>
        <button
          class="w-full border-2 border-[#1C1917] group-hover:bg-amber-500 group-hover:border-amber-500 group-hover:text-white text-[#1C1917] font-bold py-3 rounded-xl text-sm transition-colors flex items-center justify-center gap-2">
          Rejoindre avec un lien
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
          </svg>
        </button>
      </div>

    </div>

    <!-- Info note -->
    <div class="fu4 mt-8 flex items-start gap-3 bg-amber-50 border border-amber-100 rounded-2xl px-5 py-4 max-w-2xl w-full">
      <svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
      </svg>
      <p class="text-amber-800 text-xs leading-relaxed">
        <strong>Rappel :</strong> vous ne pouvez appartenir qu'à <strong>une seule colocation active</strong> à la fois. Si vous avez reçu un email d'invitation, cliquez directement sur le lien dans l'email plutôt que de coller le token manuellement.
      </p>
    </div>

  </div>
</main>


<!-- ═══════════════════ MODAL: Créer une colocation ═══════════════════ -->
<div id="modal-create" class="modal-backdrop hidden">
  <div class="modal-card">
    <button onclick="document.getElementById('modal-create').classList.add('hidden')"
      class="absolute right-5 top-5 text-gray-300 hover:text-gray-600 transition">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>

    <!-- Header -->
    <div class="flex items-center gap-4 mb-7">
      <div class="w-12 h-12 rounded-2xl bg-[#1C1917] flex items-center justify-center flex-shrink-0">
        <svg class="w-6 h-6 text-amber-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
        </svg>
      </div>
      <div>
        <h3 class="serif text-2xl text-[#1C1917]">Nouvelle colocation</h3>
        <p class="text-gray-400 text-xs">Vous serez automatiquement Owner.</p>
      </div>
    </div>

    <form action="{{route('welcome.dashboard')}}" method="POST" class="space-y-4">
      @csrf
      <div>
        <label class="block text-sm font-semibold text-[#1C1917] mb-1.5">
          Nom de la colocation <span class="text-red-400">*</span>
        </label>
        <input type="text" name="name" placeholder="Ex: Appartement Voltaire"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-amber-400 focus:outline-none transition"/>
      </div>

      <!-- Owner info -->
      <div class="bg-[#FDF8F2] rounded-xl p-4 flex items-center gap-3">
        <div class="w-9 h-9 rounded-full bg-amber-500 text-white font-bold text-sm flex items-center justify-center flex-shrink-0">{{substr($user,0,2)}}</div>
        <div>
          <p class="text-sm font-semibold text-[#1C1917]">{{$user}}</p>
          <p class="text-xs text-gray-400">Vous serez le <strong class="text-amber-600">Owner</strong> de cette colocation</p>
        </div>
      </div>

      <div class="flex gap-3 pt-2">
        <button type="button"
          onclick="document.getElementById('modal-create').classList.add('hidden')"
          class="flex-1 border border-gray-200 text-gray-600 py-3 rounded-xl text-sm font-semibold hover:bg-gray-50 transition">
          Annuler
        </button>
        <button type="submit"
          class="flex-1 bg-[#1C1917] hover:bg-amber-500 text-white py-3 rounded-xl text-sm font-bold transition">
          Créer ma colocation →
        </button>
      </div>

    </form>
  </div>
</div>


<!-- ═══════════════════ MODAL: Rejoindre via lien ═══════════════════ -->
<div id="modal-join" class="modal-backdrop hidden">
  <div class="modal-card">
    <button onclick="document.getElementById('modal-join').classList.add('hidden')"
      class="absolute right-5 top-5 text-gray-300 hover:text-gray-600 transition">
      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>

    <!-- Header -->
    <div class="flex items-center gap-4 mb-7">
      <div class="w-12 h-12 rounded-2xl bg-[#FDF8F2] border border-gray-200 flex items-center justify-center flex-shrink-0">
        <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
        </svg>
      </div>
      <div>
        <h3 class="serif text-2xl text-[#1C1917]">Rejoindre une colocation</h3>
        <p class="text-gray-400 text-xs">Collez le token reçu dans votre email d'invitation.</p>
      </div>
    </div>

    <form action="/invitations/accept" method="POST" class="space-y-4">

      <div>
        <label class="block text-sm font-semibold text-[#1C1917] mb-1.5">
          Token d'invitation <span class="text-red-400">*</span>
        </label>
        <input type="text" name="token" placeholder="Ex: eyJ0eXAiOiJKV1QiLCJhb..."
          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm focus:ring-2 focus:ring-amber-400 focus:outline-none transition font-mono"/>
        <p class="text-xs text-gray-400 mt-1.5">
          💡 Vous pouvez aussi cliquer directement sur le lien dans votre email.
        </p>
      </div>

      <!-- Warning -->
      <div class="bg-amber-50 border border-amber-100 rounded-xl p-3.5 flex gap-2.5">
        <svg class="w-4 h-4 text-amber-500 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
        </svg>
        <p class="text-amber-800 text-xs leading-relaxed">
          L'email associé à votre compte doit correspondre à l'email sur lequel l'invitation a été envoyée.
        </p>
      </div>

      <div class="flex gap-3 pt-2">
        <button type="button"
          onclick="document.getElementById('modal-join').classList.add('hidden')"
          class="flex-1 border border-gray-200 text-gray-600 py-3 rounded-xl text-sm font-semibold hover:bg-gray-50 transition">
          Annuler
        </button>
        <button type="submit"
          class="flex-1 bg-[#1C1917] hover:bg-amber-500 text-white py-3 rounded-xl text-sm font-bold transition">
          Rejoindre →
        </button>
      </div>

    </form>
  </div>
</div>


</body>
</html>
