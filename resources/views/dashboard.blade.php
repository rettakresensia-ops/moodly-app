<x-app-layout>
    <div class="py-12 bg-[#f0fdf4] min-h-screen font-sans" 
         x-data="{ 
            menu: 'home', 
            currentQuote: '',
            quotes: [
                'Hargai dirimu sendiri sebelum menghargai orang lain.',
                'Satu-satunya cara untuk melakukan pekerjaan besar adalah dengan mencintai apa yang kamu lakukan.',
                'Jangan berhenti saat kamu lelah. Berhentilah saat kamu selesai.',
                'Kegagalan adalah batu loncatan menuju kesuksesan.',
                'Hari ini adalah kesempatan untuk membangun hari esok yang kamu inginkan.',
                'Percayalah pada dirimu sendiri dan semua yang kamu miliki.',
                'Masa depanmu ditentukan oleh apa yang kamu lakukan hari ini, bukan besok.',
                'Kesuksesan tidak datang kepadamu, kamu yang harus menjemputnya.',
                'Jangan biarkan hari kemarin menyita terlalu banyak waktu hari ini.',
                'Kebahagiaan bukan sesuatu yang sudah jadi. Itu berasal dari tindakanmu sendiri.',
                'Lakukan sekarang. Terkadang nanti menjadi tidak pernah.',
                'Sedikit kemajuan setiap hari menghasilkan hasil yang besar.',
                'Fokuslah pada tujuan, bukan pada rintangan.',
                'Jadilah versi terbaik dari dirimu sendiri.',
                'Mimpi tidak akan berhasil kecuali kamu melakukannya.',
                'Kesulitan sering kali mempersiapkan orang biasa untuk nasib yang luar biasa.',
                'Semangat adalah kunci untuk membuka pintu keberhasilan.',
                'Jangan pernah menyerah pada mimpi hanya karena waktu yang dibutuhkan untuk mencapainya.',
                'Keyakinan adalah kunci yang membuka pintu kekuatan.',
                'Hanya aku yang bisa mengubah hidupku. Tidak ada orang lain yang bisa melakukannya untukku.',
                'Optimisme adalah kepercayaan yang mengarah pada pencapaian.',
                'Disiplin adalah jembatan antara tujuan dan pencapaian.',
                'Cara terbaik untuk memprediksi masa depan adalah dengan menciptakannya.',
                'Kamu lebih kuat dari yang kamu pikirkan.',
                'Setiap hari adalah awal yang baru. Ambil napas dalam-dalam dan mulai lagi.',
                'Jangan membandingkan hidupmu dengan orang lain. Tidak ada perbandingan antara matahari dan bulan.',
                'Satu tindakan kecil lebih baik daripada seribu niat besar.',
                'Jadilah perubahan yang ingin kamu lihat di dunia.',
                'Kesehatan mental adalah prioritas. Jangan abaikan dirimu sendiri.',
                'Ingatlah seberapa jauh kamu telah melangkah, bukan hanya seberapa jauh kamu harus pergi.'
            ],
            getRandomQuote() {
                this.currentQuote = this.quotes[Math.floor(Math.random() * this.quotes.length)];
            }
         }">
        
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            
            <div class="text-center mb-16 animate-fadeIn" x-show="menu === 'home'">
                <div class="relative inline-block">
                    <div class="text-9xl drop-shadow-2xl animate-bounce">🐻</div>
                    <div class="absolute top-4 -right-4 bg-yellow-400 text-white font-black px-4 py-1 rounded-full shadow-lg border-4 border-white rotate-12">
                        Moo!
                    </div>
                </div>
                <h1 class="text-5xl font-black text-gray-800 mt-6 tracking-tight">Hai, {{ Auth::user()->name }}!</h1>
                <p class="text-green-600 font-extrabold text-xl mt-2 italic">Sentuh kartu untuk memulai!</p>
            </div>

            <div x-show="menu === 'home'" class="grid grid-cols-1 md:grid-cols-3 gap-10 animate-slideUp">
                
                <button @click="menu = 'write'" class="relative group bg-white p-10 rounded-[3rem] border-4 border-orange-100 shadow-[0_20px_50px_rgba(251,146,60,0.15)] hover:shadow-[0_30px_60px_rgba(251,146,60,0.3)] transition-all transform hover:-translate-y-6">
                    <div class="text-6xl mb-4 group-hover:scale-125 transition-transform">✍️</div>
                    <h3 class="text-2xl font-black text-orange-600">Tulis Jurnal</h3>
                    <p class="text-gray-500 font-bold mt-2">Ceritakan harimu</p>
                    <div class="absolute -bottom-4 -right-4 text-5xl opacity-30 rotate-12">🐻</div>
                </button>

                <button @click="menu = 'motivation'; getRandomQuote()" class="relative group bg-white p-10 rounded-[3rem] border-4 border-yellow-100 shadow-[0_20px_50px_rgba(250,204,21,0.15)] hover:shadow-[0_30px_60px_rgba(250,204,21,0.3)] transition-all transform hover:-translate-y-6">
                    <div class="text-6xl mb-4 group-hover:scale-125 transition-transform">💡</div>
                    <h3 class="text-2xl font-black text-yellow-600">Motivasi</h3>
                    <p class="text-gray-500 font-bold mt-2">Kutipan hari ini</p>
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
                            <h2 class="text-4xl font-black text-gray-800 text-center">Apa perasaanmu? 🐻</h2>
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

                        <textarea name="note" rows="4" class="w-full border-4 border-green-50 rounded-[2rem] p-6 focus:ring-8 focus:ring-green-100 focus:border-green-300 transition-all text-xl font-medium shadow-sm" placeholder="Tuliskan ceritamu..." required></textarea>
                        
                        <button type="submit" class="w-full mt-8 bg-green-500 hover:bg-green-600 text-white font-black text-3xl py-6 rounded-[2rem] shadow-[0_12px_0_rgb(21,128,61)] active:shadow-none active:translate-y-3 transition-all">
                            SIMPAN JURNAL ✨
                        </button>
                    </form>
                </div>
            </div>

            <div x-show="menu === 'motivation'" class="animate-fadeIn" x-cloak>
                <div class="bg-white p-16 rounded-[3rem] shadow-2xl border-4 border-yellow-200 relative text-center">
                    <button @click="menu = 'home'" class="absolute top-6 left-8 text-yellow-600 font-black text-lg hover:scale-110 transition-transform">← KEMBALI</button>
                    
                    <div class="text-8xl mb-8">💡</div>
                    <h2 class="text-3xl font-black text-gray-400 uppercase tracking-widest mb-4">Motivasi Hari Ini</h2>
                    
                    <div class="bg-yellow-50 p-10 rounded-[2rem] border-2 border-dashed border-yellow-200">
                        <p class="text-4xl font-black text-gray-800 italic leading-tight" x-text="'&ldquo;' + currentQuote + '&rdquo;'"></p>
                    </div>

                    <button @click="getRandomQuote()" class="mt-10 bg-yellow-400 hover:bg-yellow-500 text-white font-black px-10 py-4 rounded-full shadow-lg transition-all active:scale-95">
                        Kutipan Lainnya 🔄
                    </button>
                </div>
            </div>

            <div x-show="menu === 'history'" class="animate-fadeIn" x-cloak>
                <div class="bg-white p-10 rounded-[3rem] shadow-2xl border-4 border-blue-100 relative">
                    <button @click="menu = 'home'" class="absolute top-6 left-8 text-blue-500 font-black text-lg hover:scale-110 transition-transform">← KEMBALI</button>
                    <h2 class="text-4xl font-black text-gray-800 text-center mt-8 mb-12">Riwayat Perasaanmu 📅</h2>
                    <div class="grid gap-6">
                        @forelse($moods as $mood)
                        <div class="flex items-center p-8 bg-blue-50 rounded-[2rem] border-2 border-blue-100 shadow-sm">
                            <span class="text-7xl mr-8">{{ $mood->emoji }}</span>
                            <div>
                                <p class="text-2xl text-gray-800 font-black">{{ $mood->note }}</p>
                                <p class="text-blue-500 font-bold uppercase text-sm mt-1">{{ $mood->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @empty
                        <p class="text-center py-20 text-gray-400 italic">Belum ada catatan.</p>
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