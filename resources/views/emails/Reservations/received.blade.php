<h1>Bonjour {{ $reservation->client_name }},</h1>
<p>Nous avons bien reçu votre demande de réservation pour la chambre : <strong>{{ $reservation->room->name }}</strong>.</p>
<p>Notre équipe va l'étudier et vous recevrez un mail de confirmation très bientôt.</p>
<p>Cordialement,<br>L'équipe Mousstown Hotel.</p>