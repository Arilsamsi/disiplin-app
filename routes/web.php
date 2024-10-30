<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelasSiswaController;
use App\Http\Controllers\PelanggaranController;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/ujiPivot', function () {
    $siswa = Siswa::find(1);
    $siswa->Kelas()->attach(3);

    return "Data Berhasil Dikirim";
});
//Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'toLogin'])->name('to.login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'toRegister'])->name('to.register');
Route::post('/logout', [AuthController::class, 'logOut'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Siswa
    Route::get("siswa", [SiswaController::class, 'index'])->name('siswa');
    Route::get("siswa/create", [SiswaController::class, 'create'])->name('siswa.create');
    Route::post("siswa/post", [SiswaController::class, 'store'])->name('siswa.post');
    Route::get("siswa/edit{id}", [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put("siswa/update", [SiswaController::class, 'update'])->name('siswa.update');
    Route::post("siswa/destroy", [SiswaController::class, 'destroy'])->name('siswa.destroy');
    
    //Guru
    Route::get("guru", [GuruController::class, 'index'])->name('guru');
    Route::get("guru/create", [GuruController::class, 'create'])->name('guru.create');
    Route::post("guru/post", [GuruController::class, 'store'])->name('guru.post');
    Route::get("guru/edit{id}", [GuruController::class, 'edit'])->name('guru.edit');
    Route::put("guru/update", [GuruController::class, 'update'])->name('guru.update');
    Route::post("guru/delete", [GuruController::class, 'delete'])->name('guru.delete');
    
    //Kelas
    Route::get('kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('kelas/create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('kelas/post', [KelasController::class, 'store'])->name('kelas.post');
    Route::get('kelas/edit{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('kelas/update', [KelasController::class, 'update'])->name('kelas.update');
    Route::post('kelas/delete', [KelasController::class, 'destroy'])->name('kelas.destroy');
    
    //Kelas Siswa
    Route::get('/siswaListToAdd/{id}', [KelasSiswaController::class, 'list'])->name('siswa.listToAdd');
    Route::get('/siswaListed/{id}', [KelasSiswaController::class, 'listed'])->name('siswa.listed');
    Route::post('/addToKelas', [KelasSiswaController::class, 'add'])->name('siswa.addToKelas');
    Route::post('/removeFromKelas', [KelasSiswaController::class, 'remove'])->name('siswa.removeFromKelas');
    
    //Pelanggaran
    Route::get('pelanggaran', [PelanggaranController::class, 'index'])->name('pelanggaran');
    Route::get('pelanggaran/create', [PelanggaranController::class, 'create'])->name('pelanggaran.create');
    Route::post('pelanggaran/post', [PelanggaranController::class, 'store'])->name('pelanggaran.store');
    Route::get('pelanggaran/edit{id}', [PelanggaranController::class, 'edit'])->name('pelanggaran.edit');
    Route::put('pelanggaran/update', [PelanggaranController::class, 'update'])->name('pelanggaran.update');
    Route::post('pelanggaran/delete', [PelanggaranController::class, 'delete'])->name('pelanggaran.delete');
    
    //Kasus
    Route::get('/kasus',[KasusController::class, 'index'])->name('kasus.index');
    Route::post('/kasus/store', [KasusController::class, 'store'])->name('kasus.store');
    Route::post('/kasus/storeUpdate', [KasusController::class, 'storeUpdate'])->name('kasus.storeUpdate');
    Route::get('/kasus/daftar',[KasusController::class, 'daftar'])->name('kasus.daftar');
    Route::get('/kasus/update/{id}', [KasusController::class, 'update'])->name('kasus.update');

    // //Reset Password
    // Route::get('/forgot-password', function () {
    //     return view('auth.forgot-password');
    // })->middleware('guest')->name('password.request');
    
    // Route::post('/forgot-password', function(Request $request) {
    //     $request->validate(['email' => 'required|email']);

    //     $status = Password::sendResetLink(
    //         $request->only('email')
    //     );

    //     return $status === Password::RESET_LINK_SENT
    //                 ? back()->with(['status' => __($status)])
    //                 : back()->withErrors(['email' => __($status)]);
    // })->middleware('guest')->name('password.email');

    // Route::get('/reset-password/{token}', function ( string $token ) {
    //     return view('auth.reset-password', ['token' => $token]);
    // })->middleware('guest')->name('password.reset');


    // Auth::routes();
});