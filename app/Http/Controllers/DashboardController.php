<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pelanggaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        
        $kelas = Kelas::count();
        $siswa = Siswa::count();
        $guru = Guru::count();
        $pelanggaran = Pelanggaran::count();

        return view('dashboard', compact(['kelas', 'siswa', 'guru', 'pelanggaran']));
    }

   
}
