<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RuangKelas;
use Hash;
use Illuminate\Http\Request;
use Validator;

class RuangKelasController extends Controller
{
    public function index()
    {
        $data = RuangKelas::all();
        return view('partials.ruangkelas.index', compact('data'));
    }

    public function create()
    {
        return view('partials.ruangkelas.create');
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'nama_ruang_kelas' => 'required',
            
        ]);

        if ($validatorData->passes()) {
            RuangKelas::create([
                'nama_ruang_kelas' => $request->nama_ruang_kelas
    
            ]);

            return redirect()->route('ruangkelas.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return response()->json(['success' => false, 'message' => $validatorData->errors()]);
        }
    }

    public function edit($id)
    {
        $data = Ruangkelas::findOrFail($id);
        return view('partials.ruangkelas.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_ruang_kelas' => 'required'
            
        ]);
        $ruangkelas = RuangKelas::find($id);
        $ruangkelas->update([
            'nama_ruang_kelas' => $request->nama_ruang_kelas,
        
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $ruangkelas = RuangKelas::findOrFail($id);
        $ruangkelas->delete();
        return redirect()->route('ruangkelas.index')->with('success', 'Mahasiswa Deleted Successfully');
    }



}
