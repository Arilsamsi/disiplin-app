@extends('layout')
@section('content')
  <div class="row">
    <div class="col-md-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <img src="{{ asset('assets/images/faces/aril.png') }}" alt="" width="100%" style="border-radius: 18px">
        </div>
      </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h2>Bio</h2>
          <p>Nama : Ahmad Aril Samsi</p>
          <p>Email : ahmadarilsamsi@gmail.com</p>
          <p>No. Hp : +62 823 9342 6013</p>
          <p>Kelas : 12 RPL</p>
          <p>Angkatan : 2024</p>
          <p>Hobi : Main Bola </p>
          <P>Cita cita : Menjadi Pintar</P>
          <P>Qoute : "Jangan menyerah, Hidup itu keras..."</P>
          <p>Selain main bola saya juga suka menonton Anime dan saya juga sangat suka bermain game</p>
          <button id="Love" class="btn btn-danger btn-sm"><i class='bx bxs-heart text-white'></i></button>
        </div>
      </div>
    </div>
  </div>
@endsection