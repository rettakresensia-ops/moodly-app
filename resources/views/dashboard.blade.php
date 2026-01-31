<x-app-layout>
    <div class="py-12 bg-[#EAF4F4] min-h-screen flex items-center justify-center relative">
        
        <div class="absolute top-10 right-10 opacity-10 text-[150px] rotate-12 select-none">
            🐻‍❄️
        </div>

        <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
            <div class="mb-10 animate-bounce">
                <span class="text-8xl drop-shadow-lg">🐻‍❄️</span> 
                <div class="bg-white px-6 py-3 rounded-2xl inline-block shadow-xl border-4 border-[#B9FBC0] mt-6">
                    <p class="text-[#5F7A61] font-black text-lg">Halo! Saya Moo. Mau apa kita hari ini?</p>
                </div>
            </div>

            <h2 class="text-4xl font-black text-[#5F7A61] mb-12 tracking-tight">Pilih Menu Moodly</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                
                <a href="{{ route('mood.create') }}" class="group bg-white p-10 rounded-[40px] shadow-[0_15px_0_0_#B9FBC0] hover:shadow-none hover:translate-y-2 transition-all border-4 border-white">
                    <div class="text-7xl mb-6 group-hover:scale-110 transition duration-300">📝</div>
                    <span class="text-2xl font-black text-[#5F7A61] block mb-2">Catat Mood</span>
                    <p class="text-[#89A894] font-medium">Ceritakan perasaanmu ke Moo</p>
                </a>

                <a href="{{ route('mood.history') }}" class="group bg-white p-10 rounded-[40px] shadow-[0_15px_0_0_#9CF6FB] hover:shadow-none hover:translate-y-2 transition-all border-4 border-white">
                    <div class="text-7xl mb-6 group-hover:scale-110 transition duration-300">📅</div>
                    <span class="text-2xl font-black text-[#3b82f6] block mb-2">Riwayat Mood</span>
                    <p class="text-[#7dd3fc] font-medium">Lihat perjalanan emosimu</p>
                </a>

            </div>

            <p class="mt-16 text-[#A5C0B0] font-bold italic">"Kesehatan mentalmu adalah prioritas Moo."</p>
        </div>
    </div>
</x-app-layout>