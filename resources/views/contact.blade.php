<x-app-layout>
    <div style="position: relative; height: 40vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%); margin-top: -2rem; border-bottom: 4px solid #f97316;">
        <div style="text-align: center; color: white; padding: 0 1rem;">
            <span style="display: inline-block; background: rgba(249, 115, 22, 0.1); color: #f97316; padding: 5px 15px; border-radius: 50px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1.5rem; border: 1px solid #f97316;">
                Disponible 24h/24
            </span>
            <h1 style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; text-transform: uppercase; letter-spacing: 12px; margin: 0;">
                Nous <span style="color: #f97316;">Joindre</span>
            </h1>
        </div>
    </div>

    <div style="max-width: 1200px; margin: -4rem auto 6rem; position: relative; z-index: 30; padding: 0 1rem;">
        <div style="display: flex; flex-wrap: wrap; gap: 3rem; background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 40px 100px rgba(0,0,0,0.15); border: 1px solid rgba(0,0,0,0.05);">

            <div style="flex: 1; min-width: 320px; background: #1a202c; color: white; padding: 4rem 3rem;">
                <h2 style="font-size: 1.8rem; font-weight: 800; margin-bottom: 2rem;">Informations de <span style="color: #f97316;">Contact</span></h2>
                <p style="color: #a0aec0; line-height: 1.6; margin-bottom: 3rem;">Besoin d'une réservation urgente ou d'un service sur-mesure ? Notre conciergerie VIP vous répond instantanément.</p>

                <div style="display: flex; flex-direction: column; gap: 2rem;">
                    <div style="display: flex; align-items: center; gap: 1.5rem;">
                        <div style="width: 50px; height: 50px; background: rgba(249, 115, 22, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #f97316;">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <div style="font-size: 0.7rem; text-transform: uppercase; color: #718096; font-weight: 800;">Adresse</div>
                            <div style="font-weight: 600;">Bonapriso, Douala - Cameroun</div>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 1.5rem;">
                        <div style="width: 50px; height: 50px; background: rgba(249, 115, 22, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #f97316;">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <div style="font-size: 0.7rem; text-transform: uppercase; color: #718096; font-weight: 800;">Téléphone (24/7)</div>
                            <div style="font-weight: 600;">+237 6XX XXX XXX</div>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 1.5rem;">
                        <div style="width: 50px; height: 50px; background: rgba(249, 115, 22, 0.2); border-radius: 12px; display: flex; align-items: center; justify-content: center; color: #f97316;">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <div style="font-size: 0.7rem; text-transform: uppercase; color: #718096; font-weight: 800;">Email</div>
                            <div style="font-weight: 600;">contact@mousstown-hotel.com</div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 4rem; display: flex; gap: 1rem;">
                    <a href="#" style="width: 40px; height: 40px; border: 1px solid rgba(255,255,255,0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: 0.3s;" onmouseover="this.style.background='#f97316'; this.style.borderColor='#f97316'">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                    <a href="#" style="width: 40px; height: 40px; border: 1px solid rgba(255,255,255,0.1); border-radius: 10px; display: flex; align-items: center; justify-content: center; color: white; text-decoration: none; transition: 0.3s;" onmouseover="this.style.background='#f97316'; this.style.borderColor='#f97316'">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </div>
            </div>

            <div style="flex: 1.5; min-width: 320px; padding: 4rem 3rem; background: white;">
                <h2 style="font-size: 1.8rem; font-weight: 800; color: #1a202c; margin-bottom: 2.5rem;">Envoyez un <span style="color: #f97316;">Message</span></h2>

                <form action="#" method="POST">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #718096;">Nom Complet</label>
                            <input type="text" placeholder="Ex: Jean Dupont" style="padding: 1rem; border: 1px solid #edf2f7; border-radius: 10px; outline: none; background: #f8fafc;">
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #718096;">Email</label>
                            <input type="email" placeholder="jean@email.com" style="padding: 1rem; border: 1px solid #edf2f7; border-radius: 10px; outline: none; background: #f8fafc;">
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem;">
                        <label style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #718096;">Sujet</label>
                        <select style="padding: 1rem; border: 1px solid #edf2f7; border-radius: 10px; outline: none; background: #f8fafc; appearance: none;">
                            <option>Réservation de chambre</option>
                            <option>Service Conciergerie</option>
                            <option>Événementiel / Business</option>
                            <option>Autre demande</option>
                        </select>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 2.5rem;">
                        <label style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #718096;">Message</label>
                        <textarea rows="5" placeholder="Comment pouvons-nous vous aider ?" style="padding: 1rem; border: 1px solid #edf2f7; border-radius: 10px; outline: none; background: #f8fafc; resize: none;"></textarea>
                    </div>

                    <button type="submit" style="width: 100%; background: #f97316; color: white; padding: 1.2rem; border-radius: 12px; border: none; font-weight: 900; text-transform: uppercase; letter-spacing: 2px; cursor: pointer; transition: 0.3s; box-shadow: 0 10px 20px rgba(249, 115, 22, 0.2);" onmouseover="this.style.background='#1a202c'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='#f97316'; this.style.transform='translateY(0)'">
                        Envoyer ma demande
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div style="max-width: 1200px; margin: 0 auto 6rem; padding: 0 1rem;">
        <div style="height: 400px; background: #edf2f7; border-radius: 25px; overflow: hidden; display: flex; align-items: center; justify-content: center; border: 1px solid #e2e8f0;">
            <div style="text-align: center; color: #718096;">
                <i class="fa-solid fa-map-location-dot" style="font-size: 3rem; margin-bottom: 1rem; color: #cbd5e0;"></i>
                <p style="font-weight: 600;">Google Maps Mousstown - Bonapriso</p>
                <span style="font-size: 0.8rem;">(Intégrez ici votre code iframe Google Maps)</span>
            </div>
        </div>
    </div>
</x-app-layout>
