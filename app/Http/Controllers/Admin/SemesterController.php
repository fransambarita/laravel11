<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Semester;
use Hash;
use Illuminate\Http\Request;
use Validator;

class SemesterController extends Controller
{
    public function index()
    {
        $data = Semester::all();
        return view('partials.semester.index', compact('data'));
    }

    public function create()
    {
        return view('partials.semester.create');
    }

    public function store(Request $request)
    {
        $validatorData = Validator::make($request->all(), [
            'nama_semester' => 'required',
            'is_active' => 'required',
            
        ]);

        if ($validatorData->passes()) {
            Semester::create([
                'nama_semester' => $request->nama_semester,
                'is_active' => $request->is_active,
    
            ]);

            return redirect()->route('semester.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return response()->json(['success' => false, 'message' => $validatorData->errors()]);
        }
    }

    public function edit($id)
    {
        $data = Semester::findOrFail($id);
        return view('partials.semester.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_semester' => 'required',
            'is_active' => 'required',
            
        ]);
        $semester = Semester::find($id);
        $semester->update([
            'nama_semester' => $request->nama_semester,
            'is_active' => $request->is_active,
    
        
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Record updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();
        return redirect()->route('semester.index')->with('success', 'Mahasiswa Deleted Successfully');
    }



}
