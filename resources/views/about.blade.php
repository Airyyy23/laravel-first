@extends('layouts.main')

@section('content')

   <h1>Tentang saya</h1>
   <h2>Nama saya {{ $nama }}</h2>
   <h2>Saya dari kelas {{ $kelas }}</h2>
   <h2>Saya di jurusan {{ $jurusan }}</h2>
   <img src="{{ $foto }}" width="200px">

@endsection