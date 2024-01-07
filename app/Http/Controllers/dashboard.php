<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\letter_type;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index()
    {
        $staffTotal = User::where('role', 'staff')->count();
        $guruTotal = User::where('role', 'guru')->count();
        $klasifikasiTotal = letter_type::all()->count();
        return view('dashboard', compact('guruTotal', 'staffTotal','klasifikasiTotal'));
    }
}
