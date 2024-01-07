<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view(){
        return view('dashboard');
    }
    public function index()
    {
        $staff = User::where('role','staff')->get();
        return view('staff.index', compact('staff'));

    }
    public function index2(){

        $guru = User::where('role','guru')->get();
        return view('guru.index', compact('guru'));
    }
    public function create()
    {
        $staff = User::all();
        return view('staff.create', compact('staff'));
    }
    public function create2()
    {
        $guru = User::all();
        return view('guru.create', compact('guru'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
          
        ]);

        $name = substr($request->name, 0, 3);
        $email = substr($request->email, 0, 3);
        
        $hashedPassword = Hash::make($name . $email);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,  
            'role' => 'staff',
        ]);

        return redirect()->route('users.index')->with('success', 'Berhasil menambahkan data pengguna!');
    }
    public function store2(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
          
        ]);

        $name = substr($request->name, 0, 3);
        $email = substr($request->email, 0, 3);
        
        $hashedPassword = Hash::make($name . $email);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,  
            'role' => 'guru',
        ]);

        return redirect()->route('users.index2')->with('success', 'Berhasil menambahkan data pengguna!');
    }
    // public function edit( string $id)
    // {
       
    // }

    public function edit($id)
    {
        $staff = User::find($id);
        return view('staff.edit', compact('staff'));
    }
    public function edit2($id)
    {
        $guru = User::find($id);
        return view('guru.edit', compact('guru'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'password' => '',
        ]);

        $staffData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->filled('password')){
            $staffData['password'] = bcrypt($request->password);
        }

        User::where('id', $id)->update($staffData);

        return redirect()->route('staff.index')->with('success', 'Berhasil mengubah data!');
    }
    public function update2(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'password' => '',
        ]);

        $guruData = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->filled('password')){
            $guruData['password'] = bcrypt($request->password);
        }

        User::where('id', $id)->update($guruData);

        return redirect()->route('users.index2')->with('success', 'Berhasil mengubah data!');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
    public function destroy2($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}