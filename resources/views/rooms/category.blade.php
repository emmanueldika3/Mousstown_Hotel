<x-app-layout>
    <style>
        .room-slider { position: relative; height: 280px; width: 100%; overflow: hidden; background: #f1f5f9; }
        .slides { display: flex; width: 400%; height: 100%; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); }
        .slides img { width: 25%; height: 100%; object-fit: cover; }
        .slider-nav { position: absolute; bottom: 15px; left: 50%; transform: translateX(-50%); display: flex; gap: 6px; z-index: 10; }
        .nav-dot { width: 8px; height: 8px; background: rgba(255,255,255,0.7); border-radius: 50%; }
        .room-card:hover .slides { animation: slideShowFour 10s infinite; }
        @keyframes slideShowFour {
            0%, 20% { transform: translateX(0); }
            25%, 45% { transform: translateX(-25%); }
            50%, 70% { transform: translateX(-50%); }
            75%, 95% { transform: translateX(-75%); }
            100% { transform: translateX(0); }
        }
        .room-card { background: white; border-radius: 24px; overflow: hidden; border: 1px solid #f1f5f9; transition: all 0.3s ease; }
        .room-card:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
    </style>

    <section style="padding: 60px 0; background: #f8fafc;">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">

            <div style="margin-bottom: 50px; display: flex; justify-content: space-between; align-items: flex-end;">
                <div>
                    <h2 style="font-weight: 900; color: #1a2238; text-transform: uppercase; letter-spacing: 2px; margin: 0;">Collection {{ $categoryName }}</h2>
                    <p style="color: #64748b; margin-top: 5px;">Visite immersive : Gamme {{ $categoryName }}</p>
                </div>
                <a href="/" style="color: #1a2238; font-weight: 700; font-size: 14px; text-decoration: none; border-bottom: 2px solid #ff8c00;">Retour aux catégories</a>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(380px, 1fr)); gap: 35px;">
                @foreach($rooms as $index => $room)
                    @php
                        // Utilisation du nouveau champ room_type pour la logique d'image
                        $currentType = strtolower($room->room_type);

                        if (str_contains($currentType, 'confort')) {
                            $img1 = "https://images.unsplash.com/photo-1611892440504-42a792e24d32?q=80&w=800";
                            $img2 = "https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=800";
                            $img3 = "https://images.unsplash.com/photo-1596701062351-8c2c14d1fdd0?q=80&w=800";
                            $img4 = "https://images.unsplash.com/photo-1493809842364-78817add7ffb?q=80&w=800";
                        }
                        elseif (str_contains($currentType, 'royale')) {
                            $img1 = "https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=1000";
                            $img2 = "https://images.unsplash.com/photo-1560440021-33f9b867899d?q=80&w=800";
                            $img3 = "https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=800";
                            $img4 = "https://images.unsplash.com/photo-1571896349842-33c89424de2d?q=80&w=800";
                        }
                        elseif (str_contains($currentType, 'luxe')) {
                            $img1 = "https://images.unsplash.com/photo-1590490360182-c33d57733427?w=1000";
                            $img2 = "https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=800";
                            $img3 = "https://images.unsplash.com/photo-1499793983690-e29da59ef1c2?q=80&w=800";
                            $img4 = "https://images.unsplash.com/photo-1544161515-4ab6ce6db874?q=80&w=800";
                        }
                        else {
                            $img1 = "https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=1000";
                            $img2 = "https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=800&q=80";
                            $img3 = "https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?q=80&w=800";
                            $img4 = "https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=800";
                        }
                    @endphp

                    <div class="room-card">
                        <div class="room-slider">
                            <div class="slides">
                                <img src="{{ $img1 }}" alt="Image Principale" loading="lazy" onerror="this.src='https://via.placeholder.com/800x600?text=Image+en+cours'">
                                <img src="{{ $img2 }}" alt="Détail 1" loading="lazy">
                                <img src="{{ $img3 }}" alt="Détail 2" loading="lazy">
                                <img src="{{ $img4 }}" alt="Détail 3" loading="lazy">
                            </div>
                            <div class="slider-nav">
                                @for($i=0; $i<4; $i++) <div class="nav-dot"></div> @endfor
                            </div>
                        </div>

                        <div style="padding: 25px;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;">
                                <div>
                                    <h3 style="margin: 0; color: #1a2238; font-size: 22px; font-weight: 800;">{{ $room->name }}</h3>
                                    <span style="color: #ff8c00; font-size: 14px;">★★★★★</span>
                                </div>
                                <div style="text-align: right;">
                                    {{-- Mise à jour vers price_night --}}
                                    <span style="display: block; font-weight: 900; color: #1a2238; font-size: 20px;">{{ number_format($room->price_night, 0, ',', ' ') }} F</span>
                                    <span style="font-size: 11px; color: #94a3b8; text-transform: uppercase;">Par nuit</span>
                                </div>
                            </div>

                            <p style="color: #64748b; font-size: 14px; line-height: 1.6; margin-bottom: 25px;">
                                @if(str_contains($currentType, 'royale'))
                                    Une expérience hors du commun. Matériaux nobles, volume généreux et vue panoramique.
                                @elseif(str_contains($currentType, 'standard'))
                                    Praticité et confort réunis. Idéal pour un court séjour avec tout le nécessaire à portée de main.
                                @elseif(str_contains($currentType, 'luxe'))
                                    Le luxe dans les moindres détails : balcon privé, douche à l'italienne et literie premium.
                                @else
                                    Un espace soigné pour une détente absolue ({{ $room->room_type }}).
                                @endif
                            </p>

                            <div style="display: flex; justify-content: space-between; background: #f8fafc; padding: 12px 20px; border-radius: 12px; margin-bottom: 25px;">
                                <div style="text-align: center;"><span style="display: block; font-size: 18px;">📶</span><span style="font-size: 10px; color: #64748b; font-weight: 700;">WIFI</span></div>
                                <div style="text-align: center;"><span style="display: block; font-size: 18px;">❄️</span><span style="font-size: 10px; color: #64748b; font-weight: 700;">CLIM</span></div>
                                <div style="text-align: center;"><span style="display: block; font-size: 18px;">🚿</span><span style="font-size: 10px; color: #64748b; font-weight: 700;">BAIN</span></div>
                                <div style="text-align: center;"><span style="display: block; font-size: 18px;">☕</span><span style="font-size: 10px; color: #64748b; font-weight: 700;">CAFE</span></div>
                            </div>

                            <a href="{{ route('reservations.create', ['room_id' => $room->id]) }}"
                               style="display: block; width: 100%; background: #1a2238; color: white; text-align: center; padding: 16px; border-radius: 14px; text-decoration: none; font-weight: 800; font-size: 14px; transition: 0.3s;"
                               onmouseover="this.style.background='#ff8c00'; this.style.transform='scale(1.02)'"
                               onmouseout="this.style.background='#1a2238'; this.style.transform='scale(1)'">
                                RÉSERVER CE SÉJOUR
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>