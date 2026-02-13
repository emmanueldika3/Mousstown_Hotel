<x-app-layout>
    <style>
        /* Conteneur du Slider */
        .room-slider {
            position: relative;
            height: 250px;
            width: 100%;
            overflow: hidden;
        }
        .slides {
            display: flex;
            width: 300%; /* 3 images = 300% */
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }
        .slides img {
            width: 33.33%;
            height: 100%;
            object-fit: cover;
        }
        /* Système de navigation par boutons radio invisible */
        .slider-nav {
            position: absolute;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 10;
        }
        .nav-dot {
            width: 10px;
            height: 10px;
            background: rgba(255,255,255,0.5);
            border-radius: 50%;
            cursor: pointer;
            border: 1px solid rgba(0,0,0,0.1);
        }
        /* Animation au survol : on fait défiler les images */
        .room-card:hover .slides {
            animation: slideShow 8s infinite;
        }

        @keyframes slideShow {
            0%, 30% { transform: translateX(0); }
            33%, 63% { transform: translateX(-33.33%); }
            66%, 100% { transform: translateX(-66.66%); }
        }

        .room-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }
        .room-card:hover {
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
    </style>

    <section style="padding: 60px 0; background: #f8fafc;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">

            <div style="margin-bottom: 50px;">
                <h2 style="font-weight: 900; color: #1a2238; text-transform: uppercase; letter-spacing: 2px;">
                    Détails : {{ $categoryName }}
                </h2>
                <p style="color: #64748b;">Explorez les options disponibles pour cette catégorie</p>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(380px, 1fr)); gap: 35px;">
                @foreach($rooms as $room)
                    <div class="room-card">
                        <div class="room-slider">
                            <div class="slides">

                                <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?w=800" alt="Vue 1">
                                <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800" alt="Vue 2">
                                <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=800" alt="Vue 3">
                            </div>
                            <div class="slider-nav">
                                <div class="nav-dot"></div>
                                <div class="nav-dot"></div>
                                <div class="nav-dot"></div>
                            </div>
                        </div>

                        <div style="padding: 25px;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                                <div>
                                    <h3 style="margin: 0; color: #1a2238; font-size: 20px; font-weight: 800;">Chambre {{ $room->room_number }}</h3>
                                    <span style="color: #64748b; font-size: 13px;">{{ $categoryName }} • Rez-de-chaussée</span>
                                </div>
                                <div style="text-align: right;">
                                    <span style="display: block; font-weight: 900; color: #ff8c00; font-size: 18px;">{{ number_format($room->price, 0, ',', ' ') }} F</span>
                                    <span style="font-size: 11px; color: #94a3b8; text-transform: uppercase;">Par nuit</span>
                                </div>
                            </div>

                            <p style="color: #64748b; font-size: 14px; line-height: 1.5; margin-bottom: 20px;">
                                Une immersion totale dans le luxe avec un balcon privé, une literie de qualité supérieure et un accès direct aux services premium.
                            </p>

                            <div style="display: flex; gap: 15px; margin-bottom: 25px; border-top: 1px solid #f1f5f9; padding-top: 15px;">
                                <span title="Wifi Gratuit">📶</span>
                                <span title="Climatisation">❄️</span>
                                <span title="Petit déjeuner">☕</span>
                                <span title="Coffre-fort">🔐</span>
                            </div>

                            <a href="#" style="display: block; width: 100%; background: #1a2238; color: white; text-align: center; padding: 14px; border-radius: 12px; text-decoration: none; font-weight: 700; transition: 0.3s;"
                               onmouseover="this.style.background='#ff8c00'"
                               onmouseout="this.style.background='#1a2238'">
                                RÉSERVER MAINTENANT
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
