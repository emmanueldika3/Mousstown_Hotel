<x-app-layout>
    {{-- On ajoute un "min-h-screen" pour s'assurer que la section prend de la place --}}


<style>
    /* Petit ajustement pour mobile : empilement si l'écran est trop petit */
    @media (max-width: 640px) {
        div[style*="flex-flow: row wrap"] {
            flex-direction: column !important;
        }
        div[style*="border-right"] {
            border-right: none !important;
            border-bottom: 1px solid #f1f5f9 !important;
        }
    }
</style>
<style>
    .room-card {
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.3s ease;
    }
    .room-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.2);
    }
    .image-container img {
        transition: transform 0.8s ease;
    }
    .room-card:hover .image-container img {
        transform: scale(1.1);
    }
    .btn-visit {
        transition: all 0.3s ease;
    }
    .btn-visit:hover {
        background-color: #ff8c00 !important;
        box-shadow: 0 5px 15px rgba(255, 140, 0, 0.4);
    }
    .amenity-tag {
        font-size: 12px;
        color: #6b7280;
        background: #f3f4f6;
        padding: 4px 10px;
        border-radius: 4px;
        display: flex;
        align-items: center;
        gap: 5px;
    }
</style>

<section style="padding: 60px 0; background-color: #fcfcfc;">
    <div style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">

        <h2 style="font-weight: 900; font-family: sans-serif; text-transform: uppercase; color: #1a2238; font-size: 24px; letter-spacing: 0.2em; margin-bottom: 60px;">
            Nos Chambres & Suites
        </h2>

        @if(isset($categories) && $categories->count() > 0)
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 40px;">
                @foreach($categories as $index => $cat)
                    @php
                        $categoryName = strtolower($cat['name']);

                        // LOGIQUE DE PRIX ET DESCRIPTION PAR CATÉGORIE
                        if (str_contains($categoryName, 'standard')) {
                            $dynamicPrice = "25 000";
                            $dynamicDesc = "L'essentiel du confort : un espace optimisé et fonctionnel, idéal pour vos courts séjours et voyages d'affaires.";
                        } elseif (str_contains($categoryName, 'luxe')) {
                            $dynamicPrice = "60 000";
                            $dynamicDesc = "Élégance et raffinement : profitez d'une vue imprenable et d'un mobilier haut de gamme pour une expérience supérieure.";
                        } elseif (str_contains($categoryName, 'confort')) {
                            $dynamicPrice = "45 000";
                            $dynamicDesc = "Le parfait équilibre : plus d'espace et des équipements pensés pour votre bien-être et une détente totale.";
                        } elseif (str_contains($categoryName, 'royale')) {
                            $dynamicPrice = "150 000";
                            $dynamicDesc = "Le summum du prestige : un service exclusif dans un cadre majestueux, conçu pour ceux qui exigent l'exceptionnel.";
                        } else {
                            $dynamicPrice = "35 000";
                            $dynamicDesc = "Découvrez le charme unique de nos chambres, alliant design moderne et accueil chaleureux pour un séjour réussi.";
                        }

                        $images = [
                            'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=1000',
                            'https://images.unsplash.com/photo-1590490360182-c33d57733427?w=1000',
                            'https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=1000',
                            'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=1000'
                        ];
                        $currentImage = $images[$index % count($images)];
                    @endphp

                    <div class="room-card" style="background: white; border-radius: 20px; overflow: hidden; border: 1px solid #eee;">

                        <div class="image-container" style="height: 280px; width: 100%; overflow: hidden; position: relative;">
                            <img src="{{ $currentImage }}" alt="{{ $cat['name'] }}" style="width: 100%; height: 100%; object-fit: cover;">
                            <div style="position: absolute; bottom: 15px; left: 15px; background: rgba(26, 34, 56, 0.9); color: white; padding: 8px 15px; border-radius: 5px; font-weight: bold;">
                                Dès {{ $dynamicPrice }} FCFA
                            </div>
                        </div>

                        <div style="padding: 30px;">
                            <h3 style="font-weight: 800; color: #1a2238; text-transform: uppercase; font-size: 22px; margin-bottom: 10px;">
                                {{ $cat['name'] }}
                            </h3>

                            <p style="color: #6b7280; font-size: 15px; line-height: 1.6; margin-bottom: 20px; min-height: 72px;">
                                {{ $dynamicDesc }}
                            </p>

                            <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 25px;">
                                <span class="amenity-tag">❄️ Clim</span>
                                <span class="amenity-tag">📶 Wi-Fi</span>
                                <span class="amenity-tag">📺 Smart TV</span>
                                <span class="amenity-tag">☕ Petit-déj</span>
                            </div>

                            <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid #eee; padding-top: 20px;">
                                <span style="font-size: 13px; color: #9ca3af;">{{ $cat['count'] }} chambres dispos</span>
                                <a href="{{ route('rooms.category', ['type' => $cat['name']]) }}"
                                   class="btn-visit"
                                   style="background-color: #1a2238; color: white; padding: 12px 25px; border-radius: 8px; text-decoration: none; font-weight: bold; font-size: 12px; text-transform: uppercase;">
                                     Visiter
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
<section class="py-16 bg-white">
<h2 style="font-weight: 900; font-family: sans-serif; text-transform: uppercase; color: #1a2238; font-size: 24px; letter-spacing: 0.2em; margin-bottom: 10px;">
    Offres & Promotions
</h2>

        <div class="flex flex-col lg:flex-row gap-8 items-stretch">

            <div style="flex: 1.5; background: white; border-radius: 20px; box-shadow: 0 15px 30px rgba(0,0,0,0.1); overflow: hidden; display: flex; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='scale(1)'">
                <div style="width: 45%; overflow: hidden; position: relative;">
                    <img src="https://images.unsplash.com/photo-1540518614846-7eded433c457?q=80&w=800" style="width: 100%; height: 100%; object-fit: cover;">
                    <div style="position: absolute; top: 20px; left: 20px; background: #f97316; color: white; padding: 5px 15px; font-size: 10px; font-weight: 900; border-radius: 5px; text-transform: uppercase;">Promo</div>
                </div>
                <div style="width: 55%; padding: 40px; display: flex; flex-direction: column; justify-content: center;">
                    <h3 style="font-size: 24px; font-weight: 900; color: #1a2238; text-transform: uppercase; line-height: 1.2; margin-bottom: 15px;">
                        03 Nuits au <br> <span style="color: #f97316;">prix de deux</span>
                    </h3>
                    <p style="font-size: 12px; color: #94a3b8; font-weight: 600; text-transform: uppercase; margin-bottom: 25px;">Valable sur toutes nos suites junior et deluxe</p>
                    <button style="background: #1a2238; color: white; border: none; padding: 12px 25px; border-radius: 8px; font-size: 11px; font-weight: 900; text-transform: uppercase; cursor: pointer; width: fit-content;">Profiter de l'offre</button>
                </div>
            </div>

            <div style="flex: 1; background: #f8fafc; border-radius: 20px; padding: 40px; display: flex; flex-direction: column; justify-content: center; text-align: center; border: 1px solid #e2e8f0;">
                <div style="color: #facc15; font-size: 40px; margin-bottom: 20px; opacity: 0.5;">“</div>
                <p style="font-size: 16px; font-weight: 700; color: #475569; italic; line-height: 1.6; margin-bottom: 20px;">
                    "Un séjour mémorable. Le rapport qualité-prix avec les promotions est imbattable pour un tel niveau de luxe."
                </p>
                <div style="display: flex; flex-direction: column; align-items: center;">
                    <span style="font-size: 12px; font-weight: 900; color: #1a2238; text-transform: uppercase;">Sandra L.</span>
                    <span style="font-size: 10px; color: #f97316; font-weight: 800; text-transform: uppercase;">Client régulier</span>
                </div>
            </div>

        </div>
    </div>
</section>

<section style="padding: 8rem 2rem; background: #fdfdfd; overflow: hidden;">

    <div style="max-width: 800px; margin: 0 auto 4rem auto; text-align: center;">
        <h4 style="color: #f97316; font-weight: 900; text-transform: uppercase; font-size: 13px; letter-spacing: 4px; margin-bottom: 1rem;">L'Excellence Mousstown</h4>
        <h2 style="color: #2d3748; font-size: clamp(2rem, 5vw, 3.2rem); font-weight: 900; text-transform: uppercase; line-height: 1.1;">
            Nos Services <span style="color: #f97316;">Exclusifs</span>
        </h2>
        <div style="width: 50px; height: 3px; background: #f97316; margin: 1.5rem auto;"></div>
    </div>

    <div class="swiper mySwiper" style="max-width: 1300px; padding: 2rem 1rem 4rem 1rem;">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="service-card-slider">
                    <div class="icon-circle">🛏️</div>
                    <h3>Chambres & Suites</h3>
                    <p>Un confort absolu avec une vue panoramique sur la ville pour vos nuits d'exception.</p>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="service-card-slider">
                    <div class="icon-circle">✨</div>
                    <h3>Spa & Détente</h3>
                    <p>Massages et rituels de soins dans un cadre zen pour une relaxation totale.</p>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="service-card-slider">
                    <div class="icon-circle">🏋️‍♂️</div>
                    <h3>Salle de Sport</h3>
                    <p>Équipements de pointe et coachs privés pour maintenir votre forme physique.</p>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="service-card-slider">
                    <div class="icon-circle">🍽️</div>
                    <h3>Haute Cuisine</h3>
                    <p>Une expérience culinaire raffinée mêlant saveurs locales et gastronomie.</p>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="service-card-slider">
                    <div class="icon-circle">✈️</div>
                    <h3>Navette Aéroport</h3>
                    <p>Transferts VIP sécurisés et ponctuels pour vos arrivées et départs.</p>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="service-card-slider">
                    <div class="icon-circle">👑</div>
                    <h3>Conciergerie</h3>
                    <p>Un service dédié 24h/24 pour répondre à toutes vos exigences de voyage.</p>
                </div>
            </div>

        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next" style="color: #f97316;"></div>
        <div class="swiper-button-prev" style="color: #f97316;"></div>
    </div>
</section>

<style>
    .service-card-slider {
        background: white;
        border: 2px solid #e2e8f0;
        padding: 3.5rem 2rem;
        border-radius: 20px;
        text-align: center;
        transition: 0.4s;
        height: 100%;
        cursor: grab;
    }

    .icon-circle {
        width: 80px; height: 80px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        margin: 0 auto 2rem auto;
        font-size: 2.2rem;
        transition: 0.4s;
    }

    .service-card-slider h3 {
        color: #2d3748;
        text-transform: uppercase;
        font-size: 1.1rem;
        font-weight: 900;
        margin-bottom: 1rem;
    }

    .service-card-slider p {
        color: #64748b;
        font-size: 14px;
        line-height: 1.6;
    }

    /* Hover effect */
    .service-card-slider:hover {
        background: #2d3748;
        border-color: #f97316;
        transform: translateY(-10px);
    }

    .service-card-slider:hover .icon-circle {
        background: #f97316;
        border-color: #f97316;
        transform: rotateY(180deg);
    }

    .service-card-slider:hover h3 { color: white; }
    .service-card-slider:hover p { color: #94a3b8; }

    /* Customiser pagination Swiper */
    .swiper-pagination-bullet-active {
        background: #f97316 !important;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: { delay: 3000 },
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
    });
</script>

</x-app-layout>
