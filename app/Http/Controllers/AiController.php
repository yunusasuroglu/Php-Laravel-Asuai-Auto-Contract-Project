<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class AiController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Giriş bilgileri hatalı.']);
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function createContract(Request $request)
    {

        $text = $request->input('hiddenInput');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=" . env('GEMINI_API_KEY'), [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $text]
                    ]
                ]
            ]
        ]);
        if ($response->successful()) {
            $result = $response->json();
            return response()->json([
                'text' => $result['candidates'][0]['content']['parts'][0]['text'] // Veriyi doğru yerden alıyoruz
            ]);
        } else {
            return response()->json(['error' => 'API isteği başarısız oldu.'], 500);
        }
    }
    public function createProject(Request $request)
    {

        $text = $request->input('hiddenInput');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=" . env('GEMINI_API_KEY'), [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $text]
                    ]
                ]
            ]
        ]);
        if ($response->successful()) {
            $result = $response->json();
            return response()->json([
                'text' => $result['candidates'][0]['content']['parts'][0]['text'] // Veriyi doğru yerden alıyoruz
            ]);
        } else {
            return response()->json(['error' => 'API isteği başarısız oldu.'], 500);
        }
    }
    public function createPrivate(Request $request)
    {

        $text = $request->input('hiddenInput');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=" . env('GEMINI_API_KEY'), [
            "contents" => [
                [
                    "parts" => [
                        ["text" => $text]
                    ]
                ]
            ]
        ]);
        if ($response->successful()) {
            $result = $response->json();
            return response()->json([
                'text' => $result['candidates'][0]['content']['parts'][0]['text']
            ]);
        } else {
            return response()->json(['error' => 'API isteği başarısız oldu.'], 500);
        }
    }
    public function contractView()
    {
        return view('contract');
    }
    public function privateView()
    {
        return view('private');
    }
    public function projectView()
    {
        return view('project');
    }
    public function home()
    {
        return view('welcome');
    }
    public function Privacy()
    {
        return view('privacy-policy');
    }
    public function Terms()
    {
        return view('terms-of-services');
    }
}
