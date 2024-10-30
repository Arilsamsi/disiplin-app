<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();

        return view('guru.index', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
        $file->storeAs('/public/images/guru', $file->hashName());

        Guru::create([
            'nik' => $request->nik,
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'email' => $request->email,
            'telp' => $request->telp,
            'foto' => $file->hashName(),
        ]);

        $defaultPass = '12345';

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($defaultPass),
        ]);

        return redirect()->route('guru');
    }
    public function edit(string $id)
    {
        $guru = Guru::where('id', $id)->first();

        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $guru = Guru::where('id', $request->id)->first();

        $guru->nik = $request->nik;
        $guru->nip = $request->nip;
        $guru->nama = $request->nama;
        $guru->jk = $request->jk;
        $guru->email = $request->email;
        $guru->telp = $request->telp;
        $guru->save();

        return redirect()->route('guru')->with('success','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $guru = Guru::find($request->id);
        $guru->delete();

        return redirect()->route('guru');
    }
}
