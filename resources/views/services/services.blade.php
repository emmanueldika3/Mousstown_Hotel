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

    <div style="max-width: 1000px; margin: -2.5rem auto 8rem; position: relative; z-index: 30; background: white; padding: 2rem; border-radius: 20px; box-shadow: 0 25px 60px -15px rgba(0,0,0,0.3); display: flex; justify-content: space-around; text-align: center; flex-wrap: wrap; gap: 2rem; border: 1px solid rgba(249, 115, 22, 0.1);">
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
        <div style="display: flex; align-items: center; gap: 4rem; margin-bottom: 8rem; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <div style="overflow: hidden; border-radius: 25px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); height: 450px;">
                    <img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&w=800" style="width: 100%; height: 100%; object-fit: cover; transition: 0.8s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                </div>
            </div>
            <div style="flex: 1; min-width: 300px;">
                <span style="color: #f97316; font-weight: 900; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px;">Gastronomie</span>
                <h2 style="font-size: 3rem; margin: 15px 0; font-weight: 900; color: #1a202c; line-height: 1.1;">Le Gourmet <br>Mousstown</h2>
                <p style="line-height: 1.8; color: #4a5568; font-size: 1.1rem; margin-bottom: 2rem;">Une fusion entre saveurs camerounaises et haute cuisine internationale. Nos chefs préparent chaque plat comme une œuvre d'art pour vos sens.</p>
                <a href="#" style="color: #f97316; text-decoration: none; font-weight: 900; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 1px;">Découvrir la carte <i class="fa-solid fa-arrow-right" style="margin-left: 10px;"></i></a>
            </div>
        </div>

        <div style="display: flex; align-items: center; gap: 4rem; margin-bottom: 8rem; flex-wrap: wrap; flex-direction: row-reverse;">
            <div style="flex: 1; min-width: 300px;">
                <div style="overflow: hidden; border-radius: 25px; box-shadow: 0 20px 40px rgba(0,0,0,0.1); height: 450px;">
                    <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?auto=format&fit=crop&w=800" style="width: 100%; height: 100%; object-fit: cover; transition: 0.8s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                </div>
            </div>
            <div style="flex: 1; min-width: 300px;">
                <span style="color: #f97316; font-weight: 900; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 2px;">Détente</span>
                <h2 style="font-size: 3rem; margin: 15px 0; font-weight: 900; color: #1a202c; line-height: 1.1;">Le Sanctuaire <br>Bien-être</h2>
                <p style="line-height: 1.8; color: #4a5568; font-size: 1.1rem; margin-bottom: 2rem;">Évadez-vous dans notre espace dédié. Massages aux pierres chaudes, hammam et rituels de soins personnalisés dans un cadre apaisant.</p>
                <a href="#" style="background: #1a202c; color: white; padding: 15px 40px; border-radius: 50px; text-decoration: none; font-weight: 800; text-transform: uppercase; font-size: 0.8rem; transition: 0.3s;" onmouseover="this.style.background='#f97316'">Réserver un soin</a>
            </div>
        </div>
    </div>

    <div style="background: #f8fafc; padding: 6rem 1.5rem; border-top: 1px solid #e2e8f0;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 5rem;">
                <span style="color: #f97316; font-weight: 800; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 3px;">Excellence Opérationnelle</span>
                <h2 style="font-size: 2.5rem; font-weight: 900; text-transform: uppercase; margin-top: 1rem; color: #1a202c;">Services <span style="color: #f97316;">Exclusifs</span></h2>
                <div style="width: 50px; height: 3px; background: #f97316; margin: 20px auto;"></div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2.5rem;">
                <div style="background: white; padding: 3rem 2rem; border-radius: 25px; border: 1px solid #e2e8f0; transition: 0.4s;" onmouseover="this.style.transform='translateY(-15px)'; this.style.borderColor='#f97316';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#e2e8f0';">
                    <div style="background: rgba(249, 115, 22, 0.1); width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;"><i class="fa-solid fa-shirt" style="font-size: 1.5rem; color: #f97316;"></i></div>
                    <h4 style="font-size: 1.1rem; font-weight: 900; margin-bottom: 1rem; color: #1a202c; text-transform: uppercase;">Blanchisserie Royale</h4>
                    <p style="font-size: 0.95rem; color: #4a5568;">Un soin méticuleux pour vos textiles les plus précieux. Service express disponible 24h/24.</p>
                </div>
                <div style="background: white; padding: 3rem 2rem; border-radius: 25px; border: 1px solid #e2e8f0; transition: 0.4s;" onmouseover="this.style.transform='translateY(-15px)'; this.style.borderColor='#f97316';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#e2e8f0';">
                    <div style="background: rgba(249, 115, 22, 0.1); width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;"><i class="fa-solid fa-car-side" style="font-size: 1.5rem; color: #f97316;"></i></div>
                    <h4 style="font-size: 1.1rem; font-weight: 900; margin-bottom: 1rem; color: #1a202c; text-transform: uppercase;">Chauffeur Privé</h4>
                    <p style="font-size: 0.95rem; color: #4a5568;">Explorez Douala à bord de nos berlines haut de gamme avec nos chauffeurs bilingues experts.</p>
                </div>
                <div style="background: white; padding: 3rem 2rem; border-radius: 25px; border: 1px solid #e2e8f0; transition: 0.4s;" onmouseover="this.style.transform='translateY(-15px)'; this.style.borderColor='#f97316';" onmouseout="this.style.transform='translateY(0)'; this.style.borderColor='#e2e8f0';">
                    <div style="background: rgba(249, 115, 22, 0.1); width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center; margin-bottom: 2rem;"><i class="fa-solid fa-briefcase" style="font-size: 1.5rem; color: #f97316;"></i></div>
                    <h4 style="font-size: 1.1rem; font-weight: 900; margin-bottom: 1rem; color: #1a202c; text-transform: uppercase;">Business Center</h4>
                    <p style="font-size: 0.95rem; color: #4a5568;">Espace de travail connecté avec secrétariat dédié pour vos besoins professionnels urgents.</p>
                </div>
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
                    Indiquez vos détails de vol lors de votre réservation ou envoyez-les nous par WhatsApp au moins 24h avant votre arrivée pour un accueil VIP.
                </p>
            </details>

            <details style="background: #2d3748; padding: 1.2rem; border-radius: 12px; margin-bottom: 1rem; cursor: pointer; border: 1px solid rgba(255,255,255,0.05);">
                <summary style="font-weight: 700; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                    Quels sont les modes de paiement acceptés ? <i class="fa-solid fa-plus" style="color: #f97316;"></i>
                </summary>
                <p style="margin-top: 1rem; color: #a0aec0; font-size: 0.95rem; line-height: 1.6; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 1rem;">
                    Nous acceptons les cartes bancaires internationales, ainsi que les paiements Orange Money et MTN MoMo pour plus de flexibilité.
                </p>
            </details>
        </div>
    </div>

  <div style="background: #f97316; padding: 5rem 2rem; text-align: center; color: white;">
    <h3 style="font-size: 2.2rem; font-weight: 900; text-transform: uppercase; margin-bottom: 1.5rem;">
        Un souhait particulier ?
    </h3>

    <p style="margin-bottom: 3rem; font-weight: 400; font-size: 1.1rem; opacity: 0.9; max-width: 600px; margin-left: auto; margin-right: auto; line-height: 1.6;">
        Notre équipe de conciergerie est prête à réaliser l'impossible pour rendre votre séjour inoubliable.
    </p>

    <a href="/Contact"
       style="display: inline-block; background: #1a202c; color: white; padding: 18px 50px; border-radius: 50px; text-decoration: none; font-weight: 900; text-transform: uppercase; transition: 0.3s; box-shadow: 0 15px 30px rgba(0,0,0,0.2);"
       onmouseover="this.style.background='white'; this.style.color='#f97316'; this.style.transform='scale(1.05)'"
       onmouseout="this.style.background='#1a202c'; this.style.color='white'; this.style.transform='scale(1)'">
        Contacter la Réception
    </a>
</div>
</x-app-layout>
