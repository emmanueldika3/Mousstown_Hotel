<x-app-layout>
    <div style="display: flex; min-height: 100vh; margin: -2rem; background: #f4f7fe;">

        <aside style="width: 280px; background: #1a202c; color: white; position: sticky; top: 0; height: 100vh; display: flex; flex-direction: column; box-shadow: 4px 0 15px rgba(0,0,0,0.1); z-index: 90;">
            <div style="padding: 2.5rem 1.5rem; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05);">
                <img src="/images/logo_MH.png" alt="Logo" style="width: 70px; height: 70px; border-radius: 50%; border: 3px solid #f97316; background: white; margin: 0 auto 15px; object-fit: cover;">
                <h1 style="font-size: 0.85rem; font-weight: 800; color: white; text-transform: uppercase; margin: 0;">MOUSSTOWN <span style="color: #f97316;">HOTEL</span></h1>
            </div>

            <nav style="flex: 1; padding: 1.5rem 1rem;">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.index') }}" class="nav-btn">📊 <span style="margin-left:10px">Vue d'ensemble</span></a></li>
                    <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.rooms.index') }}" class="nav-btn active">🛏️ <span style="margin-left:10px">Gestion Chambres</span></a></li>
                    <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.bookings.index') }}" class="nav-btn">📅 <span style="margin-left:10px">Réservations</span></a></li>
                    <li style="margin-bottom: 0.8rem;"><a href="#" class="nav-btn">💰 <span style="margin-left:10px">Comptabilité</span></a></li>
                </ul>
            </nav>
        </aside>

        <main style="flex: 1; padding: 2.5rem;">

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;">
                <div>
                    <h2 style="font-size: 1.8rem; font-weight: 800; color: #1a202c; margin: 0;">Catalogue des Chambres</h2>
                    <p style="color: #718096; font-weight: 500;">Gérez vos unités d'hébergement et leurs tarifs</p>
                </div>
                <button style="background: #f97316; color: white; padding: 14px 28px; border-radius: 15px; border: none; font-weight: 700; cursor: pointer; box-shadow: 0 10px 20px rgba(249, 115, 22, 0.2); transition: 0.3s;">
                    + Ajouter une chambre
                </button>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 2rem;">
                @forelse($rooms as $room)
                <div class="room-card">
                    <div style="height: 200px; position: relative; overflow: hidden;">
                        <img src="{{ $room->image_url ?? 'https://via.placeholder.com/400x250?text=Pas+d+image' }}"
                             style="width: 100%; height: 100%; object-fit: cover; transition: 0.5s;" class="card-img">

                        <span style="position: absolute; top: 15px; right: 15px; padding: 6px 14px; border-radius: 30px; font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px;
                            background: {{ $room->status == 'disponible' ? '#dcfce7' : '#fee2e2' }};
                            color: {{ $room->status == 'disponible' ? '#15803d' : '#b91c1c' }}; shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            {{ $room->status }}
                        </span>
                    </div>

                    <div style="padding: 1.5rem;">
                        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px;">
                            <div>
                                <h3 style="margin: 0; font-size: 1.25rem; font-weight: 800; color: #1a202c;">{{ $room->room_number }}</h3>
                                <span style="font-size: 0.8rem; color: #f97316; font-weight: 700; text-transform: uppercase;">{{ $room->type }}</span>
                            </div>
                            <div style="text-align: right;">
                                <span style="display: block; font-size: 1.3rem; font-weight: 900; color: #1a202c;">{{ number_format($room->price, 0, ',', ' ') }}</span>
                                <small style="font-size: 0.7rem; color: #a0aec0; font-weight: 700;">CFA / NUIT</small>
                            </div>
                        </div>

                        <p style="color: #718096; font-size: 0.9rem; line-height: 1.5; margin-bottom: 1.5rem; height: 45px; overflow: hidden;">
                            {{ Str::limit($room->description, 80) }}
                        </p>

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px; border-top: 1px solid #f1f5f9; padding-top: 1.2rem;">
                            <button class="action-btn edit">Modifier</button>
                            <button class="action-btn delete">Supprimer</button>
                        </div>
                    </div>
                </div>
                @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 5rem; background: white; border-radius: 24px; border: 2px dashed #e2e8f0;">
                    <span style="font-size: 3rem;">📭</span>
                    <h3 style="color: #a0aec0; margin-top: 1rem;">Aucune chambre trouvée. Lancez le Seeder !</h3>
                </div>
                @endforelse
            </div>
        </main>
    </div>

    <style>
        /* Styles Sidebar */
        .nav-btn { display: flex; align-items: center; padding: 14px 18px; color: #a0aec0; text-decoration: none; border-radius: 15px; font-weight: 600; transition: all 0.3s; }
        .nav-btn:hover { background: rgba(249, 115, 22, 0.1); color: #f97316; transform: translateX(5px); }
        .nav-btn.active { background: #f97316; color: white !important; box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3); }

        /* Styles Cartes */
        .room-card { background: white; border-radius: 24px; overflow: hidden; transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); border: 1px solid #edf2f7; }
        .room-card:hover { transform: translateY(-12px); box-shadow: 0 20px 30px rgba(0,0,0,0.08); }
        .room-card:hover .card-img { transform: scale(1.1); }

        /* Boutons d'action */
        .action-btn { padding: 10px; border-radius: 12px; font-weight: 700; cursor: pointer; font-size: 0.85rem; border: none; transition: 0.2s; }
        .edit { background: #f0f7ff; color: #3b82f6; }
        .edit:hover { background: #3b82f6; color: white; }
        .delete { background: #fff5f5; color: #e53e3e; }
        .delete:hover { background: #e53e3e; color: white; }

        .max-w-7xl { max-width: none !important; }
        .py-12 { padding: 0 !important; }
    </style>
</x-app-layout>
