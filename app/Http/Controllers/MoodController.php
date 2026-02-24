<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{
    public function index()
    {
        $quotes = [
            "Tidak apa-apa merasa tidak baik-baik saja. ✨",
            "Setiap hari adalah awal yang baru. 🌈",
            "Kamu jauh lebih kuat dari yang kamu bayangkan. 💪",
            "Jangan lupa berterima kasih pada dirimu hari ini. 🌻",
            "Kebahagiaan berasal dari tindakanmu sendiri. 😊",
            "Istirahatlah jika lelah, tapi jangan berhenti. ☁️",
            "Satu langkah kecil tetaplah sebuah kemajuan. 👣",
            "Napasmu adalah bukti kamu mampu melewati badai. 🌬️",
            "Jadilah lembut pada dirimu sendiri hari ini. 🌿",
            "Kegagalan adalah pelajaran untuk esok hari. 📖",
            "Dunia lebih indah karena ada kamu. 🌏",
            "Fokuslah pada hal kecil yang membuatmu tersenyum. 🎈",
            "Kamu tidak harus sempurna untuk jadi luar biasa. ⭐",
            "Percayalah pada prosesmu. 🌸",
            "Hatimu layak mendapatkan kedamaian. 🕊️",
            "Hari yang buruk tidak berarti hidup yang buruk. ☀️",
            "Suaramu berharga, perasaanmu valid. 💖",
            "Keberanian terkadang adalah suara lembut. 🌙",
            "Jangan bandingkan musimmu dengan orang lain. 🍂",
            "Kamu adalah penulis ceritamu sendiri. ✍️",
            "Kebaikan pada diri sendiri akan berbuah manis. 🍯",
            "Mendung tidak selamanya, matahari akan kembali. 🌤️",
            "Tarik napas dalam. Kamu sudah melakukan yang terbaik. 🧘",
            "Tantangan adalah kesempatan untuk tumbuh. 🌳",
            "Masa depanmu cerah, tetaplah melangkah. 🕯️",
            "Kesalahan adalah bukti kamu sedang mencoba. 🛠️",
            "Cintai dirimu lebih dari kemarin. ❤️",
            "Jangan biarkan awan gelap menutup sinarmu. 💡",
            "Kesehatan mentalmu adalah prioritas. 🛡️",
            "Terima kasih sudah bertahan sejauh ini. Kamu hebat! 🏅"
        ];

        $randomQ uote = $quotes[array_rand($quotes)];
        $moods = Mood::where('user_id', Auth::id())->latest()->get();

        return view('dashboard', compact('randomQuote', 'moods'));
    }

    public function store(Request $request)
{
    $request->validate([
        'emoji' => 'required',
        'note' => 'required',
    ]);

    $request->user()->moods()->create([
        'emoji' => $request->emoji,
        'note' => $request->note,
        'status' => 'active', // <--- TAMBAHKAN INI (Atau nilai apa pun yang kamu inginkan)
    ]);

    return redirect()->back();
}
}