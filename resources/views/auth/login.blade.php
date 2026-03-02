<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>CoLoc — Connexion</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Nunito:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: { extend: {
        colors: { cream:'#FDF8F2', charcoal:'#1C1917', amber:'#D97706', sage:'#6B7C62' },
        fontFamily: { serif:['"DM Serif Display"','serif'], sans:['Nunito','sans-serif'] }
      }}
    }
  </script>
  <style>
    body { font-family:'Nunito',sans-serif; }
    .serif { font-family:'DM Serif Display',serif; }
    @keyframes fadeUp { from{opacity:0;transform:translateY(14px)} to{opacity:1;transform:translateY(0)} }
    .fade-up { animation: fadeUp .5s ease both; }
    .fade-up-2 { animation: fadeUp .5s .12s ease both; }
    .fade-up-3 { animation: fadeUp .5s .24s ease both; }
    .grain::after {
      content:''; position:absolute; inset:0;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
      pointer-events:none; border-radius:inherit;
    }
  </style>
</head>
<body class="min-h-screen bg-[#FDF8F2] flex">

  <!-- Left Panel — Branding -->
  <div class="hidden lg:flex w-1/2 bg-[#1C1917] text-white flex-col justify-between p-14 relative overflow-hidden grain">
    <!-- Background circles -->
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-amber-600 opacity-10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-72 h-72 bg-[#6B7C62] opacity-15 rounded-full blur-2xl"></div>

    <!-- Logo -->
    <div class="relative z-10">
      <div class="flex items-center gap-3 mb-16">
        <div class="w-10 h-10 rounded-xl bg-amber-500 flex items-center justify-center text-white font-bold text-xl">
          <span class="serif">C</span>
        </div>
        <span class="serif text-2xl text-amber-400">CoLoc</span>
      </div>

      <h1 class="serif text-5xl leading-snug text-cream mb-6">
        Gérez vos<br/><em class="text-amber-400">dépenses</em><br/>en colocation.
      </h1>
      <p class="text-gray-400 text-base leading-relaxed max-w-xs">
        Suivi des dépenses partagées, calcul automatique des soldes et remboursements simplifiés pour votre colocation.
      </p>
    </div>

    <!-- Stats strip -->
    <div class="relative z-10 flex gap-10">
      <div>
        <div class="serif text-3xl text-amber-400">1 200+</div>
        <div class="text-gray-500 text-sm mt-1">Colocations actives</div>
      </div>
      <div>
        <div class="serif text-3xl text-amber-400">48 k</div>
        <div class="text-gray-500 text-sm mt-1">Dépenses enregistrées</div>
      </div>
      <div>
        <div class="serif text-3xl text-amber-400">€ 2M</div>
        <div class="text-gray-500 text-sm mt-1">Remboursés</div>
      </div>
    </div>
  </div>

  <!-- Right Panel — Form -->
  <div class="flex-1 flex items-center justify-center px-6 lg:px-20">
    <div class="w-full max-w-md">

      <!-- Mobile logo -->
      <div class="flex lg:hidden items-center gap-2 mb-10">
        <div class="w-8 h-8 rounded-lg bg-amber-500 flex items-center justify-center">
          <span class="serif text-white text-lg">C</span>
        </div>
        <span class="serif text-xl text-[#1C1917]">CoLoc</span>
      </div>

      <div class="fade-up">
        <h2 class="serif text-4xl text-[#1C1917] mb-1">Bon retour 👋</h2>
        <p class="text-gray-500 text-sm mb-10">Connectez-vous à votre espace colocation.</p>
      </div>

      <form action="{{route('login')}}" method="POST" class="space-y-5 fade-up-2">
        @csrf

        <div>
          <label class="block text-sm font-600 text-[#1C1917] mb-1.5">Adresse email</label>
          <input type="email" name="email" placeholder="vous@exemple.fr"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"/>
        </div>

        <div>
          <div class="flex justify-between items-center mb-1.5">
            <label class="block text-sm font-600 text-[#1C1917]">Mot de passe</label>
            <a href="/forgot-password" class="text-xs text-amber-600 hover:underline">Mot de passe oublié ?</a>
          </div>
          <input type="password" name="password" placeholder="••••••••"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"/>
        </div>

        <div class="flex items-center gap-2">
          <input type="checkbox" id="remember" name="remember" class="accent-amber-500 w-4 h-4"/>
          <label for="remember" class="text-sm text-gray-500">Se souvenir de moi</label>
        </div>

        <button type="submit"
          class="w-full bg-[#1C1917] hover:bg-[#3C3733] text-white font-700 py-3.5 rounded-xl transition text-sm tracking-wide">
          Se connecter →
        </button>

      </form>

      <p class="fade-up-3 text-center text-sm text-gray-400 mt-8">
        Pas encore de compte ?
        <a href="/register" class="text-amber-600 font-600 hover:underline">Créer un compte</a>
      </p>

    </div>
  </div>

</body>
</html>
