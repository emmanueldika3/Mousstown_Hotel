<x-app-layout>
    <div style="display: flex; min-height: 100vh; margin: -2rem; background: #f4f7fe;">

        <aside style="width: 280px; background: #1a202c; color: white; position: sticky; top: 0; height: 100vh; display: flex; flex-direction: column; box-shadow: 4px 0 15px rgba(0,0,0,0.1); z-index: 90;">

    <div style="padding: 2.5rem 1.5rem; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.05);">
        <div style="margin-bottom: 15px;">
            <img src="/images/logo_MH.png" alt="Mousstown Logo" style="width: 70px; height: 70px; border-radius: 50%; border: 3px solid #f97316; padding: 3px; background: white; margin: 0 auto; object-fit: cover; shadow: 0 4px 10px rgba(0,0,0,0.3);">
        </div>
        <h1 style="font-size: 0.85rem; font-weight: 800; letter-spacing: 2px; color: white; text-transform: uppercase; margin: 0;">MOUSSTOWN <span style="color: #f97316;">HOTEL</span></h1>
    </div>

    <nav style="flex: 1; padding: 1.5rem 1rem;">
        <ul style="list-style: none; padding: 0; margin: 0;">

            <li style="margin-bottom: 0.8rem;">
                <a href="{{ route('admin.index') }}" class="nav-btn active">
                    <span class="icon">📊</span>
                    <span class="text">Vue d'ensemble</span>
                </a>
            </li>

            <li style="margin-bottom: 0.8rem;">
                <a href="/admin/rooms" class="nav-btn">
                    <span class="icon">🛏️</span>
                    <span class="text">Gestion Chambres</span>
                </a>
            </li>

            <li style="margin-bottom: 0.8rem;">
                <a href="#" class="nav-btn">
                    <span class="icon">📅</span>
                    <span class="text">Réservations</span>
                </a>
            </li>

            <li style="margin-bottom: 0.8rem;">
                <a href="#" class="nav-btn">
                    <span class="icon">👥</span>
                    <span class="text">Clients & CRM</span>
                </a>
            </li>

            <li style="margin-bottom: 0.8rem;">
                <a href="#" class="nav-btn">
                    <span class="icon">💰</span>
                    <span class="text">Comptabilité</span>
                </a>
            </li>
        </ul>
    </nav>

    <div style="padding: 1.5rem; border-top: 1px solid rgba(255,255,255,0.05);">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <span>🚪</span> Déconnexion
            </button>
        </form>
    </div>
</aside>

        <main style="flex: 1; padding: 2.5rem;">

            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2.5rem;">
                <div>
                    <h2 style="font-size: 1.7rem; font-weight: 800; color: #1a202c; margin: 0;">Tableau de Bord</h2>
                    <p style="color: #718096; font-weight: 500;">Voici l'état actuel de Mousstown Hotel</p>
                </div>
                <div style="display: flex; align-items: center; gap: 15px; background: white; padding: 8px 20px; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.03);">
                    <div style="text-align: right;">
                        <p style="margin: 0; font-weight: 800; font-size: 0.9rem;">{{ Auth::user()->name }}</p>
                        <span style="font-size: 0.7rem; background: #fef3c7; color: #d97706; padding: 2px 8px; border-radius: 5px; font-weight: 700;">ADMIN</span>
                    </div>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 3rem;">
                <div style="background: white; padding: 1.5rem; border-radius: 24px; border-bottom: 4px solid #f97316;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <span style="background: #fff7ed; padding: 10px; border-radius: 12px;">💰</span>
                        <span style="color: #48bb78; font-size: 0.8rem; font-weight: 700;">+12.5%</span>
                    </div>
                    <p style="color: #718096; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Revenus (Mois)</p>
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: #1a202c; margin: 0;">{{ number_format($stats['revenue'], 0, ',', '.') }} <small style="font-size: 10px;">CFA</small></h3>
                </div>

                <div style="background: white; padding: 1.5rem; border-radius: 24px; border-bottom: 4px solid #48bb78;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <span style="background: #f0fdf4; padding: 10px; border-radius: 12px;">🛏️</span>
                    </div>
                    <p style="color: #718096; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Chambres Libres</p>
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: #1a202c; margin: 0;">{{ $stats['rooms_available'] }} <small style="font-size: 12px; color: #cbd5e0;">/ {{ $stats['total_rooms'] }}</small></h3>
                </div>

                <div style="background: white; padding: 1.5rem; border-radius: 24px; border-bottom: 4px solid #3b82f6;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <span style="background: #eff6ff; padding: 10px; border-radius: 12px;">📅</span>
                    </div>
                    <p style="color: #718096; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Réservations</p>
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: #1a202c; margin: 0;">{{ $stats['bookings_count'] }}</h3>
                </div>

                <div style="background: white; padding: 1.5rem; border-radius: 24px; border-bottom: 4px solid #8b5cf6;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <span style="background: #f5f3ff; padding: 10px; border-radius: 12px;">📈</span>
                    </div>
                    <p style="color: #718096; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Occupation</p>
                    <h3 style="font-size: 1.5rem; font-weight: 800; color: #1a202c; margin: 0;">85%</h3>
                </div>
            </div>

            <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem;">

                <div style="background: white; border-radius: 24px; padding: 2rem; box-shadow: 0 4px 20px rgba(0,0,0,0.02);">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
                        <h3 style="font-weight: 800; color: #1a202c;">Activités Récentes</h3>
                        <button style="font-size: 0.8rem; color: #3b82f6; background: none; border: none; font-weight: 700; cursor: pointer;">Voir tout l'historique</button>
                    </div>
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead style="text-align: left; color: #a0aec0; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px;">
                            <tr>
                                <th style="padding-bottom: 1rem;">Client</th>
                                <th style="padding-bottom: 1rem;">Chambre</th>
                                <th style="padding-bottom: 1rem;">Statut</th>
                                <th style="padding-bottom: 1rem; text-align: right;">Montant</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 0.9rem; font-weight: 600;">
                            @foreach($recentBookings as $booking)
                            <tr style="border-top: 1px solid #f7fafc;">
                                <td style="padding: 1.2rem 0;">{{ $booking['client'] }}</td>
                                <td style="padding: 1.2rem 0; color: #718096;">{{ $booking['room'] }}</td>
                                <td style="padding: 1.2rem 0;">
                                    <span style="padding: 4px 10px; background: #dcfce7; color: #15803d; border-radius: 20px; font-size: 0.7rem;">{{ $booking['status'] }}</span>
                                </td>
                                <td style="padding: 1.2rem 0; text-align: right; color: #1a202c;">{{ $booking['price'] }} CFA</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div style="background: #1a202c; color: white; padding: 1.5rem; border-radius: 24px;">
                        <h4 style="margin: 0 0 1rem 0; font-size: 1rem;">Raccourcis</h4>
                        <div style="display: grid; gap: 10px;">
                            <button style="width: 100%; padding: 12px; background: #f97316; border: none; border-radius: 12px; color: white; font-weight: 700; cursor: pointer;">+ Ajouter une chambre</button>
                            <button style="width: 100%; padding: 12px; background: #374151; border: none; border-radius: 12px; color: white; font-weight: 700; cursor: pointer;">+ Nouvelle Réservation</button>
                        </div>
                    </div>

                    <div style="background: white; padding: 1.5rem; border-radius: 24px; box-shadow: 0 4px 20px rgba(0,0,0,0.02);">
                        <h4 style="margin: 0 0 0.5rem 0; font-size: 0.9rem; color: #1a202c;">Tâche du jour</h4>
                        <p style="font-size: 0.8rem; color: #718096;">8 Check-ins attendus aujourd'hui.</p>
                        <div style="height: 6px; background: #edf2f7; border-radius: 10px; margin-top: 10px;">
                            <div style="width: 40%; height: 100%; background: #3b82f6; border-radius: 10px;"></div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <style>
        .nav-item:hover { background: rgba(255,255,255,0.05); color: white !important; }
        .max-w-7xl { max-width: none !important; }
        .py-12 { padding-top: 0 !important; }

        /* Style de base des boutons de navigation */
    .nav-btn {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 14px 18px;
        color: #a0aec0;
        text-decoration: none;
        border-radius: 15px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid transparent;
    }

    /* Effet au survol (Hover) */
    .nav-btn:hover {
        background: rgba(249, 115, 22, 0.1);
        color: #f97316;
        transform: translateX(8px); /* Petit décalage vers la droite */
        border-color: rgba(249, 115, 22, 0.2);
    }

    /* Style du bouton actif (Page actuelle) */
    .nav-btn.active {
        background: #f97316;
        color: white !important;
        box-shadow: 0 10px 20px rgba(249, 115, 22, 0.3);
    }

    /* Style des icônes */
    .nav-btn .icon {
        font-size: 1.2rem;
        transition: transform 0.3s;
    }

    .nav-btn:hover .icon {
        transform: scale(1.2) rotate(-10deg); /* L'icône grossit et tourne un peu */
    }

    /* Style du bouton déconnexion */
    .logout-btn {
        width: 100%;
        padding: 12px;
        background: rgba(252, 129, 129, 0.05);
        color: #fc8181;
        border: 1px solid rgba(252, 129, 129, 0.2);
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: center;
        transition: all 0.3s;
    }

    .logout-btn:hover {
        background: #fc8181;
        color: white;
        box-shadow: 0 4px 12px rgba(252, 129, 129, 0.2);
    }

    /* Annulation des contraintes du layout Laravel */
    .max-w-7xl { max-width: none !important; }
    .py-12 { padding: 0 !important; }
    </style>
</x-app-layout>
