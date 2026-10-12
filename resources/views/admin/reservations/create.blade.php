<x-app-layout>
<x-admin>
<div style="max-width: 800px; margin: 0 auto; background: white; padding: 40px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #f1f5f9;">
    
    <div style="margin-bottom: 30px; text-align: center;">
        <h2 style="margin: 0; font-weight: 900; color: #1a2238; font-size: 2rem;">Nouvelle Réservation</h2>
        <p style="color: #64748b; margin-top: 10px;">Enregistrez un nouveau client pour **MOUSSTOWN**</p>
    </div>

    @if ($errors->any())
        <div style="background: #fee2e2; color: #b91c1c; padding: 15px; border-radius: 12px; margin-bottom: 20px; font-size: 0.9rem;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.reservations.store') }}" method="POST">
        @csrf

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            
            <div style="grid-column: span 2;">
                <label style="display: block; font-weight: 800; color: #1a2238; margin-bottom: 8px; font-size: 0.9rem; text-transform: uppercase;">Chambre à assigner</label>
                <select name="room_id" required style="width: 100%; padding: 15px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; font-family: inherit; font-size: 1rem; color: #1a2238;">
                    <option value="">-- Choisir une chambre --</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ (isset($selectedRoomId) && $selectedRoomId == $room->id) ? 'selected' : '' }}>
                            N° {{ $room->room_number }} - {{ $room->room_type }} ({{ number_format($room->price, 0, ',', ' ') }} F/nuit)
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- NOM : Pré-rempli si connecté --}}
            <div>
                <label style="display: block; font-weight: 800; color: #1a2238; margin-bottom: 8px; font-size: 0.9rem; text-transform: uppercase;">Nom du Client</label>
                <input type="text" name="customer_name" placeholder="Ex: Jean Dupont" 
                       value="{{ old('customer_name', auth()->check() ? auth()->user()->name : '') }}" required 
                       style="width: 100%; padding: 15px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; font-size: 1rem;">
            </div>

            {{-- EMAIL : Pré-rempli si connecté --}}
            <div>
                <label style="display: block; font-weight: 800; color: #1a2238; margin-bottom: 8px; font-size: 0.9rem; text-transform: uppercase;">Email du Client</label>
                <input type="email" name="customer_email" placeholder="jean@exemple.com" 
                       value="{{ old('customer_email', auth()->check() ? auth()->user()->email : '') }}" required 
                       style="width: 100%; padding: 15px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; font-size: 1rem;">
            </div>

            {{-- TÉLÉPHONE : Pré-rempli si connecté --}}
            <div style="grid-column: span 2;">
                <label style="display: block; font-weight: 800; color: #1a2238; margin-bottom: 8px; font-size: 0.9rem; text-transform: uppercase;">Téléphone du Client</label>
                <input type="tel" name="customer_phone" placeholder="6XX XXX XXX" 
                       value="{{ old('customer_phone', auth()->check() ? auth()->user()->phone : '') }}" required 
                       style="width: 100%; padding: 15px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; font-size: 1rem;">
            </div>

            <div>
                <label style="display: block; font-weight: 800; color: #1a2238; margin-bottom: 8px; font-size: 0.9rem; text-transform: uppercase;">Date d'Arrivée</label>
                <input type="date" name="check_in" value="{{ old('check_in') }}" required min="{{ date('Y-m-d') }}"
                       style="width: 100%; padding: 15px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; font-size: 1rem; color: #1a2238;">
            </div>

            <div>
                <label style="display: block; font-weight: 800; color: #1a2238; margin-bottom: 8px; font-size: 0.9rem; text-transform: uppercase;">Date de Départ</label>
                <input type="date" name="check_out" value="{{ old('check_out') }}" required 
                       style="width: 100%; padding: 15px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; font-size: 1rem; color: #1a2238;">
            </div>

            <div style="grid-column: span 2;">
                <label style="display: block; font-weight: 800; color: #1a2238; margin-bottom: 8px; font-size: 0.9rem; text-transform: uppercase;">Statut du dossier</label>
                <select name="status" style="width: 100%; padding: 15px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; font-size: 1rem;">
                    <option value="en_attente">En attente (Option)</option>
                    <option value="confirmée">Confirmée (Payée)</option>
                </select>
            </div>
        </div>

        <div style="margin-top: 40px; display: flex; gap: 15px;">
            <a href="{{ route('admin.reservations.showreservations') }}" 
               style="flex: 1; text-align: center; padding: 18px; border-radius: 15px; background: #f1f5f9; color: #64748b; font-weight: 800; text-decoration: none; transition: 0.3s;"
               onmouseover="this.style.background='#e2e8f0'"
               onmouseout="this.style.background='#f1f5f9'">
                ANNULER
            </a>
            
            <button type="submit" 
                    style="flex: 2; padding: 18px; border-radius: 15px; background: #ff8c00; color: white; border: none; font-weight: 900; font-size: 1rem; cursor: pointer; transition: 0.4s; box-shadow: 0 8px 20px rgba(255, 140, 0, 0.2);"
                    onmouseover="this.style.background='#1a2238'; this.style.transform='translateY(-3px)';"
                    onmouseout="this.style.background='#ff8c00'; this.style.transform='translateY(0)';"
            >
                VALIDER LA RÉSERVATION
            </button>
        </div>
    </form>
</div>
</x-admin>
</x-app-layout>