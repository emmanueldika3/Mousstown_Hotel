<x-app-layout>
<div style="max-width: 1000px; margin: 0 auto; padding: 2rem;">
    <h2 style="font-weight: 800; color: #1a202c;">Bienvenue, {{ auth()->user()->name }} 👋</h2>
    <p style="color: #718096; margin-bottom: 2rem;">Retrouvez ici vos séjours à Mousstown Hotel.</p>

    <div class="bookings-list" style="display: flex; flex-direction: column; gap: 1.5rem;">
        @forelse($myBookings as $booking)
        <div style="background: white; border-radius: 20px; display: flex; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border: 1px solid #edf2f7;">
            <img src="{{ $booking->room->image_url }}" style="width: 180px; object-fit: cover;">

            <div style="padding: 1.5rem; flex: 1; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h4 style="margin: 0; font-size: 1.1rem; color: #1a202c;">Chambre {{ $booking->room->room_number }}</h4>
                    <p style="font-size: 0.85rem; color: #a0aec0; margin: 5px 0;">
                        Du {{ \Carbon\Carbon::parse($booking->check_in)->format('d M') }}
                        au {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}
                    </p>
                    <span style="font-size: 0.7rem; font-weight: 800; text-transform: uppercase; padding: 4px 10px; border-radius: 10px;
                        background: {{ $booking->status == 'confirmée' ? '#dcfce7' : '#fef3c7' }};
                        color: {{ $booking->status == 'confirmée' ? '#15803d' : '#92400e' }};">
                        {{ $booking->status }}
                    </span>
                </div>

                <div style="text-align: right;">
                    <span style="display: block; font-weight: 800; font-size: 1.2rem; color: #1a202c;">{{ number_format($booking->total_price) }} CFA</span>
                    <a href="#" style="color: #f97316; font-size: 0.8rem; font-weight: 700; text-decoration: none;">Détails du séjour →</a>
                </div>
            </div>
        </div>
        @empty
        <div style="text-align: center; padding: 3rem; background: #f8fafc; border-radius: 20px; border: 2px dashed #cbd5e0;">
            <p style="color: #a0aec0;">Vous n'avez pas encore de réservation.</p>
            <a href="{{ route('home') }}" style="display: inline-block; background: #f97316; color: white; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-weight: 700;">Découvrir nos chambres</a>
        </div>
        @endforelse
    </div>
</div>
</x-app-layout>
