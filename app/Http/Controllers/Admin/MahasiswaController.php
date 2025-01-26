<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;
use Hash;
use Illuminate\Http\Request;
use Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        return view('partials.mahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('partials.mahasiswa.create');
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ibu_kandung' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'kabupaten_kota' => 'required',
            'file_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto

        ]);

        if ($validatorData->passes()) {
            // Proses upload foto
            $fotoPath = null;
            if ($request->hasFile('file_foto')) {
                $fotoPath = $request->file('file_foto')->store('mahasiswa', 'public');
            }
            Mahasiswa::create([
                'nama_mahasiswa' => $request->nama_mahasiswa,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nama_ibu_kandung' => $request->nama_ibu_kandung,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kewarganegaraan' => $request->kewarganegaraan,
                'agama' => $request->agama,
                'kabupaten_kota' => $request->kabupaten_kota,
                'file_foto' => $fotoPath, // Simpan path foto
            ]);

            return redirect()->route('mahasiswa.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return response()->json(['success' => false, 'message' => $validatorData->errors()]);
        }
    }

    public function edit($id)
    {
        $data = Mahasiswa::findOrFail($id);
        return view('partials.mahasiswa.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_mahasiswa' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ibu_kandung' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'kabupaten_kota' => 'required',
        
        ]);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update([
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_ibu_kandung' => $request->nama_ibu_kandung,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kewarganegaraan' => $request->kewarganegaraan,
            'agama' => $request->agama,
            'kabupaten_kota' => $request->kabupaten_kota,
    
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa Deleted Successfully');
    }



}
