<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CoLoc — Inscription</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Nunito:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .serif {
            font-family: 'DM Serif Display', serif;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(14px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .fade-up {
            animation: fadeUp .5s ease both;
        }

        .fade-up-2 {
            animation: fadeUp .5s .1s ease both;
        }

        .fade-up-3 {
            animation: fadeUp .5s .2s ease both;
        }
    </style>
</head>

<body class="min-h-screen bg-[#FDF8F2] flex">

    <!-- Left Branding -->
    <div class="hidden lg:flex w-5/12 bg-[#1C1917] flex-col justify-between p-14 relative overflow-hidden">
        <div
            class="absolute top-0 right-0 w-80 h-80 bg-amber-700 opacity-10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2">
        </div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#6B7C62] opacity-10 rounded-full blur-2xl"></div>

        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-20">
                <div class="w-10 h-10 rounded-xl bg-amber-500 flex items-center justify-center">
                    <span class="serif text-white text-xl">C</span>
                </div>
                <span class="serif text-2xl text-amber-400">CoLoc</span>
            </div>
            <h1 class="serif text-4xl text-white leading-snug">
                Rejoignez des<br /><em class="text-amber-400">milliers</em> de<br />colocataires.
            </h1>
            <ul class="mt-10 space-y-4 text-gray-400 text-sm">
                <li class="flex gap-3 items-start">
                    <span
                        class="mt-0.5 w-5 h-5 rounded-full bg-amber-500 text-white text-xs flex items-center justify-center flex-shrink-0">✓</span>
                    Suivi automatique des dépenses partagées
                </li>
                <li class="flex gap-3 items-start">
                    <span
                        class="mt-0.5 w-5 h-5 rounded-full bg-amber-500 text-white text-xs flex items-center justify-center flex-shrink-0">✓</span>
                    Calcul des soldes et remboursements en un clic
                </li>
                <li class="flex gap-3 items-start">
                    <span
                        class="mt-0.5 w-5 h-5 rounded-full bg-amber-500 text-white text-xs flex items-center justify-center flex-shrink-0">✓</span>
                    Système de réputation pour des colocations sereines
                </li>
            </ul>
        </div>

        <div class="relative z-10">
            <p class="text-gray-600 text-xs">"CoLoc a complètement changé notre quotidien en colocation. Plus de
                disputes financières !"</p>
            <div class="flex items-center gap-3 mt-4">
                <div
                    class="w-8 h-8 rounded-full bg-amber-500 flex items-center justify-center text-white text-xs font-700">
                    SA</div>
                <div>
                    <div class="text-white text-sm font-600">Sofia A.</div>
                    <div class="text-gray-500 text-xs">Utilisatrice depuis 2023</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Form -->
    <div class="flex-1 flex items-center justify-center px-6 lg:px-16 py-12">
        <div class="w-full max-w-lg">

            <div class="flex lg:hidden items-center gap-2 mb-10">
                <div class="w-8 h-8 rounded-lg bg-amber-500 flex items-center justify-center">
                    <span class="serif text-white text-lg">C</span>
                </div>
                <span class="serif text-xl text-[#1C1917]">CoLoc</span>
            </div>

            <div class="fade-up">
                <h2 class="serif text-4xl text-[#1C1917] mb-1">Créer un compte</h2>
                <p class="text-gray-500 text-sm mb-8">Remplissez le formulaire pour commencer.</p>
            </div>

            <form action="{{ route('register') }}" method="POST" class="space-y-4 fade-up-2">
                @csrf
                <div>
                    <label class="block text-sm font-600 text-[#1C1917] mb-1.5">Nom Complete</label>
                    <input type="text" name="name" placeholder="John Doe"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 transition" />
                </div>
                <div>
                    <label class="block text-sm font-600 text-[#1C1917] mb-1.5">Adresse email</label>
                    <input type="email" name="email" placeholder="marie.dupont@exemple.fr"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 transition" />
                </div>
                <div>
                    <label class="block text-sm font-600 text-[#1C1917] mb-1.5">Mot de passe</label>
                    <input type="password" name="password" placeholder="Min. 8 caractères"
                        class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white text-sm focus:outline-none focus:ring-2 focus:ring-amber-400 transition" />
                </div>


                <div class="flex items-start gap-3 pt-1">
                    <input type="checkbox" id="terms" name="terms" class="accent-amber-500 w-4 h-4 mt-0.5" />
                    <label for="terms" class="text-sm text-gray-500 leading-snug">
                        J'accepte les <a href="#" class="text-amber-600 hover:underline">conditions
                            d'utilisation</a> et la <a href="#" class="text-amber-600 hover:underline">politique
                            de confidentialité</a>.
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-[#1C1917] hover:bg-[#3C3733] text-white font-700 py-3.5 rounded-xl transition text-sm tracking-wide mt-2">
                    Créer mon compte →
                </button>

            </form>

            <p class="fade-up-3 text-center text-sm text-gray-400 mt-7">
                Déjà un compte ? <a href="/login" class="text-amber-600 font-600 hover:underline">Se connecter</a>
            </p>
        </div>
    </div>

</body>

</html>
