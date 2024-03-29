<?php

namespace App\Http\Controllers;

use App\Models\letter;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letter = letter::all();
        return view('letter.index', compact('letter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('letter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(letter $letter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(letter $letter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, letter $letter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(letter $letter)
    {
        //
    }
}
