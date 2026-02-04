<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tetap gunakan satu ini

class MoodController extends Controller
{
    public function index() {
        return view('dashboard');
    }

    public function create() {
        return view('mood.create');
    }

    public function store(Request $request) {
        $request->validate([
            'status' => 'required',
            'note' => 'nullable|string',
        ]);

        Mood::create([
            'user_id' => Auth::user()->id, // Cara pemanggilan ID yang lebih eksplisit
            'status' => $request->status,
            'note' => $request->note,
        ]);

        return redirect()->route('mood.history')->with('success', 'Mood berhasil disimpan!');
    }

    public function history() {
        // Menggunakan Auth::user()->id agar konsisten
        $moods = Mood::where('user_id', Auth::user()->id)->latest()->get();
        return view('mood.history', compact('moods'));
    }

    public function destroy($id)
    {
        $mood = Mood::where('id', $id)
                    ->where('user_id', Auth::user()->id) 
                    ->firstOrFail();
        
        $mood->delete();

        return redirect()->route('mood.history')->with('success', 'Catatan berhasil dihapus!');
    }
}