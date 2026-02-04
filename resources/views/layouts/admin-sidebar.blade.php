<aside style="width: 260px; background: #1a202c; color: white; position: fixed; height: 100vh; z-index: 100;">
    <div style="padding: 2rem; text-align: center; border-bottom: 1px solid #2d3748;">
        <img src="/images/logo_MH.png" style="width: 60px; border-radius: 50%; border: 2px solid #f97316;">
        <p style="font-weight: 800; margin-top: 10px; letter-spacing: 1px;">MOUSSTOWN ADMIN</p>
    </div>
    <nav style="padding: 20px;">
        <a href="{{ route('admin.index') }}" style="display: block; padding: 12px; {{ Request::is('admin/dashboard') ? 'background: #f97316; color: white;' : 'color: #a0aec0;' }} border-radius: 10px; text-decoration: none; margin-bottom: 10px; font-weight: 600;">📊 Vue d'ensemble</a>

        <a href="/admin/rooms" style="display: block; padding: 12px; {{ Request::is('admin/rooms*') ? 'background: #f97316; color: white;' : 'color: #a0aec0;' }} text-decoration: none; border-radius: 10px; transition: 0.3s; margin-bottom: 10px;" onmouseover="this.style.color='white'">🛏️ Gestion Chambres</a>

        <a href="#" style="display: block; padding: 12px; color: #a0aec0; text-decoration: none; margin-bottom: 10px;">📅 Réservations</a>

        <a href="#" style="display: block; padding: 12px; color: #a0aec0; text-decoration: none; margin-bottom: 10px;">👥 Clients</a>

        <div style="margin-top: 30px; border-top: 1px solid #2d3748; padding-top: 20px;">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style="background: none; border: none; color: #fc8181; font-weight: 700; cursor: pointer; padding: 12px;">🚪 Déconnexion</button>
            </form>
        </div>
    </nav>
</aside>
