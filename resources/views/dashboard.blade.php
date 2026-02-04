<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Moodly') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 bg-white overflow-hidden shadow-sm sm:rounded-3xl border-l-8 border-green-500">
                <div class="p-8 flex items-center space-x-6">
                    <div class="text-5xl animate-bounce">💡</div>
                    <div>
                        <h3 class="text-xs font-black text-green-600 uppercase tracking-widest mb-1">Inspirasi Siang Ini</h3>
                        <p class="text-2xl text-gray-800 italic font-medium">"{{ $randomQuote }}"</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-center mb-6">
                        <div class="p-3 bg-yellow-100 rounded-2xl mr-4 text-2xl">✍️</div>
                        <h3 class="text-xl font-bold text-gray-800">Apa yang kamu rasakan?</h3>
                    </div>
                    
                    <form action="{{ route('moods.store') }}" method="POST">
                        @csrf
                        <div class="flex justify-between items-center mb-8 p-4 bg-gray-50 rounded-2xl">
                            @foreach(['😊', '😢', '😡', '😴', '✨'] as $emoji)
                            <label class="cursor-pointer group">
                                <input type="radio" name="emoji" value="{{ $emoji }}" class="hidden peer" required>
                                <span class="text-4xl grayscale group-hover:grayscale-0 peer-checked:grayscale-0 peer-checked:scale-125 transition-all duration-300 block">
                                    {{ $emoji }}
                                </span>
                            </label>
                            @endforeach
                        </div>

                        <textarea name="note" rows="4" class="w-full border-gray-200 rounded-2xl p-4 focus:ring-4 focus:ring-green-100 focus:border-green-400 mb-6" placeholder="Ceritakan sedikit tentang hari ini..." required></textarea>
                        
                        <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-2xl shadow-lg transition-all">
                            Simpan Jurnal 🐻
                        </button>
                    </form>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-100 rounded-2xl mr-4 text-2xl">📅</div>
                            <h3 class="text-xl font-bold text-gray-800">Catatan Terakhir</h3>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @forelse($moods->take(3) as $mood)
                            <div class="flex items-center p-4 bg-gray-50 rounded-2xl border border-transparent hover:border-green-200 transition-all">
                                <span class="text-4xl mr-5">{{ $mood->emoji }}</span>
                                <div class="overflow-hidden">
                                    <p class="text-gray-800 font-medium truncate">{{ $mood->note }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $mood->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-400 italic py-10">Belum ada catatan.</p>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>