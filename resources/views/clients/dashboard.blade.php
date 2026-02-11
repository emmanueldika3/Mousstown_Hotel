<x-app-layout>
    <style>
        .booking-card { transition: all 0.3s ease; }
        .booking-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important; }
        .btn-cancel:hover { background: #f87171 !important; color: white !important; }
    </style>

    <div style="max-width: 1100px; margin: 0 auto; padding: 2rem; font-family: 'Inter', sans-serif;">

        <div style="margin-bottom: 2.5rem;">
            <h2 style="font-weight: 900; color: #1a202c; font-size: 1.8rem; margin: 0;">Bienvenue, {{ auth()->user()->name }} 👋</h2>
            <p style="color: #718096; margin-top: 5px;">Gérez vos réservations et votre séjour au Mousstown Hotel.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.5rem; margin-bottom: 3rem;">
            <div style="background: white; padding: 1.5rem; border-radius: 20px; border: 1px solid #edf2f7; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                <p style="margin: 0; font-size: 0.75rem; color: #a0aec0; text-transform: uppercase; font-weight: 800; letter-spacing: 1px;">Dépenses totales</p>
                <h3 style="margin: 8px 0 0; color: #1a202c; font-size: 1.5rem;">{{ number_format($myBookings->where('status', 'confirmée')->sum('total_price'), 0, ',', ' ') }} <small style="font-size: 0.9rem;">CFA</small></h3>
            </div>
            <div style="background: white; padding: 1.5rem; border-radius: 20px; border: 1px solid #edf2f7; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                <p style="margin: 0; font-size: 0.75rem; color: #a0aec0; text-transform: uppercase; font-weight: 800; letter-spacing: 1px;">Réservations actives</p>
                <h3 style="margin: 8px 0 0; color: #f97316; font-size: 1.5rem;">{{ $myBookings->whereIn('status', ['en_attente', 'confirmée'])->count() }}</h3>
            </div>
        </div>

        <h3 style="font-weight: 800; color: #1a202c; margin-bottom: 1.5rem; font-size: 1.2rem;">Mes Réservations</h3>

        <div class="bookings-list" style="display: flex; flex-direction: column; gap: 1.5rem;">
            @forelse($myBookings as $booking)
                <div class="booking-card" style="background: white; border-radius: 20px; display: flex; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #edf2f7;">

                    <div style="width: 220px; position: relative;">
                        <img src="{{ $booking->room->image_url ?? 'https://via.placeholder.com/300x200?text=Chambre' }}"
                             style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div style="padding: 1.5rem; flex: 1; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
                                <h4 style="margin: 0; font-size: 1.2rem; color: #1a202c;">Chambre {{ $booking->room->room_number ?? 'N/A' }}</h4>
                                <span style="font-size: 0.65rem; font-weight: 900; text-transform: uppercase; padding: 5px 12px; border-radius: 50px;
                                    background: {{ $booking->status == 'confirmée' ? '#dcfce7' : ($booking->status == 'annulée' ? '#fee2e2' : '#fef3c7') }};
                                    color: {{ $booking->status == 'confirmée' ? '#15803d' : ($booking->status == 'annulée' ? '#b91c1c' : '#92400e') }};">
                                    {{ $booking->status }}
                                </span>
                            </div>

                            <p style="font-size: 0.9rem; color: #718096; margin: 0;">
                                <i class="far fa-calendar-alt"></i> Séjour du <strong>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M') }}</strong> au <strong>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</strong>
                            </p>
                            <p style="font-size: 0.85rem; color: #a0aec0; margin-top: 5px;">
                                Réservé le {{ $booking->created_at->format('d/m/Y à H:i') }}
                            </p>
                        </div>

                        <div style="text-align: right; display: flex; flex-direction: column; gap: 12px; align-items: flex-end;">
                            <div style="margin-bottom: 5px;">
                                <span style="display: block; font-weight: 900; font-size: 1.4rem; color: #1a202c;">{{ number_format($booking->total_price, 0, ',', ' ') }} <small style="font-size: 0.8rem;">CFA</small></span>
                            </div>

                            <div style="display: flex; gap: 10px;">
                                @if($booking->status == 'en_attente')
                                    <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment annuler cette réservation ?');">
                                        @csrf
                                        <button type="submit" class="btn-cancel" style="background: #fff1f2; color: #ef4444; border: 1px solid #fecaca; padding: 8px 16px; border-radius: 10px; font-size: 0.8rem; font-weight: 700; cursor: pointer; transition: 0.3s;">
                                            Annuler
                                        </button>
                                    </form>
                                @endif

                                @if($booking->status == 'confirmée')
                                    <a href="#" style="background: #f0f9ff; color: #0ea5e9; border: 1px solid #bae6fd; padding: 8px 16px; border-radius: 10px; font-size: 0.8rem; font-weight: 700; text-decoration: none; transition: 0.3s;">
                                        Reçu PDF
                                    </a>
                                @endif

                                <a href="{{ route('room.visit', $booking->room_id) }}" style="background: #f8fafc; color: #64748b; border: 1px solid #e2e8f0; padding: 8px 16px; border-radius: 10px; font-size: 0.8rem; font-weight: 700; text-decoration: none;">
                                    Détails
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div style="text-align: center; padding: 4rem 2rem; background: #f8fafc; border-radius: 30px; border: 2px dashed #e2e8f0;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🏨</div>
                    <h4 style="color: #1a202c; margin: 0;">Aucune réservation trouvée</h4>
                    <p style="color: #a0aec0; margin: 10px 0 20px;">Il semble que vous n'ayez pas encore planifié de séjour chez nous.</p>
                    <a href="{{ route('home') }}" style="display: inline-block; background: #f97316; color: white; padding: 12px 30px; border-radius: 12px; text-decoration: none; font-weight: 800; transition: 0.3s; box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);">
                        Réserver une chambre
                    </a>
                </div>
            @endforelse
        </div>

        <div style="margin-top: 4rem; background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%); padding: 2.5rem; border-radius: 24px; color: white; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1);">
            <div>
                <h4 style="margin: 0; font-size: 1.3rem; font-weight: 800;">Une question sur votre séjour ?</h4>
                <p style="margin: 8px 0 0; color: #a0aec0; font-size: 0.95rem;">Notre équipe est disponible 24h/24 pour vous accompagner.</p>
            </div>
            <a href="https://wa.me/237600000000" target="_blank" style="background: #25d366; color: white; padding: 14px 28px; border-radius: 50px; text-decoration: none; font-weight: 800; display: flex; align-items: center; gap: 10px; transition: 0.3s;">
                <i class="fab fa-whatsapp" style="font-size: 1.2rem;"></i> WhatsApp Direct
            </a>
        </div>

    </div>
</x-app-layout>
