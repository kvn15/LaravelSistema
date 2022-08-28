<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function Index(){
        return view('auth.auth');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'nameUser' => 'required|max:100',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('nameUser','password'))){
            return back()->with('mensaje', 'Creedenciales Incorrectas');
        }

        return redirect()->route('dashboard.index');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

    }
}
