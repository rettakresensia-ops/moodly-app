<x-app-layout>
    <div class="py-12 bg-[#EAF4F4] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 text-center">
                <h2 class="text-3xl font-bold text-[#778E7E]">Halo, Apa kabar hari ini?</h2>
                <p class="text-gray-600">Luangkan waktu sejenak untuk mengenali perasaanmu.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border-t-8 border-[#C1E1C1] p-6">
                    <h3 class="text-xl font-semibold mb-4 text-[#778E7E]">Bagaimana suasana hatimu?</h3>
                    
                    <form action="#" method="POST">
                        @csrf
                        <div class="flex justify-between mb-6">
                            <label class="text-center cursor-pointer group">
                                <input type="radio" name="status" value="luar-biasa" class="hidden peer">
                                <div class="text-4xl grayscale peer-checked:grayscale-0 group-hover:scale-110 transition">🌟</div>
                                <span class="text-xs text-gray-500">Hebat</span>
                            </label>
                            <label class="text-center cursor-pointer group">
                                <input type="radio" name="status" value="senang" class="hidden peer">
                                <div class="text-4xl grayscale peer-checked:grayscale-0 group-hover:scale-110 transition">😊</div>
                                <span class="text-xs text-gray-500">Senang</span>
                            </label>
                            <label class="text-center cursor-pointer group">
                                <input type="radio" name="status" value="biasa" class="hidden peer">
                                <div class="text-4xl grayscale peer-checked:grayscale-0 group-hover:scale-110 transition">😐</div>
                                <span class="text-xs text-gray-500">Biasa</span>
                            </label>
                            <label class="text-center cursor-pointer group">
                                <input type="radio" name="status" value="sedih" class="hidden peer">
                                <div class="text-4xl grayscale peer-checked:grayscale-0 group-hover:scale-110 transition">😔</div>
                                <span class="text-xs text-gray-500">Sedih</span>
                            </label>
                            <label class="text-center cursor-pointer group">
                                <input type="radio" name="status" value="stres" class="hidden peer">
                                <div class="text-4xl grayscale peer-checked:grayscale-0 group-hover:scale-110 transition">😫</div>
                                <span class="text-xs text-gray-500">Stres</span>
                            </label>
                        </div>

                        <textarea name="note" rows="3" class="w-full border-none bg-[#F9F9F9] rounded-xl focus:ring-[#C1E1C1]" placeholder="Ceritakan sedikit kenapa kamu merasa begitu..."></textarea>
                        
                        <button type="submit" class="mt-4 w-full bg-[#C1E1C1] hover:bg-[#A8D1A8] text-[#4F6355] font-bold py-3 rounded-xl transition">
                            Simpan Perasaan Hari Ini
                        </button>
                    </form>
                </div>

                <div class="bg-[#FDF0D5] overflow-hidden shadow-sm sm:rounded-2xl p-6 flex flex-col justify-center border-l-8 border-[#C1E1C1]">
                    <div class="text-4xl mb-3">💡</div>
                    <h3 class="text-xl font-bold text-[#778E7E] mb-2">Tips Hari Ini</h3>
                    <p class="text-[#4F6355] italic">
                        "Cobalah menulis 3 hal kecil yang kamu syukuri hari ini. Menghargai hal kecil adalah langkah awal menuju ketenangan."
                    </p>
                </div>

            </div>

            <div class="mt-10 text-center">
                <a href="#" class="text-sm font-medium text-red-400 hover:text-red-600 underline">
                    Butuh bantuan profesional? Klik di sini untuk Mode Darurat.
                </a>
            </div>

        </div>
    </div>
</x-app-layout>