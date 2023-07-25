<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
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
}
