<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class NoteController extends Controller
{
    public function index()
    {
        return view('notes.index', [
            'notes' => Note::latest()->get()
        ]);
    }

    public function dashboard(){
        $user = Auth::user();
        $weather = null;
        $apiKey = env('OPENWEATHER_API_KEY');

        if ($apiKey) {
            try {
                $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                    'q' => 'Sogod,PH',
                    'appid' => $apiKey,
                    'units' => 'metric',
                ]);

                if ($response->successful()) {
                    $data = $response->json();
                    $weather = [
                        'location' => $data['name'] ?? 'Sogod',
                        'main' => $data['weather'][0]['main'] ?? null,
                        'description' => $data['weather'][0]['description'] ?? null,
                        'temp' => isset($data['main']['temp']) ? round($data['main']['temp']) : null,
                        'icon' => $data['weather'][0]['icon'] ?? null,
                    ];
                }
            } catch (\Exception $e) {
                $weather = null;
            }
        }

        if ($user && $user->role == 1) {
            $notes = Note::with('user')->latest()->get();
            return view('admin.dashboard', compact('notes', 'weather'));
        }

        $notes = $user ? $user->notes : collect();
        return view('notes.dashboard', compact('notes', 'weather'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        Auth::user()->notes()->create([
            'title' => $request->title,
            'content' => $request->content
        ]);
        

        return back();
    }

    public function update(Request $request, Note $note)
    {
        $note->update($request->all());
        return back();
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return back();
    }

    public function showNote()
    {
        return view("notes.showNote");
    }


   
}

