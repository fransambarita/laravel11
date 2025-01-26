<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\TahunAkademik;
use Hash;
use Illuminate\Http\Request;
use Validator;

class TahunAkademikController extends Controller
{
    public function index()
    {
        $data = TahunAkademik::all();
        return view('partials.tahunakademik.index', compact('data'));
    }

    public function create()
    {
        return view('partials.tahunakademik.create');
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'tahun_akademik' => 'required',
            'is_active' => 'required',
            
        ]);

        if ($validatorData->passes()) {
            TahunAkademik::create([
                'tahun_akademik' => $request->tahun_akademik,
                'is_active' => $request->is_active
    
            ]);

            return redirect()->route('tahunakademik.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return response()->json(['success' => false, 'message' => $validatorData->errors()]);
        }
    }

    public function edit($id)
    {
        $data = TahunAkademik::findOrFail($id);
        return view('partials.tahunakademik.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tahun_akademik' => 'required',
            'is_active' => 'required',
            
        ]);
        $tahunakademik = TahunAkademik::find($id);
        $tahunakademik->update([
            'tahun_akademik' => $request->tahun_akademik,
            'is_active' => $request->is_active
        
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $tahunakademik = TahunAkademik::findOrFail($id);
        $tahunakademik->delete();
        return redirect()->route('tahunakademik.index')->with('success', 'Mahasiswa Deleted Successfully');
    }



}
