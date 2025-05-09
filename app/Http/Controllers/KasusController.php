<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Pelanggaran;
use App\Models\PelanggaranSiswa;
use Illuminate\Support\Facades\Storage;

class KasusController extends Controller
{
    public function index(){
        $siswa = Siswa::all();
        $pelanggaran = Pelanggaran::all();
        return view('kasus.index', compact(['siswa','pelanggaran']));
    }

    public function store(Request $request){
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nameFoto = $file->getClientOriginalName();
            $request->file('foto')->move('foto_kasus',$nameFoto);  
        } else {
            $nameFoto = null;
        }

        // Simpan data ke database
        PelanggaranSiswa::create([
            'siswa_id' => $request->siswa_id,
            'pelanggaran_id' => $request->pelanggaran_id,
            'waktu' => $request->waktu,
            'catatanTemuan' => $request->catatanTemuan,
            'foto' => $nameFoto,
            'catatanPenanganan' => null, 
            'status' => 1,
        ]);

        return redirect()->back()->with('success', 'Data pelanggaran siswa berhasil disimpan.');
    }

    public function daftar(){
        $data = PelanggaranSiswa::orderBy('waktu','DESC')->simplePaginate(10);

        return view('kasus.daftar',compact('data'));
    }

    public function update($id){
        $data = PelanggaranSiswa::find($id);
        
        return view('kasus.update', compact('data'));

    }

    public function storeUpdate(Request $request){
        $data = PelanggaranSiswa::find($request->id);

        $data->catatanPenanganan = $request->catatanPenanganan;
        $data->status = $request->status;
        $data->update();

        return redirect()->route('kasus.daftar');

    }

    public function delete(Request $request)
    {
        
        $data = PelanggaranSiswa::find($request->id);
        
        Storage::disk('public')->delete('foto_kasus'.$data->foto);

        $data->delete();

        return redirect()->route('kasus.daftar');

        \Session::flash('success', 'Data Siswa Berhasil dihapus');
    }
}
