<?php

namespace App\Http\Controllers;

use App\Models\Pelanggaran;
use Illuminate\Http\Request;

class PelanggaranController extends Controller
{
    public function index(){
        $pelanggaran = Pelanggaran::all();

        return view('pelanggaran.index', compact('pelanggaran'));
    }
    public function create(){
        return view('pelanggaran.create');
    }
    public function store(Request $request){
        Pelanggaran::create([
            'nama' => $request->nama,
            'poin' => $request->poin,
        ]);
        return redirect()->route('pelanggaran');
    }
    public function edit($id){
        $pelanggaran = Pelanggaran::where('id', $id)->first();

        return view('pelanggaran.edit', compact('pelanggaran'));
    }
    public function update(Request $request){
        $p = Pelanggaran::where('id', $request->id)->first();

        $p->nama = $request->nama;
        $p->poin = $request->poin;
        $p->update();

        return redirect(route('pelanggaran'));
    }
    public function delete(Request $request){
        $p = Pelanggaran::where('id', $request->id)->first();

        $p->delete();
        return redirect(route('pelanggaran'));
    }
}
