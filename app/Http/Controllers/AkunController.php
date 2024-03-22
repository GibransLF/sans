<?php

namespace App\Http\Controllers;
use App\Models\User; 

use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('akun.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:users|min:8',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        if(user::create($data)){
            return redirect()->route('akun.index')->with('success', 'Data berhasil disimpan!');
        }
        else{
            return redirect()->route('akun.index')->with('errors', 'Data gagal disimpan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'password1' => 'required|min:8',
            'password2' => 'required|min:8',
        ]);

        if ($request->password1 !== $request->password2) {
            return redirect()->back()->with('errors', 'Kedua kata sandi tidak sama.');
        }
        else{
            $data = user::find($id);
            $data->password = $request->password1;
            if($data->save()){
                return redirect()->back()->with('success', 'Password berhasil diubah.');
            }
            else{
                return redirect()->back()->with('errors', 'Password gagal diubah.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(user::destroy($id)){
            return redirect()->route('akun.index')->with('success', 'Data berhasil dihapus!');
        }
        else{
            return redirect()->route('akun.index')->with('errors', 'Data gagal dihapus!');
        }


    }
}
