<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $password = $request->password;

        if ($password === env('ADMIN_PASSWORD', 'secret123')) {
            $request->session()->put('is_admin', true);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['password' => 'Mot de passe incorrect']);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('is_admin');
        return redirect()->route('admin.login');
    }
}
