<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dosen;
use Hash;
use Illuminate\Http\Request;
use Validator;

class DosenController extends Controller
{
    public function index()
    {
        $data = Dosen::all();
        return view('partials.dosen.index', compact('data'));
    }

    public function create()
    {
        return view('partials.dosen.create');
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'nama_dosen' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ibu_kandung' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
        ]);

        if ($validatorData->passes()) {
            Dosen::create([
                'nama_dosen' => $request->nama_dosen,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nama_ibu_kandung' => $request->nama_ibu_kandung,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kewarganegaraan' => $request->kewarganegaraan,
            ]);

            return redirect()->route('dosen.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return response()->json(['success' => false, 'message' => $validatorData->errors()]);
        }
    }

    public function edit($id)
    {
        $data = Dosen::findOrFail($id);
        return view('partials.dosen.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_dosen' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nama_ibu_kandung' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
        ]);
        $dosen = Dosen::find($id);
        $dosen->update([
            'nama_dosen' => $request->nama_dosen,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_ibu_kandung' => $request->nama_ibu_kandung,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kewarganegaraan' => $request->kewarganegaraan,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Mahasiswa Deleted Successfully');
    }



}
