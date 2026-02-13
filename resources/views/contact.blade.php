<x-app-layout>
    <div style="height: 30vh; background: linear-gradient(135deg, #1a202c 0%, #2d3748 100%); margin-top: -2rem; display: flex; align-items: flex-start; justify-content: center; border-bottom: 4px solid #f97316; padding-top: 4rem;">
        <h1 style="font-size: clamp(2rem, 5vw, 3.5rem); font-weight: 900; text-transform: uppercase; letter-spacing: 10px; color: white; margin: 0;">
            Nous <span style="color: #f97316;">Joindre</span>
        </h1>
    </div>

    <div style="max-width: 1150px; margin: 2.5rem auto 5rem; padding: 0 1rem; position: relative; z-index: 10;">
        <div style="display: flex; flex-wrap: wrap; background: white; border-radius: 25px; overflow: hidden; box-shadow: 0 25px 60px rgba(0,0,0,0.15); border: 1px solid #edf2f7;">

            <div style="flex: 1; min-width: 350px; background: #1a202c; color: white; padding: 4rem 3rem; position: relative;">
                <div style="position: absolute; top: 0; left: 0; width: 6px; height: 100%; background: #f97316;"></div>

                <h2 style="color: #f97316; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 3px; margin-bottom: 1rem; font-weight: 950;">
                    Conciergerie
                </h2>
                <h2 style="font-size: 2.2rem; font-weight: 800; margin-bottom: 3rem; line-height: 1.2;">
                    Infos <span style="font-weight: 300; opacity: 0.7;">Pratiques</span>
                </h2>

                <div style="display: flex; flex-direction: column; gap: 2.5rem;">
                    <div style="display: flex; align-items: center; gap: 1.5rem;">
                        <div style="background: rgba(249, 115, 22, 0.15); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fa-solid fa-location-dot" style="color: #f97316; font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <p style="margin: 0; font-size: 0.75rem; text-transform: uppercase; color: #94a3b8; font-weight: 700; letter-spacing: 1px;">Localisation</p>
                            <span style="font-weight: 500; color: #e2e8f0; font-size: 1.1rem;">Bonapriso, Douala</span>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 1.5rem;">
                        <div style="background: rgba(249, 115, 22, 0.15); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fa-solid fa-phone" style="color: #f97316; font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <p style="margin: 0; font-size: 0.75rem; text-transform: uppercase; color: #94a3b8; font-weight: 700; letter-spacing: 1px;">Ligne Directe</p>
                            <span style="font-weight: 500; color: #e2e8f0; font-size: 1.1rem;">+237 696 945 284</span>
                        </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 1.5rem;">
                        <div style="background: rgba(249, 115, 22, 0.15); width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            <i class="fa-solid fa-envelope" style="color: #f97316; font-size: 1.2rem;"></i>
                        </div>
                        <div>
                            <p style="margin: 0; font-size: 0.75rem; text-transform: uppercase; color: #94a3b8; font-weight: 700; letter-spacing: 1px;">Email VIP</p>
                            <span style="font-weight: 500; color: #e2e8f0; font-size: 1.1rem;">contact@mousstown.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <div style="flex: 1.5; min-width: 350px; padding: 4rem 3.5rem; background: white;">
                <h2 style="font-size: 1.8rem; font-weight: 800; color: #1a202c; margin-bottom: 2.5rem;">Envoyez un <span style="color: #f97316;">Message</span></h2>

                <form action="#" method="POST">
                    @csrf
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #718096;">Nom Complet</label>
                            <input type="text" placeholder="Ex: Votre nom" style="padding: 1rem; border: 1px solid #edf2f7; border-radius: 10px; outline: none; background: #f8fafc;">
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 0.5rem;">
                            <label style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #718096;">Email</label>
                            <input type="email" placeholder="Votre Email" style="padding: 1rem; border: 1px solid #edf2f7; border-radius: 10px; outline: none; background: #f8fafc;">
                        </div>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem;">
                        <label style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #718096;">Sujet</label>
                        <select style="padding: 1rem; border: 1px solid #edf2f7; border-radius: 10px; outline: none; background: #f8fafc;">
                            <option>Réservation de chambre</option>
                            <option>Service Conciergerie</option>
                            <option>Autre demande</option>
                        </select>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 2.5rem;">
                        <label style="font-size: 0.75rem; font-weight: 800; text-transform: uppercase; color: #718096;">Message</label>
                        <textarea rows="4" placeholder="Comment pouvons-nous vous aider ?" style="padding: 1rem; border: 1px solid #edf2f7; border-radius: 10px; outline: none; background: #f8fafc; resize: none;"></textarea>
                    </div>
                    <button type="submit" style="width: 100%; background: #f97316; color: white; padding: 1.2rem; border-radius: 12px; border: none; font-weight: 900; text-transform: uppercase; letter-spacing: 2px; cursor: pointer; transition: 0.3s; box-shadow: 0 10px 20px rgba(249, 115, 22, 0.2);" onmouseover="this.style.background='#1a202c'; this.style.transform='translateY(-3px)'" onmouseout="this.style.background='#f97316'; this.style.transform='translateY(0)'">
                        Envoyer ma demande
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div style="max-width: 1150px; margin: 0 auto 5rem; padding: 0 1rem;">
        <div style="border-radius: 25px; overflow: hidden; height: 450px; border: 1px solid #e2e8f0; box-shadow: 0 15px 40px rgba(0,0,0,0.05);">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15919.4567220194!2d9.702!3d4.045!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x106112999e557b7f%3A0x7d6c6e758a01292!2sBonapriso%2C%20Douala!5e0!3m2!1sfr!2scm!4v1700000000000"
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </div>
</x-app-layout>
