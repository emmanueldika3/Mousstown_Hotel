<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mousstown_Hôtel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <style>
        body { display: flex; flex-direction: column; min-height: 100vh; margin: 0; font-family: 'Segoe UI', sans-serif; }
        main { flex: 1; }
        [x-cloak] { display: none !important; }

        /* Style des liens du menu */
        .nav-link {
            position: relative;
            text-decoration: none;
            color: #cbd5e0 !important;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 0;
            height: 3px;
            background-color: #f97316;
            transition: width 0.3s ease;
            border-radius: 2px;
        }

        .nav-link:hover, .nav-link.active {
            color: #f97316 !important;
        }

        .nav-link:hover::after, .nav-link.active::after {
            width: 100%;
        }

        /* Animation du point de chat */
        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.4); opacity: 0.6; }
            100% { transform: scale(1); opacity: 1; }
        }
        .pulse-dot { animation: pulse 2s infinite ease-in-out; }

        @media (max-width: 1024px) {
            .desktop-menu { display: none !important; }
            .mobile-burger { display: block !important; }
        }
    </style>
</head>
<body class="bg-gray-100">

    <nav x-data="{ open: false }" style="background: #2d3748; color: white; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 20px rgba(0,0,0,0.4);">
        <div style="max-width: 1400px; margin: 0 auto; padding: 1.2rem 2rem; display: flex; justify-content: space-between; align-items: center;">

            <div style="display: flex; align-items: center; gap: 15px;">
                <img src="/images/logo_MH.png" alt="Logo" style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid #f97316; background: #1a202c; object-fit: cover;">
                <h1 style="color: white; font-size: 1.8rem; font-weight: 400; text-transform: uppercase; margin: 0; letter-spacing: 2px;">
                    MOUSSTOWN_<span style="color: #f97316;">Hotel</span>
                </h1>
            </div>

            <div class="desktop-menu" style="display: flex; align-items: center; flex: 1; justify-content: flex-end; gap: 40px;">
                <div style="display: flex; gap: 30px; font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em;">
                    <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Accueil</a>
                    <a href="{{ route('rooms.showRooms') }}" class="nav-link {{ Route::is('rooms.showRooms') ? 'active' : '' }}">Chambres</a>
                    <a href="/Services" class="nav-link {{ request()->is('Services*') ? 'active' : '' }}">Nos Services</a>
                    <a href="/Contact" class="nav-link {{ request()->is('Contact*') ? 'active' : '' }}">Contact</a>
                </div>

                <div style="display: flex; align-items: center; gap: 25px; border-left: 2px solid #4a5568; padding-left: 25px;">
                    <a href="{{ route('login') }}"
                       style="font-size: 14px; font-weight: 900; text-transform: uppercase; color: white; text-decoration: none; transition: 0.3s;"
                       onmouseover="this.style.color='#f97316'"
                       onmouseout="this.style.color='white'">
                        Connexion
                    </a>

                    @auth
                        <a href="{{ route('client.dashboard') }}"
                           style="background: #f97316; color: white; padding: 0.9rem 2rem; border-radius: 50px; font-size: 12px; font-weight: 900; text-transform: uppercase; text-decoration: none; transition: 0.3s; display: inline-block;"
                           onmouseover="this.style.transform='scale(1.1)';"
                           onmouseout="this.style.transform='scale(1)';">
                            <i class="fa-solid fa-circle-user" style="margin-right: 8px;"></i> Mon Espace
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           style="background: #f97316; color: white; padding: 0.9rem 2rem; border-radius: 50px; font-size: 12px; font-weight: 900; text-transform: uppercase; text-decoration: none; transition: 0.3s; display: inline-block;"
                           onmouseover="this.style.transform='scale(1.1)';"
                           onmouseout="this.style.transform='scale(1)';">
                            Mon Espace
                        </a>
                    @endauth
                </div>
            </div>

            <div class="mobile-burger" style="display: none;">
                <button @click="open = !open" style="background: none; border: none; color: white; cursor: pointer;">
                    <svg x-show="!open" style="width: 35px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    <svg x-show="open" style="width: 35px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
        </div>

        <div x-show="open" x-cloak x-transition style="background: #1a202c; border-top: 1px solid #4a5568;">
            <div style="display: flex; flex-direction: column; padding: 2rem; gap: 20px; text-align: center;">
                @php $mob = "font-weight: 800; text-transform: uppercase; text-decoration: none; font-size: 16px;"; @endphp
                <a href="/" style="{{ $mob }} color: {{ request()->is('/') ? '#f97316' : 'white' }}">Accueil</a>
                <a href="{{ route('rooms.showRooms') }}" style="{{ $mob }} color: {{ Route::is('rooms.showRooms') ? '#f97316' : 'white' }}">Chambres</a>
                <a href="/Services" style="{{ $mob }} color: {{ request()->is('Services*') ? '#f97316' : 'white' }}">Nos Services</a>
                <a href="/Contact" style="{{ $mob }} color: {{ request()->is('Contact*') ? '#f97316' : 'white' }}">Contact</a>
                <a href="{{ route('login') }}" style="{{ $mob }} color: #f97316; margin-top: 10px;">Connexion / Mon Espace</a>
            </div>
        </div>
    </nav>

    <section style="position: relative; width: 100%; min-height: 500px; display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 1rem;">
        <div style="position: absolute; inset: 0; z-index: 0;">
            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1600" alt="Hôtel" style="width: 100%; height: 100%; object-fit: cover;">
            <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.2);"></div>
        </div>
        <div style="position: relative; z-index: 10; width: 100%; max-width: 1000px; padding: 2rem; text-align: center;">
            <h1 style="color: white; font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 700; text-transform: uppercase; margin-bottom: 2rem; letter-spacing: -1px;">
                MOUSSTOWN_<span style="color: #f97316;">Hotel</span>
            </h1>
            <div style="background: white; padding: 5px; border-radius: 16px; display: flex; flex-wrap: wrap; gap: 5px; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);">
                <div style="flex: 1; min-width: 160px; text-align: left; padding: 12px 20px; border-right: 1px solid #f1f5f9;">
                    <label style="display: block; font-size: 9px; font-weight: 800; color: #f97316; text-transform: uppercase; margin-bottom: 4px;">Arrivée</label>
                    <input type="date" style="width: 100%; border: none; outline: none; font-weight: 700; font-size: 13px;">
                </div>
                <div style="flex: 1; min-width: 160px; text-align: left; padding: 12px 20px; border-right: 1px solid #f1f5f9;">
                    <label style="display: block; font-size: 9px; font-weight: 800; color: #f97316; text-transform: uppercase; margin-bottom: 4px;">Départ</label>
                    <input type="date" style="width: 100%; border: none; outline: none; font-weight: 700; font-size: 13px;">
                </div>
                <button style="background: #f97316; color: white; border: none; padding: 15px 30px; border-radius: 12px; font-weight: 900; text-transform: uppercase; cursor: pointer; transition: 0.3s; flex-grow: 1;" onmouseover="this.style.background='#1a202c'" onmouseout="this.style.background='#f97316'">
                    Vérifier la disponibilité
                </button>
            </div>
        </div>
    </section>

    <main style="max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; width: 100%;">
        {{ $slot }}
    </main>

    <footer style="background: #1a202c; color: #a0aec0; padding: 4rem 1.5rem; margin-top: auto;">
        <div style="max-width: 1200px; margin: 0 auto; text-align: center;">
            <p>&copy; 2026 Mousstown_Hôtel - Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
