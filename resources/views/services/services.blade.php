<x-app-layout>
    <div style="position: relative; height: 45vh; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%); margin-top: -2rem; border-bottom: 4px solid #f97316;">
        <div style="text-align: center; color: white; padding: 0 1rem;">
            <span style="display: inline-block; background: rgba(249, 115, 22, 0.1); color: #f97316; padding: 5px 15px; border-radius: 50px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 2px; margin-bottom: 1.5rem; border: 1px solid #f97316;">
                Services 5 Étoiles
            </span>
            <h1 style="font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 900; text-transform: uppercase; letter-spacing: 12px; margin: 0; line-height: 1.2;">
                L'Art de <span style="color: #f97316;">Vivre</span>
            </h1>
            <p style="font-size: 1.1rem; opacity: 0.7; max-width: 600px; margin: 1.5rem auto 0; font-weight: 300; letter-spacing: 1px;">
                L'excellence <b style="color: white;">Mousstown</b> se décline à chaque instant de votre séjour.
            </p>
        </div>
    </div>

    <div style="max-width: 1000px; margin: 2.5rem auto 8rem; position: relative; z-index: 30; background: white; padding: 2rem; border-radius: 20px; box-shadow: 0 25px 60px -15px rgba(0,0,0,0.3); display: flex; justify-content: space-around; text-align: center; flex-wrap: wrap; gap: 2rem; border: 1px solid rgba(249, 115, 22, 0.1);">
        <div style="flex: 1; min-width: 150px;">
            <div style="font-size: 2.2rem; font-weight: 900; color: #f97316; margin-bottom: 5px;">24/7</div>
            <div style="font-size: 0.75rem; text-transform: uppercase; font-weight: 800; color: #1a202c; letter-spacing: 2px;">Conciergerie</div>
        </div>
        <div style="flex: 1; min-width: 150px; border-left: 1px solid #edf2f7; border-right: 1px solid #edf2f7;">
            <div style="font-size: 2.2rem; font-weight: 900; color: #1a202c; margin-bottom: 5px;">100%</div>
            <div style="font-size: 0.75rem; text-transform: uppercase; font-weight: 800; color: #1a202c; letter-spacing: 2px;">Sécurisé</div>
        </div>
        <div style="flex: 1; min-width: 150px;">
            <div style="font-size: 2.2rem; font-weight: 900; color: #f97316; margin-bottom: 5px;">VIP</div>
            <div style="font-size: 0.75rem; text-transform: uppercase; font-weight: 800; color: #1a202c; letter-spacing: 2px;">Traitement</div>
        </div>
    </div>

    <div style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
        @foreach($services as $service)
            <div style="display: flex; align-items: center; gap: 4rem; margin-bottom: 8rem; flex-wrap: wrap; {{ $loop->iteration % 2 == 0 ? 'flex-direction: row-reverse;' : '' }}">
                <div style="flex: 1; min-width: 300px;">
                    <div style="overflow: hidden; border-radius: 25px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); height: 450px;">
                        <img src="{{ $service->image }}" style="width: 100%; height: 100%; object-fit: cover; transition: 0.8s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                </div>
                <div style="flex: 1; min-width: 300px;">
                    <span style="color: #f97316; font-weight: 900; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px;">{{ $service->category }}</span>
                    <h2 style="font-size: 3rem; margin: 15px 0; font-weight: 900; color: #1a202c; line-height: 1.1;">{{ $service->name }}</h2>
                    <p style="line-height: 1.8; color: #4a5568; font-size: 1.1rem; margin-bottom: 2rem;">{{ $service->description }}</p>

                    <form action="{{ route('services.book', $service->id) }}" method="POST">
                        @csrf
                        <div style="margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 8px;">
                            <label style="font-size: 0.8rem; font-weight: 700; color: #1a202c; text-transform: uppercase;">Réserver un créneau :</label>
                            <input type="datetime-local" name="booking_date" required style="max-width: 250px; border: 1px solid #edf2f7; border-radius: 10px; padding: 10px; font-family: inherit; color: #4a5568;">
                        </div>
                        <button type="submit" style="background: #1a202c; color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: 800; text-transform: uppercase; font-size: 0.8rem; transition: 0.3s; border: none; cursor: pointer; box-shadow: 0 10px 20px rgba(0,0,0,0.1);" onmouseover="this.style.background='#f97316'" onmouseout="this.style.background='#1a202c'">
                            Confirmer la réservation
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <div style="background: #f8fafc; padding: 6rem 1.5rem; border-top: 1px solid #e2e8f0;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 5rem;">
                <span style="color: #f97316; font-weight: 800; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 3px;">Votre Confort, Notre Priorité</span>
                <h2 style="font-size: 2.5rem; font-weight: 900; text-transform: uppercase; margin-top: 1rem; color: #1a202c;">Nos Services <span style="color: #f97316;">Premium</span></h2>
                <div style="width: 60px; height: 4px; background: #f97316; margin: 25px auto; border-radius: 10px;"></div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                @foreach($services as $service)
                    <div style="background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: 1px solid #edf2f7; transition: 0.4s;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)';">
                        <div style="height: 200px; overflow: hidden;">
                            <img src="{{ $service->image }}" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="padding: 2.5rem;">
                            <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                                <i class="fa-solid fa-crown" style="color: #f97316; font-size: 1.2rem;"></i>
                                <h4 style="font-size: 1.2rem; font-weight: 800; color: #1a202c; text-transform: uppercase; margin: 0;">{{ $service->name }}</h4>
                            </div>
                            <p style="color: #4a5568; font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;">{{ Str::limit($service->description, 100) }}</p>
                            <span style="font-size: 0.75rem; font-weight: 900; color: #f97316; text-transform: uppercase; letter-spacing: 1px;">Service Mousstown</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div style="background: #1a202c; padding: 4rem 1.5rem; color: white;">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 3rem;">
                <h2 style="font-weight: 900; text-transform: uppercase; letter-spacing: 2px; font-size: 1.8rem;">Questions <span style="color: #f97316;">Fréquentes</span></h2>
            </div>
            <details style="background: #2d3748; padding: 1.2rem; border-radius: 12px; margin-bottom: 1rem; cursor: pointer; border: 1px solid rgba(255,255,255,0.05);">
                <summary style="font-weight: 700; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                    Comment réserver la navette aéroport ? <i class="fa-solid fa-plus" style="color: #f97316;"></i>
                </summary>
                <p style="margin-top: 1rem; color: #a0aec0; font-size: 0.95rem; line-height: 1.6; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem;">
                    Indiquez vos détails de vol lors de votre réservation ou envoyez-les nous par WhatsApp au moins 24h avant votre arrivée.
                </p>
            </details>
            <details style="background: #2d3748; padding: 1.2rem; border-radius: 12px; margin-bottom: 1rem; cursor: pointer; border: 1px solid rgba(255,255,255,0.05);">
                <summary style="font-weight: 700; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                    Quels sont les modes de paiement acceptés ? <i class="fa-solid fa-plus" style="color: #f97316;"></i>
                </summary>
                <p style="margin-top: 1rem; color: #a0aec0; font-size: 0.95rem; line-height: 1.6; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem;">
                    Nous acceptons les cartes internationales, Orange Money et MTN MoMo.
                </p>
            </details>
        </div>
    </div>

    <div style="background: #f97316; padding: 5rem 2rem; text-align: center; color: white;">
        <h3 style="font-size: 2.2rem; font-weight: 900; text-transform: uppercase; margin-bottom: 1.5rem;">Un souhait particulier ?</h3>
        <p style="margin-bottom: 3rem; font-weight: 400; font-size: 1.1rem; opacity: 0.9; max-width: 600px; margin: 0 auto 3rem; line-height: 1.6;">
            Notre équipe de conciergerie est prête à réaliser l'impossible pour rendre votre séjour inoubliable.
        </p>
        <a href="{{ route('contact') }}" style="display: inline-block; background: #1a202c; color: white; padding: 18px 50px; border-radius: 50px; text-decoration: none; font-weight: 900; text-transform: uppercase; transition: 0.3s; box-shadow: 0 15px 30px rgba(0,0,0,0.2);" onmouseover="this.style.background='white'; this.style.color='#f97316'; this.style.transform='scale(1.05)'" onmouseout="this.style.background='#1a202c'; this.style.color='white'; this.style.transform='scale(1)'">
            Contacter la Réception
        </a>
    </div>
</x-app-layout>
