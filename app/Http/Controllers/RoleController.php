<?php

namespace App\Http\Controllers;

use App\Models\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $data = role::all();
        return view('role.index', ['data' => $data]);
    }

    public function store(Request $request)
    {
        try {
            $data = new role([
                'role' => $request->role,
            ]);
            $data->save();

            return redirect()->route('role.index')->with('message', 'Berhasil Di Simpan');
        } catch (\Throwable $th) {
            return redirect()->route('role.index')->with('error', $th);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $data = role::find($id)->update([
                'role' => $request->role,
            ]);

            return redirect()->route('role.index')->with('message', 'Berhasil Di Update');
        } catch (\Throwable $th) {
            return redirect()->route('role.index')->with('error', $th);
        }
    }
    public function delete($id)
    {
        role::find($id)->delete();
        return redirect()->route('role.index')->with('message', 'Berhasil Di Hapus');
    }
}
