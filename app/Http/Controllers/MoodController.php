<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MoodController extends Controller
{
    // Menampilkan halaman Menu Utama (Dashboard)
    public function index() {
        return view('dashboard');
    }

    // Menampilkan halaman Input Mood
    public function create() {
        return view('mood.create');
    }

    // Menyimpan data ke database
    public function store(Request $request) {
        $request->validate([
            'status' => 'required',
            'note' => 'nullable|string',
        ]);

        Mood::create([
            'user_id' => Auth::id(),
            'status' => $request->status,
            'note' => $request->note,
        ]);

        return redirect()->route('mood.history')->with('success', 'Mood berhasil disimpan!');
    }

    // Menampilkan halaman Riwayat
    public function history() {
        $moods = Mood::where('user_id', Auth::id())->latest()->get();
        return view('mood.history', compact('moods'));
    }
}