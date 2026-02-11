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
        /* PROPRIÉTÉS AJOUTÉES POUR LE BLOQUAGE ENTRE NAV ET FOOTER */
        body { display: flex; flex-direction: column; min-height: 100vh; margin: 0; }
        main { flex: 1; } /* Cette ligne force le contenu à pousser le footer vers le bas */
    </style>
</head>
<body class="bg-gray-100">

   <nav x-data="{ open: false }" style="background: #2d3748; color: white; position: sticky; top: 0; z-index: 1000; box-shadow: 0 4px 20px rgba(0,0,0,0.4);">

    <div style="max-width: 1400px; margin: 0 auto; padding: 1.2rem 2rem; display: flex; justify-content: space-between; align-items: center;">


    <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin-bottom: 1rem;">

        <img src="/images/logo_MH.png" alt="Mousstown Logo"
             style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid #f97316; background: #1a202c; object-fit: cover;">

        <h1 style="color: white; font-size: 1.8rem; font-weight: 400; text-transform: uppercase; margin: 0; letter-spacing: 2px; font-family: 'Segoe UI', sans-serif;">
            MOUSSTOWN_<span style="color: #f97316;">Hotel</span>
        </h1>


</div>

        <div class="desktop-menu" style="display: flex; align-items: center; gap: 40px;">
            <div style="display: flex; gap: 30px; font-size: 14px; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; color: #cbd5e0;">
                <a href="/" class="nav-link" style="text-decoration: none; color: inherit; transition: 0.3s; display: inline-block;">Accueil</a>
                <a href="/chambres" class="nav-link" style="text-decoration: none; color: inherit; transition: 0.3s; display: inline-block;">Chambres</a>
                <a href="/Galerie" class="nav-link" style="text-decoration: none; color: inherit; transition: 0.3s; display: inline-block;">Galerie</a>
                <a href="/Contact" class="nav-link" style="text-decoration: none; color: inherit; transition: 0.3s; display: inline-block;">Contact</a>
            </div>

            <div style="display: flex; align-items: center; gap: 25px; border-left: 2px solid #4a5568; padding-left: 25px;">
                <a href="{{ route('login') }}" style="font-size: 14px; font-weight: 900; text-transform: uppercase; color: white; text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='#f97316'" onmouseout="this.style.color='white'">
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
       Ma Réservation
    </a>
@endauth
            </div>
        </div>

        <div class="mobile-burger" style="display: none;">
            <button @click="open = !open" style="background: none; border: none; color: white; cursor: pointer; outline: none;">
                <svg x-show="!open" style="width: 35px; height: 35px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
                <svg x-show="open" style="width: 35px; height: 35px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden"
         style="background: #1a202c; border-top: 1px solid #4a5568; display: none;"
         :style="{ display: open ? 'block' : 'none' }" x-cloak>
        <div style="display: flex; flex-direction: column; padding: 2rem; gap: 20px; text-align: center;">
            <a href="/" style="color: white; font-weight: 800; text-transform: uppercase; text-decoration: none; font-size: 16px;">Accueil</a>
            <a href="/chambres" style="color: white; font-weight: 800; text-transform: uppercase; text-decoration: none; font-size: 16px;">Chambres</a>
            <a href="/Galerie" style="color: white; font-weight: 800; text-transform: uppercase; text-decoration: none; font-size: 16px;">Galerie</a>
            <a href="/login" style="color: #f97316; font-weight: 900; text-transform: uppercase; text-decoration: none; font-size: 16px;">Connexion</a>
            <a href="#" style="background: #f97316; color: white; padding: 1rem; border-radius: 10px; font-weight: 900; text-transform: uppercase; text-decoration: none;">Ma Réservation</a>
        </div>
    </div>
</nav>

<style>
    .nav-link:hover { color: #f97316 !important; transform: scale(1.1); }
    [x-cloak] { display: none !important; }

    @media (max-width: 1024px) {
        .desktop-menu { display: none !important; }
        .mobile-burger { display: block !important; }
    }
</style>
<div class="w-full">
        <section style="position: relative; width: 100%; min-height: 500px; display: flex; align-items: center; justify-content: center; overflow: hidden; margin-bottom: 1rem;">

    <div style="position: absolute; inset: 0; z-index: 0;">
        <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?auto=format&fit=crop&w=1600" alt="Hôtel de Luxe" style="width: 100%; height: 100%; object-fit: cover;">
        <div style="position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.1));"></div>
    </div>

    <div style="position: relative; z-index: 10; width: 100%; max-width: 1000px; padding: 2rem 1.5rem; text-align: center;">

        <h1 style="color: white; font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 700; text-transform: uppercase; margin-bottom: 2rem; letter-spacing: -1px; line-height: 1;">
            MOUSSTOWN_<span style="color: #f97316;">Hotel</span>
        </h1>

        <div style="background: white; padding: 4px; border-radius: 16px; display: flex; flex-flow: row wrap; box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5); overflow: hidden gap 3px;">

            <div style="flex: 1; min-width: 160px; text-align: left; padding: 12px 20px; border-right: 1px solid #f1f5f9;">
                <label style="display: block; font-size: 9px; font-weight: 800; color: #f97316; text-transform: uppercase; margin-bottom: 4px; letter-spacing: 0.5px;">Arrivée</label>
                <input type="date" style="width: 100%; border: none; outline: none; font-weight: 700; color: #1a202c; font-size: 13px; cursor: pointer; background: transparent;">
            </div>

            <div style="flex: 1; min-width: 160px; text-align: left; padding: 12px 20px; border-right: 1px solid #f1f5f9;">
                <label style="display: block; font-size: 9px; font-weight: 800; color: #f97316; text-transform: uppercase; margin-bottom: 4px; letter-spacing: 0.5px;">Départ</label>
                <input type="date" style="width: 100%; border: none; outline: none; font-weight: 700; color: #1a202c; font-size: 13px; cursor: pointer; background: transparent;">
            </div>

            <div style="flex: 1; min-width: 140px; text-align: left; padding: 12px 10px;">
                <label style="display: block; font-size: 9px; font-weight: 800; color: #f97316; text-transform: uppercase; margin-bottom: 4px; letter-spacing: 0.5px;">Voyageurs</label>
                <input type="number" min="1" placeholder="Nb personnes" style="width: 100%; border: none; outline: none; font-weight: 700; color: #1a202c; font-size: 13px; background: transparent;">
            </div>

            <button class="btn-check" style="background: #f97316; color: white; border: none; padding: 3px 5px; border-radius: 12px; font-weight: 900; text-transform: uppercase; font-size: 12px; cursor: pointer; transition: all 0.3s ease; margin: px; flex-grow: 1;" onmouseover="this.style.background='#1a202c'" onmouseout="this.style.background='#f97316'">
                Vérifier la disponibilité
            </button>

        </div>
    </div>
</section>

    <main style="max-width: 1200px; margin: 0 auto; padding: 2rem 1rem; width: 100%;">
        {{ $slot }}
    </main>
<div style="position: fixed; bottom: 30px; right: 30px; z-index: 9999; display: flex; align-items: center; background: white; padding: 8px 20px 8px 8px; border-radius: 50px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); cursor: pointer; border: 1px solid #f1f1f1;"
     onmouseover="this.style.transform='scale(1.05)'"
     onmouseout="this.style.transform='scale(1)'">

    <div style="background: #f97316; width: 0px; height: 30px; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; box-shadow: 0 4px 10px rgba(249, 115, 22, 0.4);">
        <i class="fa-solid fa-comment-dots" style="font-size: 20px;"></i>
    </div>

    <div style="margin-left: 12px; font-family: sans-serif;">
        <p style="margin: 0; font-size: 11px; font-weight: 900; color: #1a2238; text-transform: uppercase; letter-spacing: -0.5px; line-height: 1;">
            Chat en direct
        </p>
        <p style="margin: 0; font-size: 10px; font-weight: 700; color: #94a3b8; text-transform: uppercase;">
            24/7
        </p>
    </div>
</div>
    <footer style="background: #1a202c; color: #a0aec0; padding: 4rem 1.5rem;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 3rem;">

        <div style="flex: 1.5; min-width: 250px;">
            <h3 style="color: white; font-weight: 900; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 0.2em; margin-bottom: 1.2rem;">Mousstown_Hôtel</h3>
            <p style="font-size: 0.85rem; line-height: 1.8; margin-bottom: 1.5rem;">L'excellence et le luxe au cœur de la ville. Une expérience inoubliable pour chaque visiteur.</p>
            <div style="font-size: 0.8rem; line-height: 2; font-weight: 600;">
                <p>📍 Rue du Luxe, Douala, Cameroun</p>
                <p>📞 +237 600 000 000</p>
            </div>
        </div>

        <div style="flex: 1; min-width: 180px;">
            <h3 style="color: white; font-weight: 900; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.2em; margin-bottom: 1.2rem;">Nos Services</h3>
            <ul style="list-style: none; padding: 0; font-size: 0.85rem; line-height: 2.5;">
                <li><a href="/chambres" class="hover-orange" style="color: inherit; text-decoration: none; transition: 0.3s; display: inline-block;">🛏️ Nos Chambres & Suites</a></li>
                <li><a href="#" class="hover-orange" style="color: inherit; text-decoration: none; transition: 0.3s; display: inline-block;">✨ Spa & Bien-être</a></li>
                <li><a href="#" class="hover-orange" style="color: inherit; text-decoration: none; transition: 0.3s; display: inline-block;">🍽️ Restaurant Gastronomique</a></li>
                <li><a href="#" class="hover-orange" style="color: inherit; text-decoration: none; transition: 0.3s; display: inline-block;">🚗 Navette Aéroport</a></li>
                <li><a href="#" class="hover-orange" style="color: inherit; text-decoration: none; transition: 0.3s; display: inline-block;">🏋️ Salle de Fitness</a></li>
            </ul>
        </div>

        <div style="flex: 1.5; min-width: 280px; text-align: right;">
            <h3 style="color: white; font-weight: 900; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.2em; margin-bottom: 1.2rem;">Suivez l'expérience</h3>

            <div style="display: flex; justify-content: flex-end; gap: 1.2rem; margin-bottom: 2rem;">
                <a href="#" class="hover-orange" style="color: #cbd5e0; text-decoration: none; font-size: 1.4rem; transition: 0.3s; display: inline-block;"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="hover-orange" style="color: #cbd5e0; text-decoration: none; font-size: 1.4rem; transition: 0.3s; display: inline-block;"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="hover-orange" style="color: #cbd5e0; text-decoration: none; font-size: 1.4rem; transition: 0.3s; display: inline-block;"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#" class="hover-orange" style="color: #cbd5e0; text-decoration: none; font-size: 1.4rem; transition: 0.3s; display: inline-block;"><i class="fa-brands fa-linkedin"></i></a>
                <a href="#" class="hover-orange" style="color: #cbd5e0; text-decoration: none; font-size: 1.4rem; transition: 0.3s; display: inline-block;"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#" class="hover-orange" style="color: #cbd5e0; text-decoration: none; font-size: 1.4rem; transition: 0.3s; display: inline-block;"><i class="fa-brands fa-youtube"></i></a>
            </div>

            <div style="display: flex; justify-content: flex-end; height: 45px;">
                <input type="email" placeholder="Votre email" style="background: #2d3748; border: 1px solid #2d3748; padding: 0 1rem; color: white; font-size: 0.8rem; border-radius: 8px 0 0 8px; outline: none; width: 60%; transition: 0.3s;" onfocus="this.style.borderColor='#f97316'">
                <button style="background: #f97316; color: white; border: none; padding: 0 1.5rem; border-radius: 0 8px 8px 0; font-weight: 900; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='#white'; this.style.color='#1a202c'" onmouseout="this.style.background='#f97316'; this.style.color='white'">OK</button>
            </div>
        </div>
    </div>

    <div style="max-width: 1200px; margin: 4rem auto 0; padding-top: 2rem; border-top: 1px solid #2d3748; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 2rem;">

        <div style="font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 700;">
            &copy; 2026 Mousstown_Hôtel - Tous droits réservés.
        </div>

        <div style="display: flex; align-items: center; gap: 15px;">
            <span style="font-size: 9px; font-weight: 900; text-transform: uppercase; color: #4a5568; letter-spacing: 1px;">Paiement sécurisé :</span>
            <div style="display: flex; gap: 8px;">
                <div style="background: #2d3748; padding: 4px 10px; border-radius: 4px; font-size: 10px; color: white; font-weight: bold; border: 1px solid #4a5568;">VISA</div>
                <div style="background: #2d3748; padding: 4px 10px; border-radius: 4px; font-size: 10px; color: white; font-weight: bold; border: 1px solid #4a5568;">MASTERCARD</div>
                <div style="background: #2d3748; padding: 4px 10px; border-radius: 4px; font-size: 10px; color: #f97316; font-weight: bold; border: 1px solid #4a5568;">ORANGE MONEY</div>
                <div style="background: #2d3748; padding: 4px 10px; border-radius: 4px; font-size: 10px; color: #facc15; font-weight: bold; border: 1px solid #4a5568;">MTN MOMO</div>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Effet Hover Unique : Orange + Légère montée */
    .hover-orange:hover {
        color: #f97316 !important;
        transform: translateY(-4px);
    }
</style>

</body>
 </html>
