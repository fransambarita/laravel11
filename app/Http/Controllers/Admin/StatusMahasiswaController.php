<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StatusMahasiswa;
use Hash;
use Illuminate\Http\Request;
use Validator;

class StatusMahasiswaController extends Controller
{
    public function index()
    {
        $data = StatusMahasiswa::all();
        return view('partials.statusmahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('partials.statusmahasiswa.create');
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'nama_status_mahasiswa' => 'required',
            
        ]);

        if ($validatorData->passes()) {
            StatusMahasiswa::create([
                'nama_status_mahasiswa' => $request->nama_status_mahasiswa
    
            ]);

            return redirect()->route('statusmahasiswa.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return response()->json(['success' => false, 'message' => $validatorData->errors()]);
        }
    }

    public function edit($id)
    {
        $data = StatusMahasiswa::findOrFail($id);
        return view('partials.statusmahasiswa.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_status_mahasiswa' => 'required'
            
        ]);
        $tingkat = StatusMahasiswa::find($id);
        $tingkat->update([
            'nama_status_mahasiswa' => $request->nama_status_mahasiswa,
        
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $tingkat = StatusMahasiswa::findOrFail($id);
        $tingkat->delete();
        return redirect()->route('statusmahasiswa.index')->with('success', 'Mahasiswa Deleted Successfully');
    }



}
