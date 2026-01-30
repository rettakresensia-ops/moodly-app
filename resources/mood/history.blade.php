<x-app-layout>
    <div class="py-12 bg-[#EAF4F4] min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <a href="{{ route('dashboard') }}" class="inline-block mb-6 text-[#778E7E] font-bold hover:underline">
                ← Kembali ke Menu Utama
            </a>

            <div class="mb-8 flex items-center gap-4">
                <span class="text-5xl">📅</span>
                <h2 class="text-3xl font-black text-[#5F7A61]">Jurnal Perjalananmu</h2>
            </div>

            <div class="bg-white/80 backdrop-blur-md border-4 border-white rounded-[35px] overflow-hidden shadow-[0_0_30px_rgba(185,251,192,0.5)]">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#B9FBC0]/50">
                        <tr>
                            <th class="px-6 py-4 text-[#4F6355] font-black uppercase text-sm">Tanggal</th>
                            <th class="px-6 py-4 text-[#4F6355] font-black uppercase text-sm text-center">Mood</th>
                            <th class="px-6 py-4 text-[#4F6355] font-black uppercase text-sm">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-[#EAF4F4]">
                        <tr class="hover:bg-white/50 transition">
                            <td class="px-6 py-5 text-[#778E7E] font-medium">30 Jan 2026</td>
                            <td class="px-6 py-5 text-center text-4xl">😊</td>
                            <td class="px-6 py-5 text-[#5F7A61]">Hari ini presentasi lancar, Moo!</td>
                        </tr>
                        <tr class="hover:bg-white/50 transition">
                            <td class="px-6 py-5 text-[#778E7E] font-medium">29 Jan 2026</td>
                            <td class="px-6 py-5 text-center text-4xl">😐</td>
                            <td class="px-6 py-5 text-[#5F7A61]">Biasa saja, butuh istirahat sejenak.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-8 bg-[#FDF0D5] p-6 rounded-[25px] border-l-8 border-[#B9FBC0] flex items-center gap-4">
                <span class="text-4xl">🐻‍❄️</span>
                <p class="text-[#778E7E] font-bold">"Wah, kamu sudah mencatat banyak hal! Terus jujur dengan perasaanmu ya!"</p>
            </div>
        </div>
    </div>
</x-app-layout>