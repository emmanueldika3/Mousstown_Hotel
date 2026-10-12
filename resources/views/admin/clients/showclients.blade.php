<x-app-layout>
<x-admin>
    <div style="display: flex; min-height: 100vh; background-color: #f1f5f9; font-family: 'Inter', sans-serif;">
        <div style="flex: 1; padding: 40px; max-width: 1200px; margin: 0 auto;">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <div style="display: flex; align-items: center; gap: 20px;">
                    <a href="{{ route('admin.index') }}" style="display: flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: white; border-radius: 10px; color: #64748b; text-decoration: none; box-shadow: 0 2px 4px rgba(0,0,0,0.05); transition: 0.2s;" onmouseover="this.style.color='#1e293b'; this.style.transform='translateX(-3px)'" onmouseout="this.style.color='#64748b'; this.style.transform='translateX(0)'">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <h2 style="font-size: 1.8rem; font-weight: 800; color: #1e293b; margin: 0;">Gestion des Clients</h2>
                </div>

                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="background: white; padding: 10px 20px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); border: 1px solid rgba(255,255,255,0.8);">
                        <span style="font-weight: 700; color: #f97316;">{{ $clients->total() }}</span> 
                        <span style="color: #64748b; font-size: 0.9rem; margin-left: 5px;">Clients enregistrés</span>
                    </div>

                    <a href="#" style="background: #f97316; color: white; padding: 12px 24px; border-radius: 12px; font-weight: 700; text-decoration: none; display: flex; align-items: center; gap: 10px; box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.3); transition: all 0.3s ease;" 
                       onmouseover="this.style.background='#1e293b'; this.style.boxShadow='0 10px 15px -3px rgba(30, 41, 59, 0.3)'; this.style.transform='translateY(-2px)'" 
                       onmouseout="this.style.background='#f97316'; this.style.boxShadow='0 10px 15px -3px rgba(249, 115, 22, 0.3)'; this.style.transform='translateY(0)'">
                        <i class="fa-solid fa-plus"></i> Nouveau Client
                    </a>
                </div>
            </div>

            <div style="background: white; border-radius: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.05); overflow: hidden; border: 1px solid #e2e8f0;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8fafc; text-align: left; border-bottom: 2px solid #f1f5f9;">
                            <th style="padding: 20px; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 700;">Client</th>
                            <th style="padding: 20px; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 700;">Email</th>
                            <th style="padding: 20px; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 700;">Inscrit le</th>
                            <th style="padding: 20px; color: #64748b; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 700; text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                        <tr style="border-bottom: 1px solid #f1f5f9; transition: 0.2s;" onmouseover="this.style.background='#fcfcfc'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 15px 20px;">
                                <div style="display: flex; align-items: center; gap: 15px;">
                                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, #e2e8f0 0%, #cbd5e1 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-weight: 800; color: #475569; font-size: 0.9rem;">
                                        {{ strtoupper(substr($client->name, 0, 2)) }}
                                    </div>
                                    <div style="font-weight: 700; color: #1e293b;">{{ $client->name }}</div>
                                </div>
                            </td>
                            <td style="padding: 15px 20px; color: #64748b; font-size: 0.9rem;">{{ $client->email }}</td>
                            <td style="padding: 15px 20px; color: #64748b; font-size: 0.9rem;">
                                <i class="fa-regular fa-calendar" style="margin-right: 5px; font-size: 0.8rem;"></i>
                                {{ $client->created_at->format('d M Y') }}
                            </td>
                            <td style="padding: 15px 20px; text-align: center;">
                                <div style="display: flex; justify-content: center; gap: 8px;">
                                    <button title="Voir l'historique" style="background: #f1f5f9; border: none; color: #64748b; width: 32px; height: 32px; border-radius: 8px; cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='#e2e8f0'" onmouseout="this.style.background='#f1f5f9'">
                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                    </button>
                                    <button title="Modifier" style="background: #eff6ff; border: none; color: #3b82f6; width: 32px; height: 32px; border-radius: 8px; cursor: pointer; transition: 0.2s;" onmouseover="this.style.background='#dbeafe'" onmouseout="this.style.background='#eff6ff'">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div style="padding: 20px; border-top: 1px solid #f1f5f9; background: #f8fafc;">
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
    </x-admin>
</x-app-layout>