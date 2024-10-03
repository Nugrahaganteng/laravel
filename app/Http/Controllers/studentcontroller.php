<?php

namespace App\Http\Controllers;


use App\Models\student;
use Illuminate\Http\Request;

class studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all products
        $student =student::latest()->paginate(5);

        //render view with products
        return view('student.index', compact('student'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate form
        $request->validate([
            
            'nama_lengkap'         => 'required|min:1',
            'tempat_lahir'   => 'required|min:1',
            'tanggal_lahir'   => 'required|min:1',
            'alamat'   => 'required|min:1',
            'asal_sekolah'   => 'required|min:1',
            'email'   => 'required|min:1',
            'foto'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'scan_kk'         => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('students/index', $foto->hashName());
        
        $kk = $request->file('scan_kk');
        $kk->storeAs('students/index', $kk->hashName());
        //create product
       student::create([
            'nama_lengkap'  => $request->nama_lengkap,
            'tempat_lahir'  => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat'         => $request->alamat,
            'asal_sekolah'  => $request->asal_sekolah,
            'email'  => $request->tempat_lahir,
            'foto'         => $foto->hashName(),
            'scan_kk'         => $kk->hashName()
        ]);

        //redirect to index
        return redirect()->route('student.index')->with(['success' => 'Data Berhasil Disimpan!']);    
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( )
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
