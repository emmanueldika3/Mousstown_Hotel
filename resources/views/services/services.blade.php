<x-app-layout>
    {{-- 1. SYSTÈME DE NOTIFICATIONS ÉLÉGANTES (Toast Glassmorphism) --}}
    @if(session('success') || session('error'))
        <div id="notification-toast" style="position: fixed; top: 30px; right: 30px; z-index: 9999; pointer-events: none;">
            <div style="
                min-width: 320px;
                padding: 1.2rem;
                border-radius: 16px;
                background: rgba(255, 255, 255, 0.9);
                backdrop-filter: blur(10px);
                border: 1px solid {{ session('success') ? '#10b981' : '#f97316' }};
                box-shadow: 0 20px 40px rgba(0,0,0,0.12);
                display: flex;
                align-items: center;
                gap: 15px;
                animation: slideInRight 0.6s cubic-bezier(0.23, 1, 0.32, 1) forwards;">

                {{-- Icône --}}
                <div style="
                    width: 40px;
                    height: 40px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background: {{ session('success') ? 'rgba(16, 185, 129, 0.1)' : 'rgba(249, 115, 22, 0.1)' }};">
                    <i class="fa-solid {{ session('success') ? 'fa-check' : 'fa-bell' }}" style="color: {{ session('success') ? '#10b981' : '#f97316' }}; font-size: 1.2rem;"></i>
                </div>

                {{-- Texte --}}
                <div style="flex: 1;">
                    <h4 style="margin: 0; font-size: 0.85rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; color: #1a202c;">
                        {{ session('success') ? 'Confirmation' : 'Attention' }}
                    </h4>
                    <p style="margin: 2px 0 0; font-size: 0.9rem; color: #4a5568; font-weight: 400;">
                        {{ session('success') ?? session('error') }}
                    </p>
                </div>
            </div>
        </div>

        <style>
            @keyframes slideInRight {
                from { transform: translateX(100%) translateY(-10px); opacity: 0; }
                to { transform: translateX(0) translateY(0); opacity: 1; }
            }
            @keyframes fadeOut {
                to { opacity: 0; transform: translateY(-20px); }
            }
        </style>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('notification-toast');
                if(toast) {
                    toast.style.animation = 'fadeOut 0.8s ease-in forwards';
                    setTimeout(() => toast.remove(), 800);
                }
            }, 5000);
        </script>
    @endif

    {{-- 2. HERO SECTION --}}
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

    {{-- 3. BARRE DE RÉASSURANCE --}}
    <div style="max-width: 1000px; margin: -50px auto 8rem; position: relative; z-index: 30; background: white; padding: 2rem; border-radius: 20px; box-shadow: 0 25px 60px -15px rgba(0,0,0,0.15); display: flex; justify-content: space-around; text-align: center; flex-wrap: wrap; gap: 2rem; border: 1px solid rgba(249, 115, 22, 0.1);">
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

    {{-- 4. LISTE DES SERVICES --}}
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

                    @php
                        $isBooked = auth()->user() ? auth()->user()->services()->where('service_id', $service->id)->exists() : false;
                    @endphp

                    @if($isBooked)
                        <div style="background: #f0fdf4; border: 1px solid #bbf7d0; padding: 15px 30px; border-radius: 50px; color: #166534; font-weight: 700; display: inline-flex; align-items: center; gap: 10px;">
                            <i class="fa-solid fa-circle-check"></i> Demande transmise
                        </div>
                    @else
                        <form action="{{ route('services.book', $service->id) }}" method="POST">
                            @csrf
                            <div style="margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 8px;">
                                <label style="font-size: 0.75rem; font-weight: 800; color: #1a202c; text-transform: uppercase; letter-spacing: 1px;">Choisir un créneau :</label>
                                <input type="datetime-local" name="booking_date" required style="max-width: 280px; border: 1px solid #edf2f7; border-radius: 12px; padding: 12px; font-family: inherit; color: #4a5568; background: #f8fafc;">
                            </div>
                            <button type="submit" style="background: #1a202c; color: white; padding: 18px 45px; border-radius: 50px; font-weight: 800; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 1px; transition: 0.3s; border: none; cursor: pointer; box-shadow: 0 10px 20px rgba(0,0,0,0.1);" onmouseover="this.style.background='#f97316'; this.style.transform='translateY(-2px)'" onmouseout="this.style.background='#1a202c'; this.style.transform='translateY(0)'">
                                Confirmer la réservation
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    {{-- 5. SECTION FINALE --}}
    <div style="background: #f97316; padding: 6rem 2rem; text-align: center; color: white; border-radius: 40px 40px 0 0;">
        <h3 style="font-size: 2.5rem; font-weight: 900; text-transform: uppercase; margin-bottom: 1.5rem;">Un souhait particulier ?</h3>
        <p style="margin-bottom: 3rem; font-weight: 400; font-size: 1.2rem; opacity: 0.9; max-width: 600px; margin: 0 auto 3rem; line-height: 1.6;">
            Notre équipe de conciergerie est prête à réaliser l'impossible pour votre séjour.
        </p>
        <a href="{{ route('contact') }}" style="display: inline-block; background: #1a202c; color: white; padding: 20px 60px; border-radius: 50px; text-decoration: none; font-weight: 900; text-transform: uppercase; transition: 0.3s; box-shadow: 0 15px 30px rgba(0,0,0,0.2);" onmouseover="this.style.background='white'; this.style.color='#f97316'; this.style.transform='scale(1.05)'" onmouseout="this.style.background='#1a202c'; this.style.color='white'; this.style.transform='scale(1)'">
            Contacter la Réception
        </a>
    </div>
</x-app-layout>
