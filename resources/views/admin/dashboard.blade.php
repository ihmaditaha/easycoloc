<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CoLoc — Administration</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Nunito:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background: #FDF8F2;
        }

        .serif {
            font-family: 'DM Serif Display', serif;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(12px)
            }

            to {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .fu {
            animation: fadeUp .4s ease both;
        }

        .fu2 {
            animation: fadeUp .4s .08s ease both;
        }

        .fu3 {
            animation: fadeUp .4s .16s ease both;
        }

        ::-webkit-scrollbar {
            width: 5px
        }

        ::-webkit-scrollbar-thumb {
            background: #D4C9BB;
            border-radius: 4px
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <aside class="w-64 bg-[#1C1917] flex flex-col min-h-screen fixed left-0 top-0 z-30">
        <div class="px-6 pt-7 pb-6 border-b border-white/10">
            <a href="/dashboard" class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-amber-500 flex items-center justify-center">
                    <span class="serif text-white text-xl font-bold">C</span>
                </div>
                <span class="serif text-amber-400 text-xl">CoLoc</span>
            </a>
        </div>
        <nav class="flex-1 py-5 px-3 space-y-1">
            <a href="/dashboard"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-400 hover:text-white hover:bg-white/10 transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M5 10v10h14V10" />
                </svg>
                Tableau de bord
            </a>
            <a href="/colocations/1"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-400 hover:text-white hover:bg-white/10 transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 22V12h6v10" />
                </svg>
                Ma Colocation
            </a>
            <a href="/expenses"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-400 hover:text-white hover:bg-white/10 transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                </svg>
                Dépenses
            </a>
            <a href="/balances"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-400 hover:text-white hover:bg-white/10 transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 6l3 1m0 0l-3 9a5 5 0 006.47 4.97M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5 5 0 01-6.47 4.97M18 7l3 9" />
                </svg>
                Balances
            </a>
            <a href="/profile"
                class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-gray-400 hover:text-white hover:bg-white/10 transition">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
                Mon profil
            </a>
            <div class="pt-2 border-t border-white/10 mt-2">
                <a href="/admin"
                    class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold bg-amber-500 text-white transition">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    Administration
                </a>
            </div>
        </nav>
        <div class="p-4 border-t border-white/10">
            <div class="flex items-center gap-3">
                <div
                    class="w-9 h-9 rounded-full bg-amber-500 flex items-center justify-center text-white font-bold text-sm">
                    AD</div>
                <div class="min-w-0">
                    <div class="text-white text-sm font-semibold truncate">Admin Principal</div>
                    <div class="text-amber-400 text-xs">Global Admin</div>
                </div>
            </div>
        </div>
    </aside>

    <main class="ml-64 p-8 min-h-screen">

        <!-- Header -->
        <div class="fu flex items-center justify-between mb-8">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span class="text-xs font-semibold text-amber-600 uppercase tracking-wider">Administration
                        globale</span>
                </div>
                <h1 class="serif text-4xl text-[#1C1917]">Dashboard Admin</h1>
            </div>
            <div class="bg-amber-50 border border-amber-200 text-amber-700 text-sm px-4 py-2 rounded-xl font-semibold">
                ● Plateforme opérationnelle
            </div>
        </div>

        <!-- Stats Row -->
        <div class="fu2 grid grid-cols-4 gap-5 mb-8">
            <div class="bg-[#1C1917] rounded-2xl p-5 text-white relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-20 h-20 bg-amber-500 opacity-20 rounded-full"></div>
                <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-3">Utilisateurs</p>
                <p class="serif text-3xl text-amber-400">{{$total_users}}</p>
                <p class="text-gray-500 text-xs mt-2">↑ +18 ce mois</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100 relative overflow-hidden">
                <div class="absolute -right-4 -top-4 w-20 h-20 bg-emerald-100 rounded-full"></div>
                <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-3">Colocations actives</p>
                <p class="serif text-3xl text-[#1C1917]">{{$active_colocations}}</p>
                <p class="text-gray-400 text-xs mt-2">↑ +7 cette semaine</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100">
                <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-3">Total dépenses</p>
                <p class="serif text-3xl text-[#1C1917]">{{$total_depences}} DH </p>
                <p class="text-gray-400 text-xs mt-2">48 340 transactions</p>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-gray-100">
                <p class="text-gray-400 text-xs font-semibold uppercase tracking-wider mb-3">Utilisateurs bannis</p>
                <p class="serif text-3xl text-red-500">{{$banned_users}} User</p>
                <p class="text-gray-400 text-xs mt-2">2 cette semaine</p>
            </div>
        </div>

        <!-- Two-Column: Users Table + Banned Users -->
        <div class="fu3 grid grid-cols-3 gap-6">

            <!-- Users Table -->
            <div class="col-span-2 bg-white rounded-2xl border border-gray-100 overflow-hidden">
                <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                    <h2 class="serif text-lg text-[#1C1917]">Tous les utilisateurs</h2>
                    <div class="flex gap-2">
                        <input type="text" placeholder="Rechercher un utilisateur…"
                            class="px-3 py-2 rounded-xl border border-gray-200 text-xs focus:outline-none focus:ring-2 focus:ring-amber-400 w-48" />
                        <select class="px-3 py-2 rounded-xl border border-gray-200 text-xs focus:outline-none">
                            <option>Tous</option>
                            <option>Actifs</option>
                            <option>Bannis</option>
                        </select>
                    </div>
                </div>
                <table class="w-full">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th
                                class="text-left px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                Utilisateur</th>
                            <th
                                class="text-left px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                Rôle</th>
                            <th
                                class="text-left px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                Réputation</th>
                            <th
                                class="text-left px-5 py-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">
                                Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-50/50 transition">

                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-8 h-8 rounded-full bg-amber-500 text-white text-xs font-bold flex items-center justify-center">
                                            {{ substr($user->name, 0, 2) }}</div>
                                        <div>
                                            <p class="text-sm font-semibold text-[#1C1917]">{{ $user->name }}</p>
                                            <p class="text-xs text-gray-400">{{ $user->email }}</p>
                                        </div>


                                    </div>
                                </td>

                                <td class="px-5 py-4"><span
                                        class="bg-amber-100 text-amber-700 text-xs px-2.5 py-1 rounded-full font-semibold">
                                        {{ $user->role }}</span></td>
                                <td class="px-5 py-4 text-sm font-semibold text-[#1C1917]">⭐ +12</td>
                                <td class="px-5 py-4"><span class="text-gray-300 text-xs">—</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-5 py-3 bg-gray-50 border-t border-gray-100 flex justify-between items-center">
                    {{ $users->links() }}
                </div>
            </div>

            <!-- Right column: stats cards -->
            <div class="space-y-5">

                <!-- Colocations actives -->
                <div class="bg-white rounded-2xl border border-gray-100 p-5">
                    <h3 class="serif text-base text-[#1C1917] mb-4">Colocations récentes</h3>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-[#1C1917]">Appartement Voltaire</p>
                                <p class="text-xs text-gray-400">4 membres · Active</p>
                            </div>
                            <span
                                class="text-xs bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full font-semibold">Active</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-[#1C1917]">Studio Oberkampf</p>
                                <p class="text-xs text-gray-400">2 membres · Active</p>
                            </div>
                            <span
                                class="text-xs bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full font-semibold">Active</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-gray-500">Villa Méditerranée</p>
                                <p class="text-xs text-gray-400">5 membres · Annulée</p>
                            </div>
                            <span
                                class="text-xs bg-gray-100 text-gray-500 px-2 py-0.5 rounded-full font-semibold">Annulée</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-semibold text-[#1C1917]">Loft Nation</p>
                                <p class="text-xs text-gray-400">3 membres · Active</p>
                            </div>
                            <span
                                class="text-xs bg-emerald-100 text-emerald-700 px-2 py-0.5 rounded-full font-semibold">Active</span>
                        </div>
                    </div>
                    <a href="/admin/colocations"
                        class="block text-center text-xs text-amber-600 hover:underline font-semibold mt-4">
                        Voir toutes les colocations →
                    </a>
                </div>

                <!-- Stats par catégorie -->
                <div class="bg-white rounded-2xl border border-gray-100 p-5">
                    <h3 class="serif text-base text-[#1C1917] mb-4">Top catégories</h3>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">🏠 Loyer</span>
                                <span class="font-semibold">41%</span>
                            </div>
                            <div class="h-1.5 bg-gray-100 rounded-full">
                                <div class="h-full bg-amber-500 rounded-full" style="width:41%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">🛒 Courses</span>
                                <span class="font-semibold">28%</span>
                            </div>
                            <div class="h-1.5 bg-gray-100 rounded-full">
                                <div class="h-full bg-blue-400 rounded-full" style="width:28%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">⚡ Électricité</span>
                                <span class="font-semibold">15%</span>
                            </div>
                            <div class="h-1.5 bg-gray-100 rounded-full">
                                <div class="h-full bg-emerald-400 rounded-full" style="width:15%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">🍽 Restaurant</span>
                                <span class="font-semibold">10%</span>
                            </div>
                            <div class="h-1.5 bg-gray-100 rounded-full">
                                <div class="h-full bg-rose-400 rounded-full" style="width:10%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between text-sm mb-1">
                                <span class="text-gray-600">📦 Autres</span>
                                <span class="font-semibold">6%</span>
                            </div>
                            <div class="h-1.5 bg-gray-100 rounded-full">
                                <div class="h-full bg-gray-300 rounded-full" style="width:6%"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
</body>

</html>
