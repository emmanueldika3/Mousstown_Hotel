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
<section class="py-20 bg-gray-50">
    <div style="display: flex; gap: 2rem; justify-content: center; align-items: flex-start; width: 100%; padding: 2rem 0;">

    <div style="width: 320px; background: white; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease-in-out;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)';" class="group">
        <div style="height: 200px; overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?w=600" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="padding: 1.5rem;">
            <h3 style="font-size: 16px; font-weight: 900; text-transform: uppercase; margin-bottom: 8px; color: #1a2238;">Suite Panoramique</h3>
            <p style="font-size: 10px; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 20px;">Wi-Fi • Clim • Vue mer</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span style="font-size: 15px; font-weight: 900; color: #1a2238;">210 000 FCFA</span>
                <button style="background: #f97316; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 11px; font-weight: 900; text-transform: uppercase; cursor: pointer; letter-spacing: 0.5px; box-shadow: 0 2px 4px rgba(249, 115, 22, 0.3);">RÉSERVER</button>
            </div>
        </div>
    </div>

    <div style="width: 320px; background: white; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease-in-out;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)';" class="group">
        <div style="height: 200px; overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?w=600" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="padding: 1.5rem;">
            <h3 style="font-size: 16px; font-weight: 900; text-transform: uppercase; margin-bottom: 8px; color: #1a2238;">Chambre Deluxe</h3>
            <p style="font-size: 10px; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 20px;">Wi-Fi • Clim • Balcon</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span style="font-size: 15px; font-weight: 900; color: #1a2238;">165 000 FCFA</span>
                <button style="background: #f97316; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 11px; font-weight: 900; text-transform: uppercase; cursor: pointer; letter-spacing: 0.5px; box-shadow: 0 2px 4px rgba(249, 115, 22, 0.3);">RÉSERVER</button>
            </div>
        </div>
    </div>

    <div style="width: 320px; background: white; border-radius: 12px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1); overflow: hidden; transition: all 0.3s ease-in-out;" onmouseover="this.style.transform='scale(1.05)'; this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.2)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)';" class="group">
        <div style="height: 200px; overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1566665797739-1674de7a421a?w=600" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div style="padding: 1.5rem;">
            <h3 style="font-size: 16px; font-weight: 900; text-transform: uppercase; margin-bottom: 8px; color: #1a2238;">Chambre Standard</h3>
            <p style="font-size: 10px; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 20px;">Wi-Fi • Clim • Douche</p>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <span style="font-size: 15px; font-weight: 900; color: #1a2238;">118 000 FCFA</span>
                <button style="background: #f97316; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 11px; font-weight: 900; text-transform: uppercase; cursor: pointer; letter-spacing: 0.5px; box-shadow: 0 2px 4px rgba(249, 115, 22, 0.3);">RÉSERVER</button>
            </div>
        </div>
    </div>

</div>
</section>
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-[#1a2238] text-xl font-black uppercase mb-10 tracking-[0.2em]">Offres & Promotions</h2>

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
