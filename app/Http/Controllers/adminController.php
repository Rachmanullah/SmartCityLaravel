<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function dashboard()
    {
        $user = User::all()->count();
        $laporan = laporan::all()->count();
        $laporanDone = laporan::where('status', 'Selesai')->count();
        $MakerMaps = laporan::all();
        $arr = [
            'countUser' => $user,
            'countLaporan' => $laporan,
            'countLaporanDone' => $laporanDone
        ];

        return view('dashboard', $arr, compact('MakerMaps'));
    }

    public function logout()
    {
        session()->invalidate();
        return redirect('/');
    }
}
