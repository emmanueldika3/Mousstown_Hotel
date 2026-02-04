<x-app-layout>
  <div style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: #1a202c; padding: 1rem; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

   <div style="width: 100%; max-width: 500px; background: white; border-radius: 25px; box-shadow: 0 25px 60px -12px rgba(0,0,0,0.6); overflow: hidden;">

        <div style="background: #2d3748; padding: 2rem; text-align: center; border-bottom: 4px solid #f97316;">
            <div style="display: flex; align-items: center; justify-content: center; gap: 15px; margin-bottom: 1.2rem;">
                <img src="/images/logo_MH.png" alt="Mousstown Logo"
                     style="width: 70px; height: 70px; border-radius: 50%; border: 2px solid #f97316; background: #1a202c; object-fit: cover;">

                <h1 style="color: white; font-size: 1.8rem; font-weight: 400; text-transform: uppercase; margin: 0; letter-spacing: 2px;">
                    MOUSSTOWN_<span style="color: #f97316;">Hotel</span>
                </h1>
            </div>

            <h2 style="color: white; font-weight: 900; text-transform: uppercase; letter-spacing: 2px; margin: 0; font-size: 1.3rem;">Créer mon compte</h2>
            <p style="color: #cbd5e0; font-size: 9px; margin-top: 5px; text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">L'excellence commence ici</p>
        </div>

        <form method="POST" action="{{ route('register') }}" style="padding: 2rem 2.5rem;">
            @csrf <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div>
                    <label style="display: block; font-size: 9px; font-weight: 900; text-transform: uppercase; color: #f97316; margin-bottom: 4px;">Nom</label>
                    <input type="text" name="name" placeholder="Votre Nom" required value="{{ old('name') }}"
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #edf2f7; outline: none; font-weight: 600; font-size: 13px;">
                    <x-input-error :messages="$errors->get('name')" style="color:red; font-size:10px;" />
                </div>
                <div>
                    <label style="display: block; font-size: 9px; font-weight: 900; text-transform: uppercase; color: #f97316; margin-bottom: 4px;">Prénom</label>
                    <input type="text" name="first_name" placeholder="Votre prénom" required value="{{ old('first_name') }}"
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #edf2f7; outline: none; font-weight: 600; font-size: 13px;">
                    <x-input-error :messages="$errors->get('first_name')" style="color:red; font-size:10px;" />
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                <div style="grid-column: span 1;">
                    <label style="display: block; font-size: 9px; font-weight: 900; text-transform: uppercase; color: #f97316; margin-bottom: 4px;">Email</label>
                    <input type="email" name="email" placeholder="email@exemple.com" required value="{{ old('email') }}"
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #edf2f7; outline: none; font-weight: 600; font-size: 13px;">
                </div>
                <div style="grid-column: span 1;">
                    <label style="display: block; font-size: 9px; font-weight: 900; text-transform: uppercase; color: #f97316; margin-bottom: 4px;">Téléphone</label>
                    <input type="text" name="phone" placeholder="+225..." required value="{{ old('phone') }}"
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #edf2f7; outline: none; font-weight: 600; font-size: 13px;">
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                <div>
                    <label style="display: block; font-size: 9px; font-weight: 900; text-transform: uppercase; color: #f97316; margin-bottom: 4px;">Mot de passe</label>
                    <input type="password" name="password" placeholder="••••••••" required
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #edf2f7; outline: none; font-weight: 600; font-size: 13px;">
                </div>
                <div>
                    <label style="display: block; font-size: 9px; font-weight: 900; text-transform: uppercase; color: #f97316; margin-bottom: 4px;">Confirmation</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••" required
                           style="width: 100%; padding: 10px; border-radius: 8px; border: 2px solid #edf2f7; outline: none; font-weight: 600; font-size: 13px;">
                </div>
            </div>

            <button type="submit" class="btn-register"
                    style="width: 100%; background: #1a202c; color: white; border: none; padding: 15px; border-radius: 12px; font-weight: 900; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: all 0.3s ease; font-size: 13px; border: 1px solid #2d3748;">
                Devenez Membre
            </button>

            <p style="text-align: center; margin-top: 1.2rem; font-size: 12px; color: #718096; font-weight: 700;">
                Déjà membre ?
                <a href="{{ route('login') }}" style="color: #f97316; text-decoration: none; font-weight: 900; margin-left: 5px;">Se connecter</a>
            </p>
        </form>
    </div>
</div>
</x-app-layout>
