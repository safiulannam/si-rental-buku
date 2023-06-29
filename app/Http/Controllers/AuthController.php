<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(request $request)
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // cek status user
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            if (Auth::user()->status != 'active'){
                Session::flash('status', 'failed');
                Session::flash('message', 'Akun anda sudah tidak aktif. Silahkan hubungi admin!');
                return redirect('/login');
            }

            $request->session()->regenerate();

            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('user');
            }

            // return redirect()->intended('/');
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login invalid');

        return redirect('/login');
        // return back()->with('loginError', 'Username atau password salah!');
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function register() 
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|confirmed',
            'phone' => 'required|numeric',
            'addres' => 'required|string',
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}
