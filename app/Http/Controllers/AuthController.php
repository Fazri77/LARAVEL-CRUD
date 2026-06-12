<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request): RedirectResponse
    {
        $userType = $request->input('user_type');

        if ($userType === 'user') {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            // Simple user authentication (you can replace with proper auth later)
            if ($request->email === 'user@example.com' && $request->password === 'password') {
                $request->session()->put('user_type', 'user');
                $request->session()->put('user_email', $request->email);
                return redirect()->route('barang.index')->with('success', 'Login berhasil!');
            }

            return back()->withErrors(['email' => 'Email atau password salah.']);
        }

        if ($userType === 'admin') {
            $credentials = $request->validate([
                'admin_username' => ['required'],
                'admin_password' => ['required'],
            ]);

            // Simple admin authentication (you can replace with proper auth later)
            if ($request->admin_username === 'admin' && $request->admin_password === 'admin123') {
                $request->session()->put('user_type', 'admin');
                $request->session()->put('admin_username', $request->admin_username);
                return redirect()->route('admin.dashboard')->with('success', 'Admin login berhasil!');
            }

            return back()->withErrors(['admin_username' => 'Username atau password admin salah.']);
        }

        return back()->withErrors(['user_type' => 'Tipe user tidak valid.']);
    }

    /**
     * Handle logout
     */
    public function logout(Request $request): RedirectResponse
    {
        $request->session()->flush();
        return redirect()->route('login')->with('success', 'Logout berhasil!');
    }
}
