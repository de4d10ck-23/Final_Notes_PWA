<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\User;
class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');

    }

    public function showLogin()
    {
        $apiKey = env('OPENWEATHER_API_KEY');
        $city = 'Sogod, Southern Leyte';
        $weather = null;

        try {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $weather = [
                    'temp' => $data['main']['temp'] ?? null,
                    'description' => $data['weather'][0]['description'] ?? null,
                    'city' => $data['name'] ?? $city,
                ];
            }
        } catch (\Exception $e) {
            $weather = null;
        }

        return view('auth.login', compact('weather'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required',
        ]);

        $role = 0;
        if ($request->admin_key === 'admin123') {
            $role = 1;
        }

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $role,
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }

     public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withInputs($request->only('email'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function weather()
    {
        $apiKey = env('OPENWEATHER_API_KEY');
        $city = 'Sogod, Southern Leyte';
        $weather = null;

        try {
            $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
            ]);

            if ($response->successful()) {
                return response()->json($response->json());
            }
        } catch (\Exception $e) {
            // fail silently
        }

        return response()->json(['message' => 'Weather unavailable'], 503);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
