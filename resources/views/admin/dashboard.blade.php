<x-app-layout>
    <div style="padding: 40px; background-color: #f4f7f6; min-height: 100vh;">
        <h1 style="margin-bottom: 30px; font-weight: 800; color: #1a2238;">Tableau de Bord</h1>

        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px;">
            <div style="background: white; padding: 25px; border-radius: 12px; border-left: 5px solid #4e73df; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                <small style="color: #4e73df; font-weight: bold; text-transform: uppercase;">Total Chambres</small>
                <div style="font-size: 32px; font-weight: bold;">{{ $totalRooms }}</div>
            </div>
            <div style="background: white; padding: 25px; border-radius: 12px; border-left: 5px solid #1cc88a; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                <small style="color: #1cc88a; font-weight: bold; text-transform: uppercase;">Disponibles</small>
                <div style="font-size: 32px; font-weight: bold;">{{ $availableRooms }}</div>
            </div>
            <div style="background: white; padding: 25px; border-radius: 12px; border-left: 5px solid #e74a3b; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                <small style="color: #e74a3b; font-weight: bold; text-transform: uppercase;">Occupées</small>
                <div style="font-size: 32px; font-weight: bold;">{{ $busyRooms }}</div>
            </div>
        </div>

        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
            <h3 style="margin-bottom: 20px; font-weight: 700;">Dernières activités</h3>
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="text-align: left; border-bottom: 2px solid #eee; color: #666;">
                        <th style="padding: 15px;">N° Chambre</th>
                        <th style="padding: 15px;">Type</th>
                        <th style="padding: 15px;">Prix</th>
                        <th style="padding: 15px;">Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentRooms as $room)
                    <tr style="border-bottom: 1px solid #f9f9f9;">
                        <td style="padding: 15px; font-weight: 600;">{{ $room->room_number }}</td>
                        <td style="padding: 15px;">{{ $room->type }}</td>
                        <td style="padding: 15px;">{{ number_format($room->price, 0, ',', ' ') }} FCFA</td>
                        <td style="padding: 15px;">
                            <span style="padding: 5px 10px; border-radius: 20px; font-size: 11px; font-weight: bold; text-transform: uppercase; background: {{ $room->status == 'disponible' ? '#d1e7dd' : '#f8d7da' }}; color: {{ $room->status == 'disponible' ? '#0f5132' : '#842029' }};">
                                {{ $room->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>