<x-app-layout>
    <div class="py-12 bg-[#EAF4F4] min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-black text-[#5F7A61] tracking-tight">Riwayat Mood Kamu 📖</h2>
                <a href="{{ route('dashboard') }}" class="bg-white px-6 py-2 rounded-2xl font-bold text-[#778E7E] shadow-sm hover:shadow-md transition">
                    ← Kembali
                </a>
            </div>

            <div class="bg-white/70 backdrop-blur-xl border-4 border-white rounded-[40px] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.05)]">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-[#B9FBC0]/30 text-[#4F6355]">
                            <th class="px-8 py-5 font-black uppercase text-sm tracking-widest">Tanggal</th>
                            <th class="px-8 py-5 font-black uppercase text-sm tracking-widest text-center">Mood</th>
                            <th class="px-8 py-5 font-black uppercase text-sm tracking-widest">Catatan Moo</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y-2 divide-[#EAF4F4]">
                        @forelse($moods as $m)
                        <tr class="hover:bg-white/50 transition duration-200">
                            <td class="px-8 py-6 text-[#778E7E] font-bold">
                                {{ $m->created_at->translatedFormat('d F Y') }}
                                <div class="text-[10px] opacity-50">{{ $m->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-8 py-6 text-center text-5xl drop-shadow-sm">
                                {{ ['hebat'=>'🌟', 'senang'=>'😊', 'biasa'=>'😐', 'sedih'=>'😔', 'stres'=>'😫'][$m->status] }}
                            </td>
                            <td class="px-8 py-6">
                                <p class="text-[#5F7A61] leading-relaxed font-medium">
                                    {{ $m->note ?? 'Tidak ada catatan untuk hari ini.' }}
                                </p>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-8 py-20 text-center">
                                <div class="text-6xl mb-4">☁️</div>
                                <p class="text-[#89A894] font-bold text-xl">Belum ada riwayat. Yuk, mulai catat mood-mu!</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-8 text-center text-[#A5C0B0] font-medium italic">
                "Setiap perasaan itu valid, terima kasih sudah berani mencatatnya hari ini."
            </div>
        </div>
    </div>
</x-app-layout>