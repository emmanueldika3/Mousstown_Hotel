<x-app-layout>
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
</x-app-layout>
