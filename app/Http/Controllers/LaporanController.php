<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $data = laporan::with('users')->get();
        if ($request->Is('api/*')) {
            return response()->json([
                'success' => true,
                'data' => $data,
            ], 200);
        } else {
            return view('laporan.index', ['data' => $data]);
        }
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file_foto')) {
            $gambar = $request->file('file_foto');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $tujuan_upload = 'assets/storange/image_laporan';
            $gambar->move($tujuan_upload, $nama_gambar);
        } else {
            $nama_gambar = '';
        }
        $data = new laporan([
            'user_id' => $request->user_id,
            'foto' => $nama_gambar,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'kerusakan' => $request->kerusakan,
            'status' => $request->status ? $request->status : "Diajukan",
        ]);
        $data->save();
        if ($request->Is('api/*')) {
            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => 'Laporan Kerusakan Jalan Berhasil Dikirim! Terima kasih telah berpartisipasi dalam melaporkan kerusakan jalan. Tim kami akan segera meninjau laporan Anda.',
            ], 200);
        } else {
            return redirect()->route('laporan.index')->with('message', 'Data Berhasil DiSimpan');
        }
    }

    public function getPerId($id)
    {
        $data = laporan::where('user_id', $id)->get();
        return response()->json([
            'success' => true,
            'data' => $data,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $data = laporan::find($id)->update([
                'status' => $request->status,
            ]);
            return redirect()->route('laporan.index')->with('message', 'Data Berhasil DiUpdate');
        } catch (\Throwable $th) {
            return redirect()->route('laporan.index')->with('error', $th);
        }
    }
    public function destroy($id)
    {
        try {
            $data = laporan::find($id);
            File::delete('assets/storange/image_laporan/' . $data->foto);
            $data->delete();
            return redirect()->route('laporan.index')->with('message', 'Data Berhasil DiHapus');
        } catch (\Throwable $th) {
            return redirect()->route('laporan.index')->with('error', $th);
        }
    }

    public function print()
    {
        $data = laporan::with('users')->get();
        $date = date('d-m-Y');
        $arr = [
            'data' => $data,
            'date' => $date
        ];
        $pdf = Pdf::loadView('laporan.print', $arr);
        return $pdf->download('Pelaporan.pdf');
    }

    public function detail($id)
    {
        $data = laporan::find($id)->with('users');
        $date = date('d-m-Y');
        $arr = [
            'data' => $data,
            'date' => $date
        ];
        $load = Pdf::loadView('laporan.print', $arr);
        $pdf = Pdf::loadHTML($load)->setPaper('a4', 'landscape')->setWarnings(false);
        return $pdf->download('Pelaporan.pdf');
    }
}
