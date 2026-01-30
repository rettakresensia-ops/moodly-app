<x-app-layout>
    <div class="py-12 bg-[#EAF4F4] min-h-screen relative overflow-hidden">
        
        <div class="absolute -bottom-10 -right-10 opacity-20 text-[200px] rotate-12 select-none">
            🐻‍❄️
        </div>

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 relative">
            
            <a href="{{ route('dashboard') }}" class="inline-block mb-6 text-[#778E7E] font-bold hover:underline">
                ← Kembali ke Menu Utama
            </a>

            <div class="bg-white/70 backdrop-blur-xl border-4 border-white rounded-[40px] shadow-[0_20px_50px_rgba(0,0,0,0.1)] p-10">
                
                <div class="flex items-center gap-4 mb-8">
                    <span class="text-5xl">🐻‍❄️</span>
                    <div>
                        <h2 class="text-2xl font-black text-[#5F7A61]">Cerita ke Moo, yuk!</h2>
                        <p class="text-[#89A894]">Bagaimana perasaanmu detik ini?</p>
                    </div>
                </div>

                <form action="#" method="POST">
                    @csrf
                    
                    <div class="grid grid-cols-3 md:grid-cols-5 gap-4 mb-10">
                        @foreach([
                            ['emoji' => '🌟', 'label' => 'Hebat', 'val' => 'hebat', 'color' => '#FBF8CC'],
                            ['emoji' => '😊', 'label' => 'Senang', 'val' => 'senang', 'color' => '#B9FBC0'],
                            ['emoji' => '😐', 'label' => 'Biasa', 'val' => 'biasa', 'color' => '#CFFAFE'],
                            ['emoji' => '😔', 'label' => 'Sedih', 'val' => 'sedih', 'color' => '#F1C0E8'],
                            ['emoji' => '😫', 'label' => 'Stres', 'val' => 'stres', 'color' => '#FFCFD2']
                        ] as $mood)
                        <label class="group cursor-pointer">
                            <input type="radio" name="status" value="{{ $mood['val'] }}" class="hidden peer">
                            <div class="flex flex-col items-center p-4 rounded-3xl bg-white border-2 border-transparent shadow-[0_8px_0_0_#e2e8f0] peer-checked:shadow-none peer-checked:translate-y-2 peer-checked:border-white peer-checked:bg-[{{ $mood['color'] }}] transition-all duration-200">
                                <span class="text-4xl mb-2 group-hover:scale-110 transition">{{ $mood['emoji'] }}</span>
                                <span class="text-xs font-bold text-[#5F7A61]">{{ $mood['label'] }}</span>
                            </div>
                        </label>
                        @endforeach
                    </div>

                    <div class="mb-8">
                        <label class="block text-[#5F7A61] font-bold mb-2 ml-2">Ada cerita tambahan? (Opsional)</label>
                        <textarea name="note" rows="4" 
                            class="w-full border-4 border-white bg-white/50 rounded-[25px] focus:ring-[#B9FBC0] focus:border-[#B9FBC0] shadow-inner p-4 text-[#5F7A61] placeholder-[#A5C0B0]" 
                            placeholder="Tuliskan di sini... Moo akan mendengarkan."></textarea>
                    </div>

                    <button type="submit" class="w-full bg-[#B9FBC0] hover:bg-[#A8D1A8] text-[#4F6355] text-xl font-black py-5 rounded-[25px] shadow-[0_10px_0_0_#86efac] active:shadow-none active:translate-y-2 transition-all border-4 border-white">
                        Simpan ke Jurnal Moo 🌿
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>