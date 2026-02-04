<x-app-layout>
    <div style="display: flex; min-height: 100vh; margin: -2rem; background: #f4f7fe;">

        <aside style="width: 280px; background: #1a202c; color: white; position: sticky; top: 0; height: 100vh; display: flex; flex-direction: column; box-shadow: 4px 0 15px rgba(0,0,0,0.1); z-index: 1000;">
            <div style="padding: 2.5rem 1.5rem; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05);">
                <img src="/images/logo_MH.png" alt="Logo" style="width: 70px; height: 70px; border-radius: 50%; border: 3px solid #f97316; background: white; margin: 0 auto 15px; object-fit: cover;">
                <h1 style="font-size: 0.85rem; font-weight: 800; color: white; text-transform: uppercase; margin: 0;">MOUSSTOWN <span style="color: #f97316;">HOTEL</span></h1>
            </div>
            <nav style="flex: 1; padding: 1.5rem 1rem;">
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.index') }}" class="nav-btn">📊 <span style="margin-left:10px">Vue d'ensemble</span></a></li>
                    <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.rooms.index') }}" class="nav-btn">🛏️ <span style="margin-left:10px">Gestion Chambres</span></a></li>
                    <li style="margin-bottom: 0.8rem;"><a href="{{ route('admin.bookings.index') }}" class="nav-btn active">📅 <span style="margin-left:10px">Réservations</span></a></li>
                </ul>
            </nav>
        </aside>

        <main style="flex: 1; padding: 2.5rem;">

            <div style="margin-bottom: 2.5rem;">
                <h2 style="font-size: 1.8rem; font-weight: 800; color: #1a202c; margin: 0;">Suivi des Réservations</h2>
                <p style="color: #718096; font-weight: 500;">Validez les arrivées et gérez les séjours clients</p>
            </div>

            <div style="background: white; border-radius: 24px; padding: 1.5rem; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #edf2f7;">
                <table style="width: 100%; border-collapse: collapse; text-align: left;">
                    <thead>
                        <tr style="border-bottom: 2px solid #f7fafc;">
                            <th style="padding: 1.5rem 1rem; color: #a0aec0; font-size: 0.85rem; text-transform: uppercase;">Client</th>
                            <th style="padding: 1.5rem 1rem; color: #a0aec0; font-size: 0.85rem; text-transform: uppercase;">Chambre</th>
                            <th style="padding: 1.5rem 1rem; color: #a0aec0; font-size: 0.85rem; text-transform: uppercase;">Dates (In/Out)</th>
                            <th style="padding: 1.5rem 1rem; color: #a0aec0; font-size: 0.85rem; text-transform: uppercase;">Total</th>
                            <th style="padding: 1.5rem 1rem; color: #a0aec0; font-size: 0.85rem; text-transform: uppercase;">Statut</th>
                            <th style="padding: 1.5rem 1rem; color: #a0aec0; font-size: 0.85rem; text-transform: uppercase;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    @forelse($bookings as $booking)
    <tr style="border-bottom: 1px solid #f7fafc; transition: 0.3s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
        <td style="padding: 1.2rem 1rem;">
    <div style="font-weight: 700; color: #2d3748;">
        {{ $booking->user?->name ?? 'Client Inconnu' }}
    </div>

    <div style="font-size: 0.8rem; color: #a0aec0;">
        {{ $booking->user?->email ?? 'Compte supprimé ou inexistant' }}
    </div>
</td>
        <td style="padding: 1.2rem 1rem;">
            <span style="background: #ebf4ff; color: #3182ce; padding: 5px 12px; border-radius: 8px; font-weight: 800; font-size: 0.85rem;">
                {{ $booking->room?->room_number ?? 'Chambre #' . $booking->room_id }}
            </span>
        </td>
        <td style="padding: 1.2rem 1rem;">
            <div style="font-size: 0.9rem; font-weight: 600;">
                Du {{ \Carbon\Carbon::parse($booking->check_in)->isoFormat('DD MMM') }}
            </div>
            <div style="font-size: 0.9rem; font-weight: 600; color: #f97316;">
                au {{ \Carbon\Carbon::parse($booking->check_out)->isoFormat('DD MMM') }}
            </div>
        </td>
        <td style="padding: 1.2rem 1rem; font-weight: 800; color: #1a202c;">
            {{ number_format($booking->total_price, 0, ',', ' ') }} <small>CFA</small>
        </td>
        <td style="padding: 1.2rem 1rem;">
            <span style="padding: 6px 14px; border-radius: 20px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase;
                background: {{ $booking->status == 'confirmée' ? '#dcfce7' : ($booking->status == 'annulée' ? '#fee2e2' : '#fef3c7') }};
                color: {{ $booking->status == 'confirmée' ? '#15803d' : ($booking->status == 'annulée' ? '#b91c1c' : '#92400e') }};">
                {{ $booking->status }}
            </span>
        </td>
        <td style="padding: 1.2rem 1rem;">
            @if($booking->status == 'en_attente')
            <div style="display: flex; gap: 8px;">
                <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST">
                    @csrf
                    <button type="submit" title="Confirmer la réservation" style="background: #10b981; color: white; border: none; width: 35px; height: 35px; border-radius: 10px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: 0.3s;">
                        ✔
                    </button>
                </form>
                <button style="background: #fee2e2; color: #ef4444; border: none; width: 35px; height: 35px; border-radius: 10px; cursor: pointer;">
                    ✕
                </button>
            </div>
            @else
            <span style="color: #a0aec0; font-size: 0.75rem; font-weight: 600;">Traité le {{ $booking->updated_at->format('d/m') }}</span>
            @endif
        </td>
    </tr>
    @empty
    @endforelse
</tbody>
                </table>
            </div>
        </main>
    </div>

    <style>
        .nav-btn { display: flex; align-items: center; padding: 14px 18px; color: #a0aec0; text-decoration: none; border-radius: 15px; font-weight: 600; transition: all 0.3s; }
        .nav-btn:hover { background: rgba(249, 115, 22, 0.1); color: #f97316; transform: translateX(5px); }
        .nav-btn.active { background: #f97316; color: white !important; box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3); }
    </style>
</x-app-layout>
