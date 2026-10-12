<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'MOUSSTOWN Admin' }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Supprime les marges par défaut du navigateur */
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
        }
    </style>
</head>
<body style="margin: 0; padding: 0;">

<div style="display: flex; min-height: 100vh; background-color: #f1f5f9; font-family: 'Plus Jakarta Sans', sans-serif; margin: 0; padding: 0;">
    
    <div style="width: 280px; background: #1e293b; color: white; display: flex; flex-direction: column; position: sticky; top: 0; left: 0; height: 100vh; box-shadow: 4px 0 10px rgba(0,0,0,0.1); border-right: 3px solid #f97316;">
        <div style="padding: 30px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05);">
            <h2 style="font-weight: 900; letter-spacing: 2px; margin: 0; color: #f97316;">MOUSSTOWN</h2>
            <small style="opacity: 0.5; text-transform: uppercase; font-size: 0.65rem; letter-spacing: 1px;">Administration Panel</small>
        </div>

        <nav style="flex: 1; padding: 20px 15px;">
            <ul style="list-style: none; padding: 0; margin: 0;">
                <li style="margin-bottom: 8px;">
                    <a href="{{ route('admin.index') }}" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; border-radius: 12px; transition: 0.3s; {{ request()->routeIs('admin.index') ? 'background: rgba(249, 115, 22, 0.1); color: #f97316;' : 'color: #94a3b8;' }}" onmouseover="this.style.background='rgba(255,255,255,0.05)'; this.style.color='white'" onmouseout="{{ request()->routeIs('admin.index') ? '' : 'this.style.background=\'transparent\'; this.style.color=\'#94a3b8\'' }}">
                        <i class="fa-solid fa-chart-line" style="width: 25px;"></i> <span style="font-weight: 600;">Statistiques</span>
                    </a>
                </li>
                <li style="margin-bottom: 8px;">
                    <a href="{{ route('admin.rooms.inventory') }}" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; border-radius: 12px; transition: 0.3s; {{ request()->routeIs('admin.rooms.*') ? 'background: rgba(249, 115, 22, 0.1); color: #f97316;' : 'color: #94a3b8;' }}" onmouseover="this.style.background='rgba(255,255,255,0.05)'; this.style.color='white'" onmouseout="{{ request()->routeIs('admin.rooms.*') ? '' : 'this.style.background=\'transparent\'; this.style.color=\'#94a3b8\'' }}">
                        <i class="fa-solid fa-bed" style="width: 25px;"></i> <span style="font-weight: 600;">Chambres</span>
                    </a>
                </li>
                <li style="margin-bottom: 8px;">
                    <a href="{{ route('admin.clients.showclients') }}" style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; border-radius: 12px; transition: 0.3s; {{ request()->routeIs('admin.clients.*') ? 'background: rgba(249, 115, 22, 0.1); color: #f97316;' : 'color: #94a3b8;' }}" onmouseover="this.style.background='rgba(255,255,255,0.05)'; this.style.color='white'" onmouseout="{{ request()->routeIs('admin.clients.*') ? '' : 'this.style.background=\'transparent\'; this.style.color=\'#94a3b8\'' }}">
                        <i class="fa-solid fa-users" style="width: 25px;"></i> <span style="font-weight: 600;">Clients</span>
                    </a>
                </li>
                <li style="margin-bottom: 8px;">
                   <a href="{{ route('admin.reservations.showreservations') }}" 
   style="display: flex; align-items: center; padding: 12px 15px; text-decoration: none; border-radius: 12px; transition: 0.3s; {{ request()->routeIs('admin.reservations.*') ? 'background: rgba(249, 115, 22, 0.1); color: #f97316;' : 'color: #94a3b8;' }}" 
   onmouseover="this.style.background='rgba(255,255,255,0.05)'; this.style.color='white'" 
   onmouseout="{{ request()->routeIs('admin.reservations.*') ? '' : 'this.style.background=\'transparent\'; this.style.color=\'#94a3b8\'' }}">
    <i class="fa-solid fa-calendar-check" style="width: 25px;"></i> 
    <span style="font-weight: 600;">Réservations</span>
</a>
                </li>
                <li style="margin-bottom: 8px;">
                    <a href="#" style="display: flex; align-items: center; padding: 12px 15px; color: #94a3b8; text-decoration: none; border-radius: 12px; transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.05)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='#94a3b8'">
                        <i class="fa-solid fa-id-card" style="width: 25px;"></i> <span style="font-weight: 600;">Personnel</span>
                    </a>
                </li>
                <li style="margin-bottom: 8px;">
                    <a href="#" style="display: flex; align-items: center; padding: 12px 15px; color: #94a3b8; text-decoration: none; border-radius: 12px; transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.05)'; this.style.color='white'" onmouseout="this.style.background='transparent'; this.style.color='#94a3b8'">
                        <i class="fa-solid fa-bell-concierge" style="width: 25px;"></i> <span style="font-weight: 600;">Services</span>
                    </a>
                </li>
            </ul>
        </nav>

        <div style="padding: 20px; border-top: 1px solid rgba(255,255,255,0.05); background: rgba(0,0,0,0.2);">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style="width: 35px; height: 35px; background: #f97316; border-radius: 8px; display: flex; align-items: center; justify-content: center; font-weight: bold; color: white;">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div style="font-size: 0.85rem; font-weight: 700;">{{ Auth::user()->name }}</div>
                    <div style="font-size: 0.7rem; color: #94a3b8;">Administrateur</div>
                </div>
            </div>
        </div>
    </div>

    <div style="flex: 1; padding: 40px; overflow-y: auto;">
        @if(isset($header))
            <div style="margin-bottom: 40px;">
                {{ $header }}
            </div>
        @endif

        {{ $slot }}
    </div>

</div>

</body>
</html>