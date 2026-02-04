<x-app-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

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

                <h2 style="color: white; font-weight: 900; text-transform: uppercase; letter-spacing: 2px; margin: 0; font-size: 1.3rem;">Bon Retour</h2>
                <p style="color: #cbd5e0; font-size: 9px; margin-top: 5px; text-transform: uppercase; font-weight: 700; letter-spacing: 1px;">Accédez à votre espace privilège</p>
            </div>

            <form method="POST" action="{{ route('login') }}" style="padding: 2.5rem;">
                @csrf

                <div style="margin-bottom: 1.2rem;">
                    <label style="display: block; font-size: 9px; font-weight: 900; text-transform: uppercase; color: #f97316; margin-bottom: 6px;">Adresse Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="votre@email.com" required autofocus
                           style="width: 100%; padding: 12px; border-radius: 10px; border: 2px solid #edf2f7; outline: none; font-weight: 600; font-size: 14px; transition: 0.3s;"
                           onfocus="this.style.borderColor='#f97316'">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div style="margin-bottom: 1rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                        <label style="font-size: 9px; font-weight: 900; text-transform: uppercase; color: #f97316;">Mot de passe</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-size: 9px; color: #718096; text-decoration: none; font-weight: 700;">Oublié ?</a>
                        @endif
                    </div>
                    <input type="password" name="password" placeholder="••••••••" required autocomplete="current-password"
                           style="width: 100%; padding: 12px; border-radius: 10px; border: 2px solid #edf2f7; outline: none; font-weight: 600; font-size: 14px; transition: 0.3s;"
                           onfocus="this.style.borderColor='#f97316'">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 2rem;">
                    <input type="checkbox" id="remember_me" name="remember" style="accent-color: #f97316;">
                    <label for="remember_me" style="font-size: 12px; color: #718096; font-weight: 600; cursor: pointer;">Rester connecté</label>
                </div>

                <button type="submit" class="btn-login"
                        style="width: 100%; background: #1a202c; color: white; border: none; padding: 16px; border-radius: 12px; font-weight: 900; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: all 0.3s ease; font-size: 13px;">
                    Se connecter
                </button>

                <p style="text-align: center; margin-top: 1.5rem; font-size: 12px; color: #718096; font-weight: 700;">
                    Pas encore de compte ?
                    <a href="{{ route('register') }}" style="color: #f97316; text-decoration: none; font-weight: 900; margin-left: 5px;">Créer un compte</a>
                </p>
            </form>
        </div>
    </div>

    <style>
        .btn-login:hover {
            background: #f97316 !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(249, 115, 22, 0.4);
        }
    </style>
</x-app-layout>
