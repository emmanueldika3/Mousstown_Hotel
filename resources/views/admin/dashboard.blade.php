<x-app-layout>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #0f172a; }
        
        /* Couleurs Mousstown */
        .bg-night { background-color: #0f172a; }
        .bg-orange-mouss { background-color: #ff6b00; }
        .text-orange-mouss { color: #ff6b00; }

        /* Sidebar : Alignement Gauche Strict */
        .nav-item {
            display: flex;
            align-items: center;
            padding: 1rem 1.5rem;
            width: 100%;
            text-align: left;
            border-radius: 12px;
            transition: all 0.2s ease;
            margin-bottom: 0.75rem; /* Espace entre les boutons */
        }
        .nav-item:hover {
            background-color: rgba(255, 107, 0, 0.1);
            color: #ff6b00;
        }
        .nav-item.active {
            background-color: #ff6b00;
            color: white;
        }

        /* Cartes Aérées */
        .stat-card {
            background: white;
            padding: 2.5rem;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="flex min-h-screen">
        <aside class="w-72 bg-night text-white flex flex-col shrink-0 px-4 py-10 mb-3">
            <div class="mb-12 px-2">
                <h1 class="text-2xl font-extrabold tracking-tighter uppercase">
                    MOUSS<span class="text-orange-mouss">TOWN</span>
                </h1>
                <p class="text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em] mt-1">Management System</p>
            </div>

            <nav class="flex-1">
                <p class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest px-4 mb-4">Menu</p>
                
                <a href="#" class="nav-item active">
                    <i class="fas fa-chart-pie mr-4 w-5"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Dashboard</span>
                </a>

                <a href="#" class="nav-item text-slate-400">
                    <i class="fas fa-bed mr-4 w-5"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Hébergements</span>
                </a>

                <a href="#" class="nav-item text-slate-400">
                    <i class="fas fa-users mr-4 w-5"></i>
                    <span class="text-sm font-bold uppercase tracking-wide">Clients</span>
                </a>

                <div class="mt-10 mb-4 px-4">
                    <p class="text-[10px] font-extrabold text-slate-500 uppercase tracking-widest text-orange-mouss">Opérations</p>
                </div>
                <button class="nav-item text-slate-400 bg-white/5 mb-3">
                    <i class="fas fa-plus mr-4 w-5 text-orange-mouss"></i>
                    <span class="text-sm font-bold uppercase">Ajouter une réservation</span>
                </button>

                <button class="nav-item text-slate-400 bg-white/5 mb-3">
                    <i class="fas fa-plus mr-4 w-5 text-orange-mouss"></i>
                    <span class="text-sm font-bold uppercase">Ajouter une Suite</span>
                </button>

                <button class="nav-item text-slate-400 bg-white/5">
                    <i class="fas fa-concierge-bell mr-4 w-5 text-orange-mouss"></i>
                    <span class="text-sm font-bold uppercase">Services</span>
                </button>

                <button class="nav-item text-slate-400 bg-white/5 mb-3">
                    <i class="fas fa-plus mr-4 w-5 text-orange-mouss"></i>
                    <span class="text-sm font-bold uppercase">Ajouter du personnel</span>
                </button>
            </nav>

            <div class="pt-6 border-t border-slate-800">
                <button class="flex items-center w-full px-4 py-3 text-red-400 font-bold text-xs uppercase hover:bg-red-500/10 rounded-xl transition">
                    <i class="fas fa-power-off mr-4 text-orange-mouss mx-2"></i> Déconnexion
                </button>
            </div>
        </aside>

        <main class="flex-1 p-12 overflow-y-auto">
            <header class="flex justify-between items-center mb-16">
                <div>
                    <h2 class="text-4xl font-extrabold text-slate-900 tracking-tight">Console de Direction</h2>
                    <p class="text-slate-500 font-semibold mt-2">Bienvenue sur votre interface de gestion, Administrateur.</p>
                </div>
                
                <div class="flex items-center gap-6">
                    <div class="text-right">
                        <p class="text-sm font-extrabold text-slate-900">ADMIN GÉNÉRAL</p>
                        <p class="text-xs font-bold text-orange-mouss uppercase tracking-widest">En ligne</p>
                    </div>
                    <div class="w-14 h-14 bg-slate-200 rounded-2xl"></div>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-16">
                <div class="stat-card border-l-8 border-orange-mouss">
                    <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">Recettes</p>
                    <h3 class="text-4xl font-extrabold text-slate-900">{{ number_format($stats['revenue'], 0, ',', ' ') }} <span class="text-lg font-bold text-slate-400">XAF</span></h3>
                </div>

                <div class="stat-card">
                    <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">Réservations à traiter</p>
                    <h3 class="text-4xl font-extrabold text-slate-900">{{ $stats['pending'] }} <span class="text-lg font-bold text-orange-mouss">Alertes</span></h3>
                </div>

                <div class="stat-card">
                    <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">Unités Disponibles</p>
                    <h3 class="text-4xl font-extrabold text-slate-900">{{ $stats['rooms'] }} <span class="text-lg font-bold text-slate-400">Suites</span></h3>
                </div>
            </div>

            <div class="bg-white rounded-[32px] border border-slate-200 shadow-sm overflow-hidden">
                <div class="p-10 border-b border-slate-100">
                    <h3 class="text-xl font-extrabold text-slate-900 uppercase tracking-tight">Registre des Flux</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-slate-50/50 text-slate-400 text-[11px] font-extrabold uppercase tracking-[0.15em]">
                                <th class="px-10 py-6">Identité du Client</th>
                                <th class="px-10 py-6">Détails Suite</th>
                                <th class="px-10 py-6">État Actuel</th>
                                <th class="px-10 py-6 text-right">Facturation</th>
                                <th class="px-10 py-6 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($bookings as $booking)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-10 py-8 text-sm font-extrabold text-slate-800 uppercase">
                                    {{ $booking->user->name }}
                                </td>
                                <td class="px-10 py-8">
                                    <div class="text-sm font-bold text-slate-700 uppercase">N° {{ $booking->room->room_number }}</div>
                                    <div class="text-xs font-semibold text-slate-400">{{ $booking->room->type }}</div>
                                </td>
                                <td class="px-10 py-8">
                                    @if($booking->status == 'en_attente')
                                        <span class="px-4 py-1.5 bg-orange-100 text-orange-700 text-[10px] font-extrabold rounded-full">EN ATTENTE</span>
                                    @else
                                        <span class="px-4 py-1.5 bg-emerald-100 text-emerald-700 text-[10px] font-extrabold rounded-full">VALIDÉ</span>
                                    @endif
                                </td>
                                <td class="px-10 py-8 text-right font-extrabold text-slate-900">
                                    {{ number_format($booking->total_price, 0, ',', ' ') }} <span class="text-orange-mouss text-xs">XAF</span>
                                </td>
                                <td class="px-10 py-8">
                                    <div class="flex justify-center">
                                        @if($booking->status == 'en_attente')
                                        <form action="{{ route('admin.bookings.approve', $booking->id) }}" method="POST">
                                            @csrf @method('PATCH')
                                            <button class="bg-orange-mouss text-white px-8 py-2.5 rounded-xl text-[10px] font-extrabold uppercase tracking-widest hover:shadow-lg hover:shadow-orange-500/30 transition">
                                                Valider
                                            </button>
                                        </form>
                                        @else
                                        <span class="text-emerald-500 font-bold text-xs uppercase">Enregistré</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>