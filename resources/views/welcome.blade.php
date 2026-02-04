<x-app-layout>
    <section class="relative h-[480px] w-full flex items-center justify-center">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1600" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/40"></div>
        </div>

        <div class="relative z-10 w-full max-w-5xl px-8">
            <h1 class="text-white text-4xl md:text-5xl font-black uppercase tracking-tight mb-12 leading-none">
                VIVEZ L'EXPÉRIENCE <br> LE MOUSSTOWN_HOTEL
            </h1>

            <div class="bg-white rounded shadow-2xl p-1 flex items-stretch">
                <div class="flex-1 px-5 py-3 border-r border-gray-100 group">
                    <label class="block text-[9px] font-black text-gray-400 uppercase mb-1 group-hover:text-[#f3ba2f] transition">Date d'arrivée</label>
                    <input type="text" placeholder="Choisir une date" class="w-full border-none p-0 text-xs font-bold focus:ring-0 placeholder-gray-300">
                </div>

                <div class="flex-1 px-5 py-3 border-r border-gray-100 group">
                    <label class="block text-[9px] font-black text-gray-400 uppercase mb-1 group-hover:text-[#f3ba2f] transition">Date de départ</label>
                    <input type="text" placeholder="Choisir une date" class="w-full border-none p-0 text-xs font-bold focus:ring-0 placeholder-gray-300">
                </div>

                <div class="flex-1 px-5 py-3 flex items-center justify-between group">
                    <div>
                        <label class="block text-[9px] font-black text-gray-400 uppercase mb-1 group-hover:text-[#f3ba2f] transition">Voyageurs</label>
                        <input type="text" placeholder="2 Voyageurs" class="w-full border-none p-0 text-xs font-bold focus:ring-0 placeholder-gray-300">
                    </div>
                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>

                <button class="bg-[#f3ba2f] text-[#1a2238] px-8 py-4 ml-1 rounded-sm font-black text-[10px] uppercase tracking-tighter hover:bg-[#1a2238] hover:text-white transition-all duration-300">
                    Vérifier la disponibilité
                </button>
            </div>
        </div>
    </section>
</x-app-layout>
