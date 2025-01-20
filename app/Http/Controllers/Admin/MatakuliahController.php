<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Hash;
use Illuminate\Http\Request;
use Validator;

class MatakuliahController extends Controller
{
    public function index()
    {
        $data = Matakuliah::all();
        return view('partials.matakuliah.index', compact('data'));
    }

    public function create()
    {
        return view('partials.matakuliah.create');
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'nama_matakuliah' => 'required',
            'sks_teori' => 'required',
            'sks_praktik' => 'required',
            'deskripsi' => 'required',
            'status_aktif' => 'required',
            'jenis_matakuliah' => 'required',
            'file_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file foto
            
        ]);

        if ($validatorData->passes()) {

        // Menyimpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('file_foto')) {
            $file = $request->file('file_foto');
            $fotoPath = $file->store('matakuliah', 'public'); // Menyimpan file ke folder public/uploads/matakuliah
        }
            
            Matakuliah::create([
                'nama_matakuliah' => $request->nama_matakuliah,
                'sks_teori' => $request->sks_teori,
                'sks_praktik' => $request->sks_praktik,
                'deskripsi' => $request->deskripsi,
                'status_aktif' => $request->status_aktif,
                'jenis_matakuliah' => $request->jenis_matakuliah,
                'file_foto' => $fotoPath, // Simpan path foto
            ]);

            return redirect()->route('matakuliah.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return response()->json(['success' => false, 'message' => $validatorData->errors()]);
        }
    }

    public function edit($id)
    {
        $data = Matakuliah::findOrFail($id);
        return view('partials.matakuliah.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_matakuliah' => 'required',
            'sks_teori' => 'required',
            'sks_praktik' => 'required',
            'deskripsi' => 'required',
            'status_aktif' => 'required',
            'jenis_matakuliah' => 'required',
            'file_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file foto
           
            
        ]);
        $matakuliah = Matakuliah::find($id);

        // Menyimpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('file_foto')) {
            $file = $request->file('file_foto');
            $fotoPath = $file->store('matakuliah', 'public'); // Menyimpan file ke folder public/uploads/matakuliah
        }

        $matakuliah->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks_teori' => $request->sks_teori,
            'sks_praktik' => $request->sks_praktik,
            'deskripsi' => $request->deskripsi,
            'status_aktif' => $request->status_aktif,
            'jenis_matakuliah' => $request->jenis_matakuliah,
            'file_foto' => $fotoPath, // Simpan path foto
                
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();
        return redirect()->route('matakuliah.index')->with('success', 'Mahasiswa Deleted Successfully');
    }



}
