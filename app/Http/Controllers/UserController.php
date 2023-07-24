<?php

namespace App\Http\Controllers;

use App\Models\role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        $role = role::all();
        $arr = [
            'data' => $data,
            'role' => $role
        ];
        return view('user.index', $arr);
    }

    public function store(Request $request)
    {
        $request->validate([
            'file_foto' => 'mimes:jpg,jpeg,png|max:2048'
        ]);
        try {
            if ($request->file('file_foto')) {
                $file_foto = time() . '-' . $request->file('file_foto')->getClientOriginalName();
                $request->file('file_foto')->move('assets/storange/image_user', $file_foto);
            } else {
                $file_foto = 'user.jpeg';
            }
            $data = new User([
                'nama' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'password' => hash('sha512', $request->password),
                'alamat' => $request->alamat,
                'role_id' => $request->role ? $request->role : 2,
                'foto' => $file_foto,
            ]);
            $data->save();
            if ($request->Is('api/*')) {
                return response()->json([
                    'success' => true,
                    'data' => $data
                ], 200);
            } else {
                return redirect()->route('user.index')->with('message', 'Data Berhasil Disimpan');
            }
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', $th);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = User::find($id);

            if ($request->hasFile('file_foto') || $request->foto) {
                File::delete('assets/storange/image_user/' . $data->foto);
                $gambar = $request->foto ? $request->foto : $request->file('file_foto');
                $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
                $tujuan_upload = 'assets/storange/image_user';
                $gambar->move($tujuan_upload, $nama_gambar);
            }else{
                $nama_gambar = $data->foto ? $data->foto : '';
            }
            $data->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'role_id' => $request->Is('api/*') ? 2 : $request->role,
                'foto' => $nama_gambar,
            ]);
            if ($request->Is('api/*')) {
                return response()->json([
                    'success' => true,
                    'data' => $data
                ], 200);
            } else {
                return redirect()->route('user.index')->with('message', 'Data Berhasil DiUpdate');
            }
        } catch (\Throwable $th) {
            dd($th);
            // return redirect()->route('user.index')->with('error', $th);
        }
    }

    public function delete($id)
    {
        try {
            $data = User::find($id);
            File::delete('assets/storange/image_user/' . $data->foto);
            $data->delete();
            return redirect()->route('user.index')->with('message', 'Data Berhasil DiHapus');
        } catch (\Throwable $th) {
            return redirect()->route('user.index')->with('error', $th);
        }
    }
}
