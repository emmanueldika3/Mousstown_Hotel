<x-app-layout>
    <div style="max-width: 900px; margin: 40px auto; padding: 0 20px;">
        {{-- En-tête avec récapitulatif de la chambre --}}
        <div style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.05); border: 1px solid #f1f5f9;">
            <div style="display: flex; flex-wrap: wrap;">
                <div style="flex: 1; min-width: 300px; height: 250px;">
                    <img src="{{ asset('storage/' . $selectedRoom->image_url) }}" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
                <div style="flex: 1; padding: 30px; min-width: 300px; display: flex; flex-direction: column; justify-content: center;">
                    <span style="color: #ff8c00; font-weight: 800; text-transform: uppercase; font-size: 0.8rem;">Votre sélection</span>
                    <h2 style="font-size: 1.8rem; font-weight: 900; color: #1a2238; margin: 10px 0;">Chambre {{ $selectedRoom->room_number }}</h2>
                    <p style="color: #64748b;">{{ $selectedRoom->room_type }} • {{ number_format($selectedRoom->price, 0, ',', ' ') }} CFA / nuit</p>
                </div>
            </div>

            {{-- Formulaire de dates --}}
            <form action="{{ route('reservations.store') }}" method="POST" style="padding: 40px; border-top: 1px solid #f1f5f9;">
                @csrf
                <input type="hidden" name="room_id" value="{{ $selectedRoom->id }}">
                
                {{-- Infos cachées car le user est connecté --}}
                <input type="hidden" name="customer_name" value="{{ auth()->user()->name }}">
                <input type="hidden" name="customer_email" value="{{ auth()->user()->email }}">
                <input type="hidden" name="customer_phone" value="{{ auth()->user()->phone }}">

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 35px;">
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #c2410c;">Arrivée</label>
                                <input type="date" name="check_in" required min="{{ date('Y-m-d') }}"
                                       style="width: 100%; padding: 14px; border-radius: 12px; border: 2px solid #ffedd5; background: #fffaf5;">
                            </div>
                            <div>
                                <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #c2410c;">Départ</label>
                                <input type="date" name="check_out" required
                                       style="width: 100%; padding: 14px; border-radius: 12px; border: 2px solid #ffedd5; background: #fffaf5;">
                            </div>
                        </div>
                        <div class="mb-4">
    <label class="block text-sm font-bold mb-2">Votre Email de contact</label>
    <input type="email" name="email" 
           value="{{ auth()->user()->email }}" 
           class="w-full p-3 border rounded-lg @error('email') border-red-500 @enderror" 
           required>
    @error('email')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>

                        <button type="submit"
                                style="width: 100%; background: #1a2238; color: white; padding: 20px; border: none; border-radius: 15px; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: 0.4s;"
                                onmouseover="this.style.background='#ff8c00'; this.style.transform='translateY(-2px)'"
                                onmouseout="this.style.background='#1a2238'; this.style.transform='translateY(0)'">
                            Confirmer la Réservation
                        </button>
                    </form>
                </div>

                <div style="position: sticky; top: 20px;">
                    <div style="background: #1a2238; color: white; border-radius: 30px; overflow: hidden; box-shadow: 0 20px 40px rgba(26, 34, 56, 0.2);">
                        <div style="height: 180px; width: 100%; overflow: hidden;">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=800" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 30px;">
                            <span style="background: #ff8c00; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">
                                {{ $room->room_type ?? 'Premium' }}
                            </span>
                            <h2 style="margin: 15px 0 5px 0; font-size: 1.8rem;">Chambre {{ $room->room_number }}</h2>
                            <p style="color: #94a3b8; font-size: 0.9rem; margin-bottom: 25px;">Hôtel de Luxe & Spa</p>

                            <div style="border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
                                <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                                    <span style="color: #94a3b8;">Tarif par nuit</span>
                                    <span style="font-weight: 700;">{{ number_format($room->price, 0, ',', ' ') }} F</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: 12px;">
                                    <span style="color: #94a3b8;">Service</span>
                                    <span style="color: #4ade80;">Inclus</span>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-top: 20px; font-size: 1.3rem;">
                                    <span style="font-weight: 800;">TOTAL</span>
                                    <span style="color: #ff8c00; font-weight: 900;">{{ number_format($room->price, 0, ',', ' ') }} F*</span>
                                </div>
                                <p style="font-size: 0.7rem; color: #64748b; margin-top: 10px;">*Le prix total sera recalculé selon la durée de votre séjour.</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label style="display: block; font-weight: 700; color: #1a2238; margin-bottom: 10px;">DATE DE DÉPART</label>
                        <input type="date" name="check_out" required 
                               style="width: 100%; padding: 15px; border-radius: 12px; border: 2px solid #f1f5f9;">
                    </div>
                </div>

                <button type="submit" style="width: 100%; margin-top: 30px; padding: 20px; border-radius: 15px; background: #1a2238; color: white; font-weight: 900; border: none; cursor: pointer; transition: 0.3s;">
                    CONFIRMER MA RÉSERVATION
                </button>
            </form>
        </div>
    </div>
</x-app-layout>