<?php

namespace App\Http\Controllers;

use App\Models\letter_type;
use Illuminate\Http\Request;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $surat = letter_type::all();
            return view('surat.index', compact('surat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'letter_code' => 'required',
            'name_type' => 'required',
        ]);
        // simpan data ke db : 'name_column' => $request->name_input
        letter_type::create([
            'letter_code' => $request->letter_code,
            //pertama disesuaikan dengan inout, kedua sesuai  model
            'name_type' => $request->name_type,
        ]);

        // abis simpen, arahin ke halaman nama
        return redirect()->back()->with('success', 'Berhasil Menambahkan data Surat!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(letter_type $letter_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $surat = letter_type::find($id);
        return view('surat.edit', compact('surat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'letter_code' => 'required|min:3',
            'name_type' => 'required|min:3',
        ]);

        letter_type::where('id',$id)->update([

            'letter_code' => $request->letter_code,
            'name_type' => $request->name_type,
        ]);
        
        return redirect()->route('surat.index')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        letter_type::where('id',$id)->delete();
        return redirect()->back()->with('Deleted', 'Berhasil menghapus data!');
    }
}
