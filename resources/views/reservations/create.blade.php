<x-app-layout>
    <div style="min-height: 100vh; background: #f0f2f5; padding: 50px 20px; font-family: 'Plus Jakarta Sans', sans-serif;">
        <div style="max-width: 1000px; margin: 0 auto;">

            <div style="text-align: center; margin-bottom: 40px;">
                <h1 style="color: #1a2238; font-weight: 800; font-size: 2.5rem; margin-bottom: 10px;">Finalisez votre réservation</h1>
                <p style="color: #64748b; font-size: 1.1rem;">Une étape de plus vers votre confort absolu.</p>
            </div>

            <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 30px; align-items: start;">

                <div style="background: white; padding: 40px; border-radius: 30px; shadow: 0 10px 40px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                    <form action="{{ route('reservations.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">

                        <h3 style="color: #1a2238; margin-bottom: 25px; font-weight: 700;">Informations Personnelles</h3>

                        <div style="margin-bottom: 20px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #475569;">Nom Complet</label>
                            <input type="text" name="customer_name" required placeholder="Votre nom complet"
                                   style="width: 100%; padding: 14px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; transition: 0.3s;"
                                   onfocus="this.style.borderColor='#ff8c00'">
                        </div>

                        <div style="margin-bottom: 25px;">
                            <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #475569;">Adresse Email</label>
                            <input type="email" name="customer_email" required placeholder="votre email"
                                   style="width: 100%; padding: 14px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none;">
                        </div>
                        <div style="margin-bottom: 25px;">
    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: #475569;">Numéro de Téléphone</label>
    <div style="display: flex; gap: 10px;">
        <span style="background: #f1f5f9; padding: 14px; border-radius: 12px; border: 2px solid #f1f5f9; color: #64748b; font-weight: 600;">+237</span>
        <input type="tel" name="customer_phone" required placeholder="6XX XXX XXX"
               style="flex: 1; padding: 14px; border-radius: 12px; border: 2px solid #f1f5f9; outline: none; transition: 0.3s;"
               onfocus="this.style.borderColor='#ff8c00'">
    </div>
</div>

                        <hr style="border: 0; border-top: 1px solid #f1f5f9; margin: 30px 0;">

                        <h3 style="color: #1a2238; margin-bottom: 25px; font-weight: 700;">Dates du séjour</h3>

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

                    <div style="display: flex; align-items: center; gap: 15px; margin-top: 25px; padding: 20px; background: white; border-radius: 20px; border: 1px solid #e2e8f0;">
                        <span style="font-size: 2rem;">🛡️</span>
                        <div>
                            <p style="margin: 0; font-weight: 700; color: #1a2238;">Paiement Sécurisé</p>
                            <p style="margin: 0; font-size: 0.8rem; color: #64748b;">Réservation garantie par certificat SSL</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
