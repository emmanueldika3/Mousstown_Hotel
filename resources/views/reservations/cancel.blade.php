
<form action="{{ route('bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir annuler ?')">
    @csrf
    <button type="submit" style="color: #e53e3e; background: none; border: none; cursor: pointer; font-weight: bold;">
        Annuler ma réservation
    </button>
</form>
