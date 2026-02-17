<div style="font-family: sans-serif; color: #0f172a; max-width: 600px; margin: auto; border: 1px solid #e2e8f0; border-radius: 12px; overflow: hidden;">
    <div style="background-color: #0f172a; padding: 30px; text-align: center;">
        <h1 style="color: #ffffff; margin: 0; text-transform: uppercase;">Mousstown</h1>
    </div>
    
    <div style="padding: 40px;">
        <h2 style="color: #ff6b00;">Félicitations !</h2>
        <p>Bonjour <strong>{{ $booking->user->name }}</strong>,</p>
        <p>Nous avons le plaisir de vous informer que votre réservation a été <strong>validée</strong> par notre équipe.</p>
        
        <div style="background-color: #f8fafc; padding: 20px; border-radius: 8px; margin: 20px 0;">
            <p style="margin: 5px 0;"><strong>Hébergement :</strong> Suite N° {{ $booking->room->room_number }}</p>
            <p style="margin: 5px 0;"><strong>Arrivée :</strong> {{ \Carbon\Carbon::parse($booking->check_in)->format('d/m/Y') }}</p>
            <p style="margin: 5px 0;"><strong>Départ :</strong> {{ \Carbon\Carbon::parse($booking->check_out)->format('d/m/Y') }}</p>
            <p style="margin: 5px 0;"><strong>Montant Total :</strong> {{ number_format($booking->total_price, 0, ',', ' ') }} XAF</p>
        </div>

        <p>Nous avons hâte de vous recevoir.</p>
        <p>L'équipe Mousstown.</p>
    </div>
</div>