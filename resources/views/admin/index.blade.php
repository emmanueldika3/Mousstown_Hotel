<x-app-layout>
    <body class="bg-gray-100 font-sans antialiased">

<div class="flex min-h-screen">
    <aside class="w-64 bg-indigo-900 text-white flex-col hidden md:flex">
        <div class="p-6 text-2xl font-bold border-b border-indigo-800">Hotel Admin</div>
        <nav class="flex-1 p-4 space-y-2">
            <a href="#" class="flex items-center p-3 bg-indigo-800 rounded-lg"><i class="fas fa-home mr-3"></i> Dashboard</a>
            <a href="#" class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition"><i class="fas fa-bed mr-3"></i> Chambres</a>
            <a href="#" class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition"><i class="fas fa-calendar-check mr-3"></i> Réservations</a>
            <a href="#" class="flex items-center p-3 hover:bg-indigo-800 rounded-lg transition"><i class="fas fa-users mr-3"></i> Clients</a>
        </nav>
        <div class="p-4 border-t border-indigo-800">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left p-3 hover:bg-red-600 rounded-lg transition"><i class="fas fa-sign-out-alt mr-3"></i> Déconnexion</button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-8">
        <header class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Vue d'ensemble</h1>
            <div class="flex items-center space-x-4">
                <span class="text-gray-600 italic">Bonjour, Administrateur</span>
                <img src="https://ui-avatars.com/api/?name=Admin&background=4f46e5&color=fff" class="w-10 h-10 rounded-full border-2 border-white shadow">
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-blue-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold uppercase">Total Réservations</p>
                        <h3 class="text-2xl font-bold">{{ $stats['total'] }}</h3>
                    </div>
                    <i class="fas fa-clipboard-list text-3xl text-blue-200"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-yellow-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold uppercase">En Attente</p>
                        <h3 class="text-2xl font-bold">{{ $stats['pending'] }}</h3>
                    </div>
                    <i class="fas fa-clock text-3xl text-yellow-200"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-green-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold uppercase">Revenu Global</p>
                        <h3 class="text-2xl font-bold">{{ number_format($stats['revenue'], 0, ',', ' ') }} FCFA</h3>
                    </div>
                    <i class="fas fa-wallet text-3xl text-green-200"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border-l-4 border-indigo-500">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-sm text-gray-500 font-semibold uppercase">Disponibilité</p>
                        <h3 class="text-2xl font-bold">{{ $stats['rooms'] }} Chambres</h3>
                    </div>
                    <i class="fas fa-door-open text-3xl text-indigo-200"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                <h2 class="text-lg font-bold text-gray-800">Dernières Réservations</h2>
                <button class="text-sm text-indigo-600 font-semibold hover:underline">Voir tout</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-xs uppercase font-semibold">
                            <th class="px-6 py-4">Client</th>
                            <th class="px-6 py-4">Chambre</th>
                            <th class="px-6 py-4">Dates</th>
                            <th class="px-6 py-4">Prix Total</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($bookings as $booking)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="font-medium text-gray-900">{{ $booking->user->name }}</div>
                                <div class="text-xs text-gray-500">{{ $booking->user->email }}</div>
                            </td>
                            <td class="px-6 py-4 text-gray-600">N° {{ $booking->room->room_number }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="block">Du {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</span>
                                <span class="text-gray-400">au {{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</span>
                            </td>
                            <td class="px-6 py-4 font-bold text-indigo-600">{{ number_format($booking->total_price, 0, ',', ' ') }}</td>
                            <td class="px-6 py-4">
                                @if($booking->status == 'en_attente')
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold">ATTENTE</span>
                                @elseif($booking->status == 'confirme')
                                    <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-xs font-bold">CONFIRMÉ</span>
                                @else
                                    <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold">ANNULÉ</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center space-x-2">
                                <button title="Confirmer" class="p-2 bg-green-50 text-green-600 rounded-lg hover:bg-green-600 hover:text-white transition"><i class="fas fa-check"></i></button>
                                <button title="Modifier" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition"><i class="fas fa-edit"></i></button>
                                <button title="Supprimer" class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-400">Aucune réservation pour le moment.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>
</x-app-layout>
