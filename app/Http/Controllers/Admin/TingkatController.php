<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Tingkat;
use Hash;
use Illuminate\Http\Request;
use Validator;

class TingkatController extends Controller
{
    public function index()
    {
        $data = Tingkat::all();
        return view('partials.tingkat.index', compact('data'));
    }

    public function create()
    {
        return view('partials.tingkat.create');
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'nama_tingkat' => 'required',
            
        ]);

        if ($validatorData->passes()) {
            Tingkat::create([
                'nama_tingkat' => $request->nama_tingkat
    
            ]);

            return redirect()->route('tingkat.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return response()->json(['success' => false, 'message' => $validatorData->errors()]);
        }
    }

    public function edit($id)
    {
        $data = Tingkat::findOrFail($id);
        return view('partials.tingkat.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_tingkat' => 'required'
            
        ]);
        $tingkat = Tingkat::find($id);
        $tingkat->update([
            'nama_tingkat' => $request->nama_tingkat,
        
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $tingkat = Tingkat::findOrFail($id);
        $tingkat->delete();
        return redirect()->route('tingkat.index')->with('success', 'Mahasiswa Deleted Successfully');
    }



}
