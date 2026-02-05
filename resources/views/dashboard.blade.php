<x-app-layout>
    <div class="py-12 bg-[#f0fdf4] min-h-screen font-sans" x-data="{ menu: 'home' }">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <div class="text-center mb-16 animate-fadeIn" x-show="menu === 'home'">
                <div class="relative inline-block">
                    <div class="text-9xl drop-shadow-2xl animate-bounce">🐻</div>
                    <div class="absolute top-4 -right-4 bg-yellow-400 text-white font-black px-4 py-1 rounded-full shadow-lg border-4 border-white rotate-12">
                        Moo!
                    </div>
                </div>
                <h1 class="text-5xl font-black text-gray-800 mt-6 tracking-tight">Hai, {{ Auth::user()->name }}!</h1>
                <p class="text-green-600 font-extrabold text-xl mt-2 italic">"Apa yang ingin kamu lakukan hari ini?"</p>
            </div>

            <div x-show="menu === 'home'" class="grid grid-cols-1 md:grid-cols-3 gap-10 animate-slideUp">
                <button @click="menu = 'write'" class="relative group bg-white p-10 rounded-[3rem] border-4 border-orange-100 shadow-[0_20px_50px_rgba(251,146,60,0.15)] hover:shadow-[0_30px_60px_rgba(251,146,60,0.3)] transition-all transform hover:-translate-y-6">
                    <div class="text-6xl mb-4 group-hover:scale-125 transition-transform">✍️</div>
                    <h3 class="text-2xl font-black text-orange-600">Tulis Jurnal</h3>
                    <p class="text-gray-500 font-bold mt-2">Ceritakan harimu</p>
                    <div class="absolute -bottom-4 -right-4 text-5xl opacity-30 rotate-12">🐻</div>
                </button>

                <button @click="menu = 'write'" class="relative group bg-white p-10 rounded-[3rem] border-4 border-green-100 shadow-[0_20px_50px_rgba(34,197,94,0.15)] hover:shadow-[0_30px_60px_rgba(34,197,94,0.3)] transition-all transform hover:-translate-y-6">
                    <div class="text-6xl mb-4 group-hover:scale-125 transition-transform">✨</div>
                    <h3 class="text-2xl font-black text-green-600">Pilih Emoji</h3>
                    <p class="text-gray-500 font-bold mt-2">Mood instan</p>
                    <div class="absolute -bottom-4 -right-4 text-5xl opacity-30 -rotate-12">🐻</div>
                </button>

                <button @click="menu = 'history'" class="relative group bg-white p-10 rounded-[3rem] border-4 border-blue-100 shadow-[0_20px_50px_rgba(59,130,246,0.15)] hover:shadow-[0_30px_60px_rgba(59,130,246,0.3)] transition-all transform hover:-translate-y-6">
                    <div class="text-6xl mb-4 group-hover:scale-125 transition-transform">📅</div>
                    <h3 class="text-2xl font-black text-blue-600">Riwayat</h3>
                    <p class="text-gray-500 font-bold mt-2">Lihat jurnal lama</p>
                    <div class="absolute -bottom-4 -right-4 text-5xl opacity-30 rotate-6">🐻</div>
                </button>
            </div>

            <div x-show="menu === 'write'" class="animate-fadeIn" x-cloak>
                <div class="bg-white p-10 rounded-[3rem] shadow-2xl border-4 border-green-100 relative">
                    <button @click="menu = 'home'" class="absolute top-6 left-8 text-green-500 font-black text-lg hover:scale-110 transition-transform">← KEMBALI</button>
                    
                    <form action="{{ route('moods.store') }}" method="POST" class="mt-8">
                        @csrf
                        <div class="text-center mb-10">
                            <h2 class="text-4xl font-black text-gray-800">Bagaimana perasaanmu? 🐻</h2>
                        </div>
                        
                        <div class="flex justify-around mb-12 p-8 bg-green-50 rounded-[2.5rem] shadow-inner border-2 border-green-100">
                            @foreach(['😊', '😢', '😡', '😴', '✨'] as $emoji)
                            <label class="cursor-pointer group">
                                <input type="radio" name="emoji" value="{{ $emoji }}" class="hidden peer" required>
                                <span class="text-7xl block transform transition duration-300 group-hover:scale-125 peer-checked:scale-150 peer-checked:drop-shadow-[0_0_20px_rgba(34,197,94,0.6)]">
                                    {{ $emoji }}
                                </span>
                            </label>
                            @endforeach
                        </div>

                        <textarea name="note" rows="4" class="w-full border-4 border-green-50 rounded-[2rem] p-6 focus:ring-8 focus:ring-green-100 focus:border-green-300 transition-all text-xl font-medium shadow-sm" placeholder="Ceritakan sedikit tentang hari ini..." required></textarea>
                        
                        <button type="submit" class="w-full mt-8 bg-green-500 hover:bg-green-600 text-white font-black text-3xl py-6 rounded-[2rem] shadow-[0_12px_0_rgb(21,128,61)] active:shadow-none active:translate-y-3 transition-all">
                            SIMPAN JURNAL ✨
                        </button>
                    </form>
                </div>
            </div>

            <div x-show="menu === 'history'" class="animate-fadeIn" x-cloak>
                <div class="bg-white p-10 rounded-[3rem] shadow-2xl border-4 border-blue-100 relative">
                    <button @click="menu = 'home'" class="absolute top-6 left-8 text-blue-500 font-black text-lg hover:scale-110 transition-transform">← KEMBALI</button>
                    
                    <h2 class="text-4xl font-black text-gray-800 text-center mt-8 mb-12">Riwayat Perasaanmu 📅</h2>
                    
                    <div class="grid gap-6">
                        @forelse($moods as $mood)
                        <div class="flex items-center p-8 bg-blue-50 rounded-[2rem] border-2 border-blue-100 hover:bg-white transition-all shadow-sm group">
                            <span class="text-7xl mr-8 group-hover:rotate-12 transition-transform">{{ $mood->emoji }}</span>
                            <div>
                                <p class="text-2xl text-gray-800 font-black">{{ $mood->note }}</p>
                                <p class="text-blue-500 font-bold uppercase tracking-wider text-sm mt-1">{{ $mood->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-20 text-gray-400 italic">Belum ada catatan hari ini.</div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        [x-cloak] { display: none !important; }
        .animate-fadeIn { animation: fadeIn 0.5s ease-out; }
        .animate-slideUp { animation: slideUp 0.7s cubic-bezier(0.175, 0.885, 0.32, 1.275); }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideUp { from { opacity: 0; transform: translateY(40px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</x-app-layout>