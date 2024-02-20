@extends('layouts.maindashboard')

@section('content')
<div class="container">
   <div class="d-flex justify-content-between align-items-center">
      <h2 class="mb-4 fw-bolder">Daftar Kelas</h2>

      <div class="d-flex gap-2">
         <form action="/dashboard/kelas/search" class="w-100">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{ request('search') }}">
               <button class="btn btn-primary fw-medium" type="submit">Cari</button>
            </div>
         </form>
      </div>
   </div>

   @if (session()->has('success'))
      <div class="alert alert-success col-lg-12" role="alert">
         {{ session('success')}}
      </div>
   @endif
   @if (session()->has('error'))
      <div class="alert alert-danger col-lg-12" role="alert">
         {{ session('error')}}
      </div>
   @endif

   @if($kelas->count())
      <table class="table table-striped table-hover">
         <thead class="thead-dark">
            <tr>
               <th scope="col">No</th>
               <th scope="col">Kelas</th>
               <th scope="col">Wali Kelas</th>
               <th scope="col">Aksi</th>
            </tr>
         </thead>
         <tbody>
            @php
               $no = 1;
            @endphp
            @foreach ($kelas as $kelas)
               <tr>
                  <th scope="row">{{ $no++ }}</th>
                  <td>{{ $kelas->nama }}</td>
                  <td>{{ $kelas->guru->nama ?? 'Wali Kelas Tidak Ada' }}</td>
                  <td>
                     @auth
                        <a href="/dashboard/kelas/edit/{{ $kelas->id }}" class="fw-semibold btn btn-warning btn-sm text-white">Edit</a>
                        <form action="/dashboard/kelas/destroy/{{ $kelas->id }}" method="POST" style="display: inline;">
                           @csrf
                           @method('delete')
                           <button type="submit" class="fw-semibold btn btn-danger btn-sm text-white" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                     @endauth
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>
   @else
      <div class="alert alert-primary col-lg-12" role="alert">
         <h1>Tidak ada data</h1>
      </div>
   @endif
</div>

<div class="container">
   <a href="/dashboard/kelas/create" class="btn btn-primary btn-md fw-medium" role="button">Tambah Data Baru</a>
</div>

@endsection
