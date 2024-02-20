@extends('layouts.maindashboard')

@section('content')
<div class="mt-5">
   @auth
      <h1 class="fs-4">Selamat Datang<br><span class="fs-2 fw-bold">{{ auth()->user()->name }}</span></h1>
   @else
      <h1 class=fw-bold">Selamat Datang di Website SMK Raden Umar Said Kudus</h1>
   @endauth
</div>
@endsection