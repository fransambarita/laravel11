<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ProgramStudi;
use Hash;
use Illuminate\Http\Request;
use Validator;

class ProgramStudiController extends Controller
{
    public function index()
    {
        $data = Programstudi::all();
        return view('partials.programstudi.index', compact('data'));
    }

    public function create()
    {
        return view('partials.programstudi.create');
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'nama_program_studi' => 'required',
            'jenjang' => 'required',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file foto
            
        ]);

        if ($validatorData->passes()) {

        // Menyimpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fotoPath = $file->store('programstudi', 'public'); // Menyimpan file ke folder public/uploads/matakuliah
        }
            
            ProgramStudi::create([
                'nama_program_studi' => $request->nama_program_studi,
                'jenjang' => $request->jenjang,
                'deskripsi' => $request->deskripsi,
                'image' => $fotoPath, // Simpan path foto
            ]);

            return redirect()->route('programstudi.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return response()->json(['success' => false, 'message' => $validatorData->errors()]);
        }
    }

    public function edit($id)
    {
        $data = ProgramStudi::findOrFail($id);
        return view('partials.programstudi.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_program_studi' => 'required',
            'jenjang' => 'required',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file foto
            
        ]);
        $programstudi = ProgramStudi::find($id);

        // Menyimpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fotoPath = $file->store('programstudi', 'public'); // Menyimpan file ke folder public/uploads/matakuliah
        }

        $programstudi->update([
            'nama_program_studi' => $request->nama_program_studi,
            'jenjang' => $request->jenjang,
            'deskripsi' => $request->deskripsi,
            'image' => $fotoPath, // Simpan path foto
                
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $programstudi = ProgramStudi::findOrFail($id);
        $programstudi->delete();
        return redirect()->route('programstudi.index')->with('success', 'Mahasiswa Deleted Successfully');
    }



}
