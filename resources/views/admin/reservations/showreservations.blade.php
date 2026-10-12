<x-app-layout>
<x-admin>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap');
    body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f8fafc; }
    .reservation-row { transition: all 0.2s ease; }
    .reservation-row:hover { background: #f8faff !important; transform: scale(1.001); }

    @media print {
        .no-print, .sidebar, .nav-admin, button, .btn-orange, .action-btns { display: none !important; }
        .main-content { margin: 0 !important; padding: 0 !important; }
        .card-container { box-shadow: none !important; border: none !important; padding: 0 !important; }
        table { width: 100% !important; border: 1px solid #eee !important; font-size: 10pt; }
        th, td { padding: 10px !important; }
        img { width: 50px !important; height: 35px !important; }
    }

    @keyframes slideIn {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
</style>

@if(session('success'))
<div id="flash-message" style="position: fixed; top: 20px; right: 20px; background: #16a34a; color: white; padding: 15px 25px; border-radius: 12px; box-shadow: 0 10px 20px rgba(22, 163, 74, 0.2); z-index: 10000; display: flex; align-items: center; gap: 10px; animation: slideIn 0.5s ease-out;">
    <i class="fa-solid fa-circle-check"></i>
    <span style="font-weight: 700;">{{ session('success') }}</span>
</div>
<script>setTimeout(() => { document.getElementById('flash-message').style.display = 'none'; }, 4000);</script>
@endif

<div class="card-container" style="background: #ffffff; padding: 40px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); border: 1px solid #f1f5f9;">
    
    <div class="no-print" style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 35px;">
        <div>
            <nav style="margin-bottom: 10px;">
                <span style="color: #ff8c00; font-weight: 800; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1.5px;">Dashboard Immobilier</span>
            </nav>
            <h2 style="margin: 0; font-weight: 900; color: #1a2238; font-size: 2.4rem; letter-spacing: -1px;">Journal des Réservations</h2>
            <p style="margin: 8px 0 0 0; color: #64748b; font-size: 1rem;">Contrôle centralisé des occupants • <span style="color: #1a2238; font-weight: 700;">MOUSSTOWN</span></p>
        </div>

        <a href="{{ route('admin.reservations.create') }}" class="btn-orange"
           style="background: #ff8c00; color: white; padding: 16px 32px; border-radius: 16px; font-weight: 800; text-decoration: none; display: flex; align-items: center; gap: 12px; transition: 0.4s; box-shadow: 0 8px 25px rgba(255, 140, 0, 0.3);"
           onmouseover="this.style.background='#1a2238'; this.style.transform='translateY(-4px)';"
           onmouseout="this.style.background='#ff8c00'; this.style.transform='translateY(0)';"
        >
            <i class="fa-solid fa-plus-circle" style="font-size: 1.2rem;"></i>
            <span>CRÉER UNE RÉSERVATION</span>
        </a>
    </div>

    <div class="no-print" style="margin-bottom: 35px; display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
        <div style="position: relative; flex: 1; min-width: 350px;">
            <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 20px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
            <input type="text" id="reservationSearch" placeholder="Rechercher un nom, un téléphone ou un N° de chambre..." 
                   style="width: 100%; padding: 18px 20px 18px 55px; border-radius: 18px; border: 2px solid #f1f5f9; outline: none; transition: 0.3s; font-size: 0.95rem; color: #1a2238;"
                   onfocus="this.style.borderColor='#ff8c00'; this.style.boxShadow='0 0 0 5px rgba(255,140,0,0.08)';"
                   onblur="this.style.borderColor='#f1f5f9';">
        </div>

        <div style="display: flex; gap: 12px;">
            <button onclick="window.print()" style="background: #ffffff; color: #ef4444; border: 2.5px solid #fee2e2; padding: 12px 22px; border-radius: 15px; cursor: pointer; font-weight: 800; display: flex; align-items: center; gap: 10px; transition: 0.3s;">
                <i class="fa-solid fa-file-pdf"></i> PDF
            </button>
            <button onclick="exportToExcel()" style="background: #ffffff; color: #16a34a; border: 2.5px solid #dcfce7; padding: 12px 22px; border-radius: 15px; cursor: pointer; font-weight: 800; display: flex; align-items: center; gap: 10px; transition: 0.3s;">
                <i class="fa-solid fa-file-excel"></i> EXCEL
            </button>
        </div>

        <div style="background: #1a2238; padding: 16px 24px; border-radius: 16px; display: flex; align-items: center; gap: 15px; margin-left: auto;">
            <span style="color: #94a3b8; font-size: 0.8rem; font-weight: 700; text-transform: uppercase;">Total Trouvé :</span>
            <span style="color: #ffffff; font-weight: 900; font-size: 1.2rem;" id="resCount">{{ $reservations->count() }}</span>
        </div>
    </div>

    <div style="overflow-x: auto; border-radius: 20px; border: 1px solid #f1f5f9;">
        <table id="resTable" style="width: 100%; border-collapse: separate; border-spacing: 0; text-align: left;">
            <thead>
                <tr style="background: #fcfcfd;">
                    <th style="padding: 22px; color: #1a2238; font-weight: 800; font-size: 0.85rem; text-transform: uppercase; border-bottom: 2px solid #f1f5f9;">Chambre</th>
                    <th style="padding: 22px; color: #1a2238; font-weight: 800; font-size: 0.85rem; text-transform: uppercase; border-bottom: 2px solid #f1f5f9;">Client</th>
                    <th style="padding: 22px; color: #1a2238; font-weight: 800; font-size: 0.85rem; text-transform: uppercase; border-bottom: 2px solid #f1f5f9;">Séjour</th>
                    <th style="padding: 22px; color: #1a2238; font-weight: 800; font-size: 0.85rem; text-transform: uppercase; border-bottom: 2px solid #f1f5f9;">Statut</th>
                    <th class="no-print" style="padding: 22px; color: #1a2238; font-weight: 800; font-size: 0.85rem; text-transform: uppercase; border-bottom: 2px solid #f1f5f9; text-align: center;">Gestion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $res)
                <tr class="reservation-row">
                    <td style="padding: 20px; border-bottom: 1px solid #f1f5f9;">
                        <div style="display: flex; align-items: center; gap: 18px;">
                            @if($res->room && $res->room->image)
                                <img src="{{ asset('storage/' . $res->room->image) }}" style="width: 80px; height: 55px; border-radius: 14px; object-fit: cover; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                            @else
                                <div style="width: 80px; height: 55px; background: #f1f5f9; border-radius: 14px; display: flex; align-items: center; justify-content: center; color: #cbd5e1;"><i class="fa-solid fa-image"></i></div>
                            @endif
                            <div>
                                <span class="room-num" style="display: block; font-weight: 900; color: #1a2238; font-size: 1.05rem;">
                                    N° {{ $res->room?->room_number ?? '---' }}
                                </span>
                                <span style="color: #ff8c00; font-size: 0.75rem; font-weight: 800; text-transform: uppercase;">
                                    {{ $res->room?->room_type ?? 'Inconnue' }}
                                </span>
                            </div>
                        </div>
                    </td>

                    <td style="padding: 20px; border-bottom: 1px solid #f1f5f9;">
                        <div style="display: flex; flex-direction: column;">
                            <span class="client-name" style="font-weight: 700; color: #1a2238; font-size: 1rem;">
                                {{ $res->user?->name ?? $res->customer_name ?? 'Client Anonyme' }}
                            </span>
                            <div style="display: flex; align-items: center; gap: 8px; margin-top: 4px;">
                                <span style="color: #64748b; font-size: 0.85rem;">
                                    <i class="fa-solid fa-phone" style="font-size: 0.75rem; color: #cbd5e1;"></i> 
                                    {{ $res->user?->phone ?? $res->customer_phone ?? 'N/A' }}
                                </span>
                                @if($res->user)
                                    <span style="font-size: 0.65rem; background: #e0e7ff; color: #4338ca; padding: 2px 6px; border-radius: 4px; font-weight: 800;">MEMBRE</span>
                                @endif
                            </div>
                        </div>
                    </td>

                    <td style="padding: 20px; border-bottom: 1px solid #f1f5f9;">
                        <div style="background: #f1f5f9; padding: 10px 15px; border-radius: 12px; display: inline-block;">
                            <div style="font-size: 0.85rem; font-weight: 800; color: #1a2238;">
                                <span style="color: #22c55e;">{{ \Carbon\Carbon::parse($res->check_in)->format('d M') }}</span>
                                <i class="fa-solid fa-arrow-right-long" style="margin: 0 10px; color: #94a3b8;"></i>
                                <span style="color: #ef4444;">{{ \Carbon\Carbon::parse($res->check_out)->format('d M') }}</span>
                            </div>
                        </div>
                    </td>

                    <td style="padding: 20px; border-bottom: 1px solid #f1f5f9;">
                        @php
                            $st = [
                                'confirmée' => ['bg' => '#dcfce7', 'text' => '#15803d', 'icon' => 'fa-circle-check'],
                                'en attente' => ['bg' => '#fef9c3', 'text' => '#a16207', 'icon' => 'fa-clock'],
                                'annulée' => ['bg' => '#fee2e2', 'text' => '#b91c1c', 'icon' => 'fa-circle-xmark'],
                            ][$res->status] ?? ['bg' => '#f1f5f9', 'text' => '#475569', 'icon' => 'fa-circle'];
                        @endphp
                        <span style="background: {{ $st['bg'] }}; color: {{ $st['text'] }}; padding: 8px 16px; border-radius: 10px; font-size: 0.75rem; font-weight: 800; text-transform: uppercase; display: inline-flex; align-items: center; gap: 8px;">
                            <i class="fa-solid {{ $st['icon'] }}"></i> {{ $res->status }}
                        </span>
                    </td>

                    <td class="no-print" style="padding: 20px; border-bottom: 1px solid #f1f5f9; text-align: center;">
                        <div style="display: flex; justify-content: center; gap: 12px;">
                            <button onclick="confirmDelete({{ $res->id }}, '{{ addslashes($res->user?->name ?? $res->customer_name ?? 'cette réservation') }}')" 
                                    style="background: #fee2e2; color: #ef4444; border: none; width: 42px; height: 42px; border-radius: 14px; cursor: pointer; transition: 0.3s;">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            <form id="delete-form-{{ $res->id }}" action="{{ route('admin.reservations.destroy', $res->id) }}" method="POST" style="display: none;">
                                @csrf @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="deleteModal" style="display: none; position: fixed; inset: 0; background: rgba(26, 34, 56, 0.8); backdrop-filter: blur(8px); z-index: 9999; align-items: center; justify-content: center;">
    <div style="background: white; padding: 40px; border-radius: 30px; width: 100%; max-width: 450px; text-align: center; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">
        <div style="background: #fee2e2; width: 80px; height: 80px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px;">
            <i class="fa-solid fa-triangle-exclamation" style="font-size: 2.5rem; color: #ef4444;"></i>
        </div>
        <h3 style="color: #1a2238; font-weight: 900; font-size: 1.6rem; margin-bottom: 15px;">Supprimer ?</h3>
        <p style="color: #64748b; margin-bottom: 35px; line-height: 1.6; font-size: 1.1rem;">Confirmez-vous la suppression définitive du dossier de <strong id="modalCustomerName" style="color: #1a2238;"></strong> ?</p>
        <div style="display: flex; gap: 15px;">
            <button onclick="closeModal()" style="flex: 1; padding: 18px; border-radius: 15px; border: 2px solid #f1f5f9; background: white; color: #64748b; font-weight: 800; cursor: pointer;">ANNULER</button>
            <button id="confirmBtn" style="flex: 1; padding: 18px; border-radius: 15px; border: none; background: #ef4444; color: white; font-weight: 800; cursor: pointer;">CONFIRMER</button>
        </div>
    </div>
</div>

<script>
    // Script de recherche et suppression identiques à ton code...
    document.getElementById('reservationSearch').addEventListener('keyup', function() {
        let val = this.value.toLowerCase();
        let rows = document.querySelectorAll('.reservation-row');
        let total = 0;
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            if(text.includes(val)) { row.style.display = ""; total++; }
            else { row.style.display = "none"; }
        });
        document.getElementById('resCount').textContent = total;
    });

    let currentId = null;
    function confirmDelete(id, name) {
        currentId = id;
        document.getElementById('modalCustomerName').innerText = name;
        document.getElementById('deleteModal').style.display = 'flex';
    }
    function closeModal() { document.getElementById('deleteModal').style.display = 'none'; }
    document.getElementById('confirmBtn').addEventListener('click', () => {
        if(currentId) document.getElementById('delete-form-'+currentId).submit();
    });
</script>
</x-admin>
</x-app-layout>