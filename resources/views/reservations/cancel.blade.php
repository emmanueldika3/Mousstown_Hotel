
<form action="{{ route('admin.reservations.cancel', $res->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <button type="submit">Annuler la réservation</button>
</form>
