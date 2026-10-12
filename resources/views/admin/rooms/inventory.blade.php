<x-app-layout>
<x-admin>
<div style="background: white; padding: 25px; border-radius: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px; border-bottom: 2px solid #f1f5f9; padding-bottom: 20px;">
        <div>
            <h3 style="margin: 0; font-weight: 800; font-size: 1.5rem; color: #1e293b;">Inventaire MOUSSTOWN</h3>
            <p style="margin: 5px 0 0 0; color: #64748b; font-size: 0.9rem;">Gestion des chambres par catégorie</p>
        </div>
        <button style="background: #f97316; color: white; border: none; padding: 12px 25px; border-radius: 10px; font-weight: 800; cursor: pointer; display: flex; align-items: center; gap: 10px;">
            <i class="fa-solid fa-plus"></i> Nouvelle Chambre
        </button>
    </div>

    {{-- On groupe les chambres par leur type --}}
    @foreach($rooms->groupBy('type') as $category => $categoryRooms)
        <div style="margin-bottom: 50px;">
            <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                <h4 style="margin: 0; text-transform: uppercase; letter-spacing: 1px; color: #f97316; font-weight: 900; font-size: 1rem;">
                    {{ $category }} 
                </h4>
                <div style="flex: 1; height: 1px; background: #e2e8f0;"></div>
                <span style="background: #1e293b; color: white; padding: 2px 10px; border-radius: 20px; font-size: 0.7rem;">
                    {{ $categoryRooms->count() }} chambres
                </span>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px;">
                @foreach($categoryRooms as $room)
                <div style="background: #ffffff; border: 1px solid #edf2f7; border-radius: 18px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.02); position: relative;">
                    
                    {{-- Badge Numéro de Chambre - Bien visible --}}
                    <div style="position: absolute; top: 15px; left: 15px; z-index: 10; background: rgba(30, 41, 59, 0.9); color: white; padding: 8px 12px; border-radius: 10px; font-weight: 800; backdrop-filter: blur(4px); border: 1px solid rgba(255,255,255,0.2);">
                        N° {{ $room->room_number }}
                    </div>

                    {{-- Image --}}
                    <div style="height: 180px; background: #f1f5f9;">
                        @if($room->image)
                            <img src="{{ $room->image }}" alt="Chambre {{ $room->room_number }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div style="height: 100%; display: flex; align-items: center; justify-content: center; color: #cbd5e0;">
                                <i class="fa-solid fa-bed fa-3x"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Détails --}}
                    <div style="padding: 20px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <div style="width: 10px; height: 10px; border-radius: 50%; background: {{ $room->status === 'disponible' ? '#22c55e' : '#ef4444' }};"></div>
                                <span style="font-size: 0.8rem; font-weight: 700; text-transform: uppercase; color: {{ $room->status === 'disponible' ? '#166534' : '#991b1b' }};">
                                    {{ $room->status }}
                                </span>
                            </div>
                            <span style="font-weight: 800; color: #1e293b; font-size: 1.1rem;">
                                {{ number_format($room->price, 0, ',', ' ') }} <small style="font-size: 0.6rem;">CFA</small>
                            </span>
                        </div>

                        <div style="display: flex; gap: 10px;">
                            <button style="flex: 2; padding: 10px; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; font-weight: 700; cursor: pointer; font-size: 0.85rem; color: #1e293b; transition: 0.2s;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f8fafc'">
                                <i class="fa-solid fa-pen-to-square"></i> Editer
                            </button>
                            <button style="flex: 1; padding: 10px; background: #fee2e2; border: none; border-radius: 10px; color: #991b1b; cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='#fecaca'" onmouseout="this.style.background='#fee2e2'">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
</x-admin>
</x-app-layout>