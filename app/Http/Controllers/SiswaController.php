<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        $siswa = Siswa::simplePaginate(20);
        // dd($siswa);
        return view('siswa.index', compact('siswa', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('foto');
        $file->storeAs('/public/images/siswa', $file->hashName());

        Siswa::create([
            'nis' => $request->nis,
            'tahunMasuk' => $request->tahunMasuk,
            'nama' => $request->nama,
            'tempatLahir' => $request->tempatLahir,
            'tanggalLahir' => $request->tanggalLahir,
            'jk' => $request->jk,
            'telp' => $request->telp,
            'foto' => $file->hashName(),
        ]);

        
        // dd($request->all());
        \Session::flash('success', 'Data Siswa Berhasil ditambahkan');
        return redirect()->route('siswa');
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
    public function edit($id)
    {
        $siswa = Siswa::where('id', $id)->first();

        return view("siswa.edit", compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $siswa = Siswa::where('id', $request->id)->first();
     
        $file = $request->file('foto');
        $file->storeAs('/public/images/siswa', $file->hashName());

        Storage::delete('public/images/siswa/'.$siswa->foto);

        if($request->hasFile('foto')){
            $siswa->nis = $request->nis;
            $siswa->tahunMasuk = $request->tahunMasuk;
            $siswa->nama = $request->nama;
            $siswa->tempatLahir = $request->tempatLahir;
            $siswa->tanggalLahir = $request->tanggalLahir;
            $siswa->jk = $request->jk;
            $siswa->telp = $request->telp;
            $siswa->foto = $request->foto->hashName();
            $siswa->save();
        }else{
            $siswa->nis = $request->nis;
            $siswa->tahunMasuk = $request->tahunMasuk;
            $siswa->nama = $request->nama;
            $siswa->tempatLahir = $request->tempatLahir;
            $siswa->tanggalLahir = $request->tanggalLahir;
            $siswa->jk = $request->jk;
            $siswa->telp = $request->telp;
            $siswa->save();
        }

        

        \Session::flash('success', 'Data Siswa Berhasil diperbarui');

        return redirect()->route('siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        $siswa = Siswa::findOrFail($request->id);
        // dd($siswa);
        
        Storage::disk('public')->delete('/images/siswa'.$siswa->foto);

        $siswa->delete();

        return redirect()->route('siswa');

        \Session::flash('success', 'Data Siswa Berhasil dihapus');
    }
}
